/**
 * Handles the addition of the comment form.
 *
 * @since 2.7.0
 * @output wp-includes/js/comment-reply.js
 *
 * @namespace addComment
 *
 * @type {Object}
 */
window.addComment = (function (window) {
    // Avoid scope lookups on commonly used variables.
    var document = window.document;

    // Settings.
    var config = {
        commentReplyClass: 'comment-reply-link',
        commentReplyTitleId: 'reply-title',
        cancelReplyId: 'cancel-comment-reply-link',
        commentFormId: 'commentform',
        temporaryFormId: 'wp-temp-form-div',
        parentIdFieldId: 'comment_parent',
        postIdFieldId: 'comment_post_ID'
    };

    // Cross browser MutationObserver.
    var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;

    // Check browser cuts the mustard.
    var cutsTheMustard = 'querySelector' in document && 'addEventListener' in window;

    /*
     * Check browser supports dataset.
     * !! sets the variable to true if the property exists.
     */
    var supportsDataset = !!document.documentElement.dataset;

    // For holding the cancel element.
    var cancelElement;

    // For holding the comment form element.
    var commentFormElement;

    // The respond element.
    var respondElement;

    // The mutation observer.
    var observer;

    // The comment block.
    var blockcomment;
    var commentWrap;
    var commentID;

    if (cutsTheMustard && document.readyState !== 'loading') {
        ready();
    } else if (cutsTheMustard) {
        window.addEventListener('DOMContentLoaded', ready, false);
    }

    /**
     * Sets up object variables after the DOM is ready.
     *
     * @since 5.1.1
     */
    function ready() {
        // Initialise the events.
        init();

        // Set up a MutationObserver to check for comments loaded late.
        observeChanges();
    }

    /**
     * Add events to links classed .comment-reply-link.
     *
     * Searches the context for reply links and adds the JavaScript events
     * required to move the comment form. To allow for lazy loading of
     * comments this method is exposed as window.commentReply.init().
     *
     * @since 5.1.0
     *
     * @memberOf addComment
     *
     * @param {HTMLElement} context The parent DOM element to search for links.
     */
    function init(context) {
        if (!cutsTheMustard) {
            return;
        }

        // Get required elements.
        cancelElement = getElementById(config.cancelReplyId);
        commentFormElement = getElementById(config.commentFormId);

        // No cancel element, no replies.
        if (!cancelElement) {
            return;
        }

        cancelElement.addEventListener('touchstart', cancelEvent);
        cancelElement.addEventListener('click', cancelEvent);

        // Submit the comment form when the user types [Ctrl] or [Cmd] + [Enter].
        var submitFormHandler = function (e) {
            if ((e.metaKey || e.ctrlKey) && e.keyCode === 13) {
                commentFormElement.removeEventListener('keydown', submitFormHandler);
                e.preventDefault();
                // The submit button ID is 'submit' so we can't call commentFormElement.submit(). Click it instead.
                commentFormElement.submit.click();
                return false;
            }
        };

        if (commentFormElement) {
            commentFormElement.addEventListener('keydown', submitFormHandler);
        }

        var links = replyLinks(context);
        var element;

        for (var i = 0, l = links.length; i < l; i++) {
            element = links[i];

            element.addEventListener('touchstart', clickEvent);
            element.addEventListener('click', clickEvent);
        }
    }

    /**
     * Return all links classed .comment-reply-link.
     *
     * @since 5.1.0
     *
     * @param {HTMLElement} context The parent DOM element to search for links.
     *
     * @return {HTMLCollection|NodeList|Array}
     */
    function replyLinks(context) {
        var selectorClass = config.commentReplyClass;
        var allReplyLinks;

        // childNodes is a handy check to ensure the context is a HTMLElement.
        if (!context || !context.childNodes) {
            context = document;
        }

        if (document.getElementsByClassName) {
            // Fastest.
            allReplyLinks = context.getElementsByClassName(selectorClass);
        } else {
            // Fast.
            allReplyLinks = context.querySelectorAll('.' + selectorClass);
        }

        return allReplyLinks;
    }

    /**
     * Cancel event handler.
     *
     * @since 5.1.0
     *
     * @param {Event} event The calling event.
     */
    function cancelEvent(event) {
        var cancelLink = this;

        if(respondElement !== undefined){
            respondElement.remove();
        }
        cancelLink.style.display = 'none';

        event.preventDefault();
    }

    /**
     * Click event handler.
     *
     * @since 5.1.0
     *
     * @param {Event} event The calling event.
     */
    function clickEvent(event) {
        if (respondElement !== undefined) {
            respondElement.remove();
        }
        var replyNode = getElementById(config.commentReplyTitleId);
        var defaultReplyHeading = replyNode && replyNode.firstChild.textContent;
        var replyLink = this,
            commId = getDataAttribute(replyLink, 'belowelement'),
            parentId = getDataAttribute(replyLink, 'commentid'),
            respondId = getDataAttribute(replyLink, 'respondelement'),
            postId = getDataAttribute(replyLink, 'postid'),
            replyTo = getDataAttribute(replyLink, 'replyto') || defaultReplyHeading,
            follow,
            textfield;

        var mainParent = replyLink.closest('.depth-1');

        var listElements = mainParent.children;

        var lastElem = listElements[listElements.length - 1];

        var isElemID = lastElem.getAttribute('id');

        var  lastElemID = null;

        if (isElemID)
        {
            lastElemID = isElemID;
        }
        else{
            lastElemID = mainParent.getAttribute('id');
        }

        if (!commId || !parentId || !respondId || !postId) {
            /*
             * Theme or plugin defines own link via custom `wp_list_comments()` callback
             * and calls `moveForm()` either directly or via a custom event hook.
             */
            return;
        }

        /*
         * Third party comments systems can hook into this function via the global scope,
         * therefore the click event needs to reference the global scope.
         */

        // follow = window.addComment.moveForm(commId, parentId, respondId, postId, replyTo);
        follow = window.addComment.moveForm(lastElemID, parentId, respondId, postId, replyTo);
        if (false === follow) {
            event.preventDefault();
        }

        textfield = getElementById('comment');
        textfield.style.background = '#fff';

        if (blockcomment) {
            blockcomment.style.background = '#fff';
        }

        commentWrap = replyLink.closest('.ld-comment-wrapper');
        commentID = parentId;
    }

    /**
     * Creates a mutation observer to check for newly inserted comments.
     *
     * @since 5.1.0
     */
    function observeChanges() {
        if (!MutationObserver) {
            return;
        }

        var observerOptions = {
            childList: true,
            subtree: true
        };

        observer = new MutationObserver(handleChanges);
        observer.observe(document.body, observerOptions);
    }

    /**
     * Handles DOM changes, calling init() if any new nodes are added.
     *
     * @since 5.1.0
     *
     * @param {Array} mutationRecords Array of MutationRecord objects.
     */
    function handleChanges(mutationRecords) {
        var i = mutationRecords.length;

        while (i--) {
            // Call init() once if any record in this set adds nodes.
            if (mutationRecords[i].addedNodes.length) {
                init();
                return;
            }
        }
    }

    /**
     * Backward compatible getter of data-* attribute.
     *
     * Uses element.dataset if it exists, otherwise uses getAttribute.
     *
     * @since 5.1.0
     *
     * @param {HTMLElement} Element DOM element with the attribute.
     * @param {string}      Attribute the attribute to get.
     *
     * @return {string}
     */
    function getDataAttribute(element, attribute) {
        if (supportsDataset) {
            return element.dataset[attribute];
        } else {
            return element.getAttribute('data-' + attribute);
        }
    }

    /**
     * Get element by ID.
     *
     * Local alias for document.getElementById.
     *
     * @since 5.1.0
     *
     * @param {HTMLElement} The requested element.
     */
    function getElementById(elementId) {
        return document.getElementById(elementId);
    }

    /**
     * Moves the reply form from its current position to the reply location.
     *
     * @since 2.7.0
     *
     * @memberOf addComment
     *
     * @param {string} addBelowId HTML ID of element the form follows.
     * @param {string} commentId  Database ID of comment being replied to.
     * @param {string} respondId  HTML ID of 'respond' element.
     * @param {string} postId     Database ID of the post.
     * @param {string} replyTo    Form heading content.
     */
    function moveForm(addBelowId, commentId, respondId, postId, replyTo) {
        // Get elements based on their IDs.
        var addBelowElement = document.getElementById(addBelowId);
        respondElement = document.getElementById(respondId).cloneNode(true);

        // Get the hidden fields.
        var parentIdField = respondElement.querySelector('#comment_parent');
        var postIdField = respondElement.querySelector('#comment_post_ID');
        var element, cssHidden, style;

        var replyHeading = respondElement.querySelector('#reply-title');
        var replyHeadingTextNode = replyHeading && replyHeading.firstChild;
        var replyLinkToParent = replyHeadingTextNode && replyHeadingTextNode.nextSibling;

        if (!addBelowElement || !respondElement || !parentIdField) {
            // Missing key elements, fail.
            return;
        }

        if ('undefined' === typeof replyTo) {
            replyTo = replyHeadingTextNode && replyHeadingTextNode.textContent;
        }

        // Set the value of the post.
        if (postId && postIdField) {
            postIdField.value = postId;
        }

        parentIdField.value = commentId;

        respondElement.querySelector('#cancel-comment-reply-link').style.display = '';
        respondElement.classList.add('reply-form');
        var parentElement = findAncestor(addBelowElement, '.depth-1');

        // addBelowElement.parentNode.insertBefore(respondElement, parentElement);
        addBelowElement.insertBefore(respondElement, parentElement);

        if (replyHeadingTextNode && replyHeadingTextNode.nodeType === Node.TEXT_NODE) {
            if (replyLinkToParent && 'A' === replyLinkToParent.nodeName && replyLinkToParent.id !== 'cancel-comment-reply-link') {
                replyLinkToParent.style.display = 'none';
            }

            replyHeadingTextNode.textContent = replyTo;
        }

        /*
         * This is for backward compatibility with third party commenting systems
         * hooking into the event using older techniques.
         */
        respondElement.querySelector('#cancel-comment-reply-link').onclick = function () {
            return false;
        };

        // Focus on the first field in the comment form.
        try {
            for (var i = 0; i < document.getElementById('commentform').elements.length; i++) {
                element = document.getElementById('commentform').elements[i];
                cssHidden = false;

                // Get elements computed style.
                if ('getComputedStyle' in window) {
                    // Modern browsers.
                    style = window.getComputedStyle(element);
                } else if (document.documentElement.currentStyle) {
                    // IE 8.
                    style = element.currentStyle;
                }

                /*
                 * For display none, do the same thing jQuery does. For visibility,
                 * check the element computed style since browsers are already doing
                 * the job for us. In fact, the visibility computed style is the actual
                 * computed value and already takes into account the element ancestors.
                 */
                if ((element.offsetWidth <= 0 && element.offsetHeight <= 0) || style.visibility === 'hidden') {
                    cssHidden = true;
                }

                // Skip form elements that are hidden or disabled.
                if ('hidden' === element.type || element.disabled || cssHidden) {
                    continue;
                }

                element.focus();
                // Stop after the first focusable element.
                break;
            }
        } catch (e) {

        }

        /*
         * false is returned for backward compatibility with third party commenting systems
         * hooking into this function.
         */
        return false;
    }

    function findAncestor (el, cls) {
        while ((el = el.parentElement) && !el.classList.contains(cls));
        return el;
    }

    return {
        init: init,
        moveForm: moveForm
    };
})(window);

<?php

namespace App\Helpers;

class CommentsCustomize
{

    public function __construct()
    {
        add_filter( 'comment_form_fields', array($this, 'addPlaceholderToCommentField') );
    }

    /**
     * Add placeholder to standard comments form textarea
     * @param $comment_fields
     * @return mixed
     */
    public function addPlaceholderToCommentField( $comment_fields ){
        $placeholder = esc_html__('The text box to start new conversation');
        $comment_fields['comment'] = str_replace('<textarea', '<textarea placeholder="' . $placeholder . '"', $comment_fields['comment']);

        return $comment_fields;
    }

}
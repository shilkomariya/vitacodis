<?php

class Walker_Comment_LearnDash extends Walker_Comment
{
    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
        $new_children_elements = $this->getNewChildrenElements($element->comment_ID, $children_elements);
        if (!empty($new_children_elements)) {
            $children_elements = $children_elements + $new_children_elements;
        }

        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    protected function getNewChildrenElements($id, &$ch_elem)
    {
        $newChildrenElements = array();

        if (array_key_exists($id, $ch_elem)) {
            $first_children_array = $ch_elem[$id];
            unset($ch_elem[$id]);

            $childrenElements = $this->createNewChildrenElements($first_children_array, $ch_elem);
            ksort($childrenElements);

            $transformedElements = array();

            foreach($childrenElements as $k=>$v)
            {
                $transformedElements[] = $v;
            }

            $newChildrenElements[$id] =  $transformedElements;
        }

        return $newChildrenElements;
    }

    protected function createNewChildrenElements($arrChildren, &$parentArr, $comments = array())
    {
        foreach ($arrChildren as $key => $comment) {
            $comments[$comment->comment_ID] = $comment;
            if (array_key_exists($comment->comment_ID, $parentArr)) {
                $subChildrenArr = $parentArr[$comment->comment_ID];
                unset($parentArr[$comment->comment_ID]);
                $comments = $this->createNewChildrenElements($subChildrenArr, $parentArr, $comments);
            }
        }
        return $comments;
    }

}
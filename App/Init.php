<?php

namespace App;

final class Init {

    private static $classes = array(
	//Base\Enqueue::class,
	//Helpers\CommentsCustomize::class,
	Learndash\CourseFeedbackCustomize::class,
	Learndash\CourseButtonsLabels::class,
    );

    /**
     * Loop through the classes, initialize them, and call the register() method if it exists
     *
     * @return void
     */
    public function __construct() {
	foreach (self::$classes as $class) {
	    new $class;
	}
    }

}

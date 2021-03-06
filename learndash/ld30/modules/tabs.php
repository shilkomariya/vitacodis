<?php
if (!defined('ABSPATH')) {
    exit;
}

use App\Learndash\CourseFeedbackCustomize;

/**
 * Fires before the content tabs.
 *
 * @since 3.0.0
 * @param int|false $post_id   Post ID.
 * @param int       $course_id Course ID.
 * @param int       $user_id   User ID.
 */
do_action('learndash-content-tabs-before', get_the_ID(), $course_id, $user_id);

/**
 * Fires before the content tabs for any context.
 *
 * The dynamic portion of the hook name, `$context`, refers to the context for which the hook is fired,
 * such as `course`, `lesson`, `topic`, `quiz`, etc.
 *
 * @param int|false $post_id   Post ID.
 * @param int       $course_id Course ID.
 * @param int       $user_id   User ID.
 */
do_action('learndash-' . $context . '-content-tabs-before', get_the_ID(), $course_id, $user_id);

$tab_count = 0;

/**
 * Filters LearnDash content Tabs.
 *
 * @param array  $tabs      An array of tabs array data. The tabs array data can contain keys for id, icon, label, content.
 * @param string $context   The context where the tabs are shown like course, lesson, topic, quiz, etc.
 * @param int    $course_id Course ID.
 * @param int    $user_id   User ID.
 */
$tabs = apply_filters(
	'learndash_content_tabs', array(
    array(
	'id' => 'content',
	'icon' => 'ld-icon-content',
	'label' => LearnDash_Custom_Label::get_label($context),
	'content' => $content,
    ),
    array(
	'id' => 'materials',
	'icon' => 'ld-icon-materials',
	'label' => __('Materials', 'learndash'),
	'content' => $materials,
	'condition' => ( isset($materials) && !empty($materials) ),
    ),
	), $context, $course_id, $user_id
);

foreach ($tabs as $tab) {

    if (!isset($tab['condition'])) {
	$tab_count++;
    }

    if (isset($tab['condition']) && $tab['condition']) {
	$tab_count++;
    }
}
?>

<div class="ld-tabs <?php echo esc_attr('ld-tab-count-' . $tab_count); ?>">
    <?php
    /**
     * If we have more than one tab, show them
     * @var [type]
     */
    if ($tab_count > 1) :
	$i = 0;
	?>
        <div class="ld-tabs-navigation">
	    <?php
	    foreach ($tabs as $tab) :

		// Skip if conditionally indicated
		if (isset($tab['condition']) && !$tab['condition']) {
		    continue;
		}

		$tab_class = 'ld-tab ' . ( 0 === $i ? 'ld-active' : '' );
		?>

		<div class="<?php echo esc_attr($tab_class); ?>" data-ld-tab="<?php echo esc_attr('ld-tab-' . $tab['id'] . '-' . get_the_ID()); ?>">
		    <span class="<?php echo esc_attr('ld-icon ' . $tab['icon']); ?>"></span>
		    <span class="ld-text"><?php echo esc_attr($tab['label']); ?></span>
		</div>
		<?php
		$i++;
	    endforeach;
	    ?>
        </div>
    <?php endif; ?>

    <div class="ld-tabs-content">
	<?php
	/**
	 * Fires before the content tabs.
	 *
	 * @since 3.0.0
	 *
	 * @param int|false $post_id   Post ID.
	 * @param string    $context   The context for which the hook is fired such as `course`, `lesson`, `topic`, `quiz`, etc.
	 * @param int       $course_id Course ID.
	 * @param int       $user_id   User ID.
	 */
	do_action('learndash-content-tab-listing-before', get_the_ID(), $context, $course_id, $user_id);

	/**
	 * Fires before the content tabs for any context.
	 *
	 * The dynamic portion of the hook name, `$context`, refers to the context for which the hook is fired,
	 * such as `course`, `lesson`, `topic`, `quiz`, etc.
	 *
	 * @param string|false $post_id   Post ID.
	 * @param int          $course_id Course ID.
	 * @param int          $user_id   User ID.
	 */
	do_action('learndash-' . $context . '-content-tab-listing-before', get_the_ID(), $course_id, $user_id);
	/*
	  global $post;
	  $completed_steps = learndash_course_get_completed_steps($user_id, $course_id);
	  $count_steps = learndash_get_course_steps_count($course_id);
	  //$access = get_field('access', $post->ID); //
	  $access = 0;
	  if (!is_null($access) && $access !== false && $completed_steps < $count_steps - 2) {
	  $alert = array(
	  'icon' => 'alert',
	  'message' => get_field('message', $post->ID),
	  'type' => 'warning',
	  'button' => array(
	  'url' => learndash_previous_post_link('', true),
	  'class' => 'learndash-link-previous-incomplete',
	  'label' => esc_html__('Back', 'learndash'),
	  'icon' => 'arrow-left',
	  'icon-location' => 'left',
	  ),
	  );
	  $access_denied_message = learndash_get_template_part('modules/alert.php', $alert, false);
	  $access_denied_message = '<div class="learndash-wrapper">' . $access_denied_message . '</div>';
	  echo $access_denied_message;
	  } else {
	  }
	 */
	$i = 0;
	foreach ($tabs as $tab) :
	    // Skip if conditionally indicated
	    if (isset($tab['condition']) && !$tab['condition']) {
		continue;
	    }

	    $tab_class = 'ld-tab-content ' . ( 0 === $i ? 'ld-visible' : '' );

	    /**
	     * Fires before any tab.
	     *
	     * The dynamic portion of the hook name, `$tab['id]`, refers id of the tab.
	     *
	     * @param int|false $post_id   Post ID.
	     * @param string    $context   The context for which the hook is fired such as `course`, `lesson`, `topic`, `quiz`, etc.
	     * @param int       $course_id Course ID.
	     * @param int       $user_id   User ID.
	     */
	    do_action('learndash-content-tabs-' . $tab['id'] . '-before', get_the_ID(), $context, $course_id, $user_id);
	    ?>

    	<div class="<?php echo esc_attr($tab_class); ?>" id="<?php echo esc_attr('ld-tab-' . $tab['id'] . '-' . get_the_ID()); ?>">
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Might output HTML?>
		<?php
		if (get_the_title() == 'Feedback Thank You'):
		    echo wpautop($tab['content']);
		else:
		    echo $tab['content'];
		endif;
		?>
    	</div>
    	<input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
    	<input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
	    <?php
	    if (get_the_title() == 'Course Feedback'):
		?>
		<input type="hidden" name="next_url" value="<?php echo getNextUrl(get_the_ID(), $course_id); ?>">
	    <?php endif; ?>
	    <?php
	    /**
	     * Fires after any tab.
	     *
	     * The dynamic portion of the hook name, `$tab['id]`, refers to the id of the tab.
	     *
	     * @param int|false $post_id   Post ID.
	     * @param string    $context   The context for which the hook is fired such as `course`, `lesson`, `topic`, `quiz`, etc.
	     * @param int       $course_id Course ID.
	     * @param int       $user_id   User ID.
	     */
	    do_action('learndash-content-tabs-' . $tab['id'] . '-after', get_the_ID(), $context, $course_id, $user_id);

	    $i++;
	endforeach;

	/**
	 * Fires after the content tabs.
	 *
	 * @since 3.0.0
	 *
	 * @param int|false $post_id   Post ID.
	 * @param int       $course_id Course ID.
	 * @param int       $user_id   User ID.
	 */
	do_action('learndash-content-tab-listing-after', get_the_ID(), $course_id, $user_id);

	/**
	 * Fires after the content tabs for any context.
	 *
	 * The dynamic portion of the hook name, `$context`, refers to the context for which the hook is fired,
	 * such as `course`, `lesson`, `topic`, `quiz`, etc.
	 *
	 * @param string|false $post_id   Post ID.
	 * @param int          $course_id Course ID.
	 * @param int          $user_id   User ID.
	 */
	do_action('learndash-' . $context . '-content-tab-listing-after', get_the_ID(), $course_id, $user_id);
	?>

    </div> <!--/.ld-tabs-content-->

</div> <!--/.ld-tabs-->
<?php
/**
 * Fires after the content tabs.
 *
 * @since 3.0.0
 *
 * @param int|false $post_id   Post ID.
 * @param int       $course_id Course ID.
 * @param int       $user_id   User ID.
 */
do_action('learndash-content-tabs-after', get_the_ID(), $course_id, $user_id);

/**
 * Fires before the content tabs for any context.
 *
 * The dynamic portion of the hook name, `$context`, refers to the context for which the hook is fired,
 * such as `course`, `lesson`, `topic`, `quiz`, etc.
 *
 * @param int|false $post_id   Post ID.
 * @param int       $course_id Course ID.
 * @param int       $user_id   User ID.
 */
do_action('learndash-' . $context . '-content-tabs-after', get_the_ID(), $course_id, $user_id);

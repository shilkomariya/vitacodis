<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$has_access = sfwd_lms_has_access( $course_id );
global $course_pager_results;

/** This action is documented in themes/ld30/templates/focus/index.php */
do_action( 'learndash-focus-sidebar-before', $course_id, $user_id ); ?>

<div data-child="true" class="ld-focus-sidebar">
<div class="mobile-progress">
<?php
if ( is_user_logged_in() ) {
		learndash_get_template_part(
			'modules/progress.php',
			array(
				'course_id' => $course_id,
				'user_id'   => $user_id,
				'context'   => 'focus',
			),
			true
		);
	}
	else{ ?>
	<div class="user-not-logind">
	</div>

	<?php }
	?>
</div>
	<?php if ( ! empty( $header['logo'] ) && ! empty( $header['text'] ) ) { ?>
	<div class="ld-course-navigation-heading">

		<?php
		/**
		 * Fires before the sidebar trigger wrapper in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action( 'learndash-focus-sidebar-trigger-wrapper-before', $course_id, $user_id );
		?>

		<span class="ld-focus-sidebar-trigger">
			<?php
			/**
			 * Fires before the sidebar trigger in the focus template.
			 *
			 * @param int $course_id Course ID.
			 * @param int $user_id   User ID.
			 */
			do_action( 'learndash-focus-sidebar-trigger-before', $course_id, $user_id );
			?>
			<?php if ( is_rtl() ) { ?>
			<span class="ld-icon ld-icon-arrow-right"></span>
			<?php } else { ?>
			<span class="ld-icon ld-icon-arrow-left"></span>
			<?php } ?>
			<?php
			/**
			 * Fires after the sidebar trigger in the focus template.
			 *
			 * @param int $course_id Course ID.
			 * @param int $user_id   User ID.
			 */
			do_action( 'learndash-focus-sidebar-trigger-after', $course_id, $user_id );
			?>
		</span>

		<?php
		/**
		 * Fires after the sidebar trigger wrapper in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action( 'learndash-focus-sidebar-trigger-wrapper-after', $course_id, $user_id );
		?>

		<?php
		/**
		 * Fires before the sidebar heading in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action( 'learndash-focus-sidebar-heading-before', $course_id, $user_id );
		?>

		<h3>
			<a href="<?php echo esc_url( get_the_permalink( $course_id ) ); ?>" id="ld-focus-mode-course-heading">
				<span class="ld-icon ld-icon-content"></span>
				<?php echo esc_html( get_the_title( $course_id ) ); ?>
			</a>
		</h3>
		<?php
		/**
		 * Fires after the sidebar heading in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action( 'learndash-focus-sidebar-heading-after', $course_id, $user_id );
		?>
	</div>
	<?php } ?>

	<!-- <div class="light-dark-btn mobile">
				<span class="ld-text"> Dark Mode</span>
				
						<label class="switch" for="checkbox">
						<input type="checkbox" id="checkbox" >
						<span class="slider round"></span> 
						</label>
						
				</div> -->

	<div class="ld-focus-sidebar-wrapper">
		<?php
		/**
		 * Fires inside the sidebar heading navigation in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action( 'learndash-focus-sidebar-between-heading-navigation', $course_id, $user_id );
		?>
		<div class="ld-course-navigation">
			<div class="ld-course-navigation-list">
				<div class="ld-lesson-navigation">
					<div class="ld-lesson-items" id="<?php echo esc_attr( 'ld-lesson-list-' . $course_id ); ?>">
						<?php
						/**
						 * Fires before the sidebar nav in the focus template.
						 *
						 * @param int $course_id Course ID.
						 * @param int $user_id   User ID.
						 */
						do_action( 'learndash-focus-sidebar-nav-before', $course_id, $user_id );

						$lessons = learndash_get_course_lessons_list( $course_id, $user_id, learndash_focus_mode_lesson_query_args( $course_id ) );

						/**
						 * Filters focus mode navigation setting arguments.
						 *
						 * @param array $navigation_setting_args An array of focus mode navigation settings.
						 */
						$widget_instance = apply_filters(
							'ld-focus-mode-navigation-settings',
							array(
								'show_lesson_quizzes' => true,
								'show_topic_quizzes'  => true,
								'show_course_quizzes' => true,
							)
						);

						learndash_get_template_part(
							'widgets/navigation/rows.php',
							array(
								'course_id'            => $course_id,
								'widget_instance'      => $widget_instance,
								'lessons'              => $lessons,
								'has_access'           => $has_access,
								'user_id'              => $user_id,
								'course_pager_results' => $course_pager_results,
							),
							true
						);

						/**
						 * Fires after the sidebar nav in the focus template.
						 *
						 * @param int $course_id Course ID.
						 * @param int $user_id   User ID.
						 */
						do_action( 'learndash-focus-sidebar-nav-after', $course_id, $user_id );
						?>
					</div> <!--/.ld-lesson-items-->
				</div> <!--/.ld-lesson-navigation-->
				


			</div> <!--/.ld-course-navigation-list-->
		</div> <!--/.ld-course-navigation-->
		<?php
		/**
		 * Fires after the sidebar nav wrapper in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action( 'learndash-focus-sidebar-after-nav-wrapper', $course_id, $user_id );
		?>
	</div> <!--/.ld-focus-sidebar-wrapper-->

	<div class="light-dark-btn">
				<span class="ld-text"> Dark Mode</span>

						<label class="switch">
						<input type="checkbox" id="checkbox" >
						<span class="slider round"></span>
						</label>

						<span class="ld-text desktop">Full Screen</span>

							<label class="switch full desktop">
							<input type="checkbox" id="full-screen">
							<span class="slider round"></span>
							</label>



				</div>
				<div class="fuul screen">

				</div>

</div> <!--/.ld-focus-sidebar-->

<?php
/**
 * Fires after the sidebar in the focus template.
 *
 * @param int $course_id Course ID.
 * @param int $user_id   User ID.
 */
do_action( 'learndash-focus-sidebar-after', $course_id, $user_id );
?>
<script>
jQuery(document).ready(function($){
	$(document).on('click','.ld-lesson-item:not(:first-of-type) .ld-lesson-item-preview-heading',function(e){
		e.preventDefault();
		var href='';
		if($(this).parents('.ld-lesson-item').find('.ld-table-list-item:first-child a.ld-table-list-item-preview').length>0){
			var href=$(this).parents('.ld-lesson-item').find('.ld-table-list-item:first-child a.ld-table-list-item-preview').attr('href');
		}else{
			href=$(this).attr('href');
		}
		window.location.replace(href);
	});
	var actions=$(document).find('.ld-content-actions').html();
	//$(document).find('.ld-content-actions').remove();
	console.log(actions);
	$(document).find('.elementor-heading-title.elementor-size-default').first().append('<div class="ld-content-actions">'+actions+'</div>');
	
/*
	setTimeout(function() {
		$('.ld-content-actions .ld-text:contains("Previous Module")').parents('.ld-content-action').remove();
		$('.ld-content-actions .ld-text:contains("Previous module")').parents('.ld-content-action').remove();
		if($('.ld-lesson-item.ld-is-current-lesson').next().find('.ld-table-list-item:first-child a.ld-table-list-item-preview').length==0){
			text=$('.ld-lesson-item.ld-is-current-lesson').next().find('.ld-lesson-item-preview-heading .ld-lesson-title').text();
			$('#learndash_mark_complete_button').attr('value',text);
			$('.ld-content-action:last-child .ld-text').text(text);
		}else{
			$('#learndash_mark_complete_button').attr('value','Next module');
		}
	}, 10);	
*/

	$(document).on('click','.quiz_continue_link,#learndash_mark_complete_button,.ld-content-actions .ld-text:contains("Next Module"),.ld-content-actions .ld-text:contains("Start Module 1")',function(e){
		e.preventDefault();
		var href='';
		if($('.ld-lesson-item.ld-is-current-lesson').next().find('.ld-table-list-item:first-child a.ld-table-list-item-preview').length>0){
			href=$('.ld-lesson-item.ld-is-current-lesson').next().find('.ld-table-list-item:first-child a.ld-table-list-item-preview').attr('href');
			
		}else{
			href=$('.ld-lesson-item.ld-is-current-lesson').next().find('.ld-lesson-item-preview-heading').attr('href');
		}
		window.location.replace(href);
	});	
	
});
</script>
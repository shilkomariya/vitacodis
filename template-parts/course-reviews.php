<?php
/**
 * Featured Reviews from Trustpilot
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
?>
<svg width="0" height="0" class="hidden d-none">
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="star">
	<path fill="currentColor" d="M17.2,16.6l2.2,6.7L12,17.9L17.2,16.6z M24,9.2h-9.2L12,0.5L9.2,9.2L0,9.2l7.4,5.4l-2.8,8.7l7.4-5.4l4.6-3.3L24,9.2L24,9.2z"></path>
    </symbol>
</svg>
<div class="mb-3">
    <img class="tustpilot-logo" src="<?php echo get_template_directory_uri() ?>/img/trustpilot.jpg" alt="trustpilot">
</div>
<?php
foreach (fw_get_db_post_option(get_the_ID(), 'reviews') as $key => $value) {
    if ($key == 3) {
	?>
	<p>
	    <a class="collapse-link collapsed" data-bs-toggle="collapse" href="#collapseRevews" role="button" aria-expanded="false" aria-controls="collapseRevews">More reviews</a>
	</p>
	<div class="collapse" id="collapseRevews">
	    <?php
	}
	?>
        <div class="course-review mb-2">
    	<h4 class="author"><?php echo $value['author'] ?></h4>
    	<div class="stars <?php echo $value['stars'] ?>">
    	    <svg class="icon"><use xlink:href="#star"></use></svg>
    	    <svg class="icon"><use xlink:href="#star"></use></svg>
    	    <svg class="icon"><use xlink:href="#star"></use></svg>
    	    <svg class="icon"><use xlink:href="#star"></use></svg>
    	    <svg class="icon"><use xlink:href="#star"></use></svg>
    	</div>
    	<div class="quote">
		<?php echo $value['quote'] ?>
    	</div>
        </div>
	<?php
    }
    if ($key > 2) {
	?>
    </div>
    <?php
}
?>


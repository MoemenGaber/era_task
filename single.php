<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package era_task
 */

get_header();
?>


    <div class="single-post-content">
        <?php
        get_template_part( 'template-parts/content', 'ajax-posts',array(
	        'post'=>$post,
        ) );
        ?>
    </div>
<?php
get_footer();

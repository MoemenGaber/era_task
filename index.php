<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package era_task
 */

get_header();

$posts = get_posts();
foreach ($posts as $post){

?>
<a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
<br>

<?php
}
get_footer();

<?php
    $permalink = get_permalink($args['post']->ID);
?>

<section class="container ajax-post" data-id="<?php echo $args['post']->ID; ?>">
    <div class="row">
        <div class="col-md-12">
            <h1>
				<?php echo $args['post']->post_title; ?>
            </h1>
            <img src="<?php echo get_the_post_thumbnail_url($args['post']->ID); ?>" />
            <div class="post_content">
				<?php echo $args['post']->post_content; ?>
            </div>
        </div>
    </div>
</section>
<div class="">
<div class="col-md-12">
    <div class="post_footer">
        <h3>Never miss a story</h3>
        <span>Stay updated about McKinsey news as it happens</span>
        <div class="subscribe_section">
            <input type="text" id="loaded_posts_ids" value="">
            <a href="#" class="subscribe_button">Subscribe</a>
        </div>
    </div>
</div>
</div>
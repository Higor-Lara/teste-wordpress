<?php 

/**
 * Template Name: Page
 */


 $selected_header = get_theme_mod('selected_menu');
 $header_file = $selected_header === 'my_secondary_menu' ? 'secondary' : '';
 get_header($header_file); 
?>

<div class="single-content">
    <?php if(has_post_thumbnail()) {
        $img = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
    }
    ?>
    <p><?php echo get_the_title(); ?></p>
    <div class="post-thumbnail">
        <img src="<?php echo $img ?>">
    </div>
    <p><?php echo get_the_content() ?></p>
    
</div>

<?php echo do_shortcode('[contact-form-7 id="a692c5f" title="Contact form 1"]'); ?>
<?php get_footer(); ?>
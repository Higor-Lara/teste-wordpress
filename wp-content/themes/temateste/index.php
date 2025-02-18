<?php 
    $selected_header = get_theme_mod('selected_menu');
    $header_file = $selected_header === 'my_secondary_menu' ? 'secondary' : '';
    get_header($header_file); 
?>

<!-- Cards flash news -->
<h2 class="category_title flash-news">Flash News</h2>
<div class="area-content">
    <?php get_template_part('template-parts/content', null, array('category' => 'flash-news')); ?>
</div>

<h2 class="category_title noticias">Notícias</h2>
<div class="area-content">
    <?php get_template_part('template-parts/content', null, array('category' => 'noticias')); ?>
</div>

<h2 class="category_title tragedias">Tragédias</h2>
<div class="area-content">
    <?php get_template_part('template-parts/content', null, array('category' => 'tragedias')); ?>
</div>

<h2 class="category_title todos">Todas os cards</h2>
<div class="area-content">
    <?php get_template_part('template-parts/content', null); ?>
</div>


<?php get_footer(); ?>
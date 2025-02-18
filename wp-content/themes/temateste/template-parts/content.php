<?php 
if (isset($args)) {
    extract($args);
}
    $query_noticias = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category_name' => isset($category) ? esc_html($category) : '' ,
    )); 
    if ($query_noticias-> have_posts()) { 
        
    while ($query_noticias->have_posts()) {
    $query_noticias->the_post();
    $img = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
?>
<div class="post-content">
    <a href="<?php echo get_permalink(); ?>">
        <div>
            <img src="<?php echo $img; ?>">
        </div>
        <h3><?php echo get_the_title(); ?></h3> 
        <p><?php echo get_the_excerpt(); ?></p>  
    </a>
</div> 
<?php
    }; wp_reset_postdata();  
    }else { 
        echo 'Nenhum post encontrado.'; 
    }
?>
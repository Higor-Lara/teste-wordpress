<?php get_header(); ?>

<?php 
$query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'category_name' => 'Notícias'
)); 

if ($query-> have_posts()) { 
while ($query->have_posts()) {
$query->the_post();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
echo '<h2>' . get_the_title() . '</h2>'; 
echo "<img src=\"$img\">";
echo '<p>' . get_the_excerpt() . '</p>';     
}; wp_reset_postdata();  
}else { 
    echo 'Nenhum post encontrado.'; 
}
?>

<div>
    <h2>Está é a parte dinâmica deste projeto</h2>
</div>
<?php get_footer(); ?>
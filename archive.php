<?php get_header(); ?>
<?php
/**
 * Template Name: archieve
 */ 
get_header();
?>
<div class="archive-page">
    <h1>Archives</h1>
    <p>Tous nos articles par date :</p>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_date(); ?></p>
        <?php endwhile; 
    else : 
        echo '<p>Aucun article trouvé.</p>';
    endif; 
    ?>
</div>

<?php get_footer(); ?>
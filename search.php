<?php get_header(); ?>
<?php get_header(); ?>
<?php
/**
 * Template Name: search
 */
 get_header(); 
 ?>
 <div class="search-page">
    <h1>Résultats de recherche pour : <?php echo get_search_query(); ?></h1>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php endwhile; 
    else : 
        echo '<p>Aucun résultat trouvé.</p>';
    endif; 
    ?>
</div>

<?php get_footer(); ?>

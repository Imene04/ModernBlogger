<?php
/**
 * Template Name: Single
 */
get_header(); 
?>

<div class="single-post">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article class="post-article">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="post-meta">
                    <span class="post-date"><?php echo get_the_date(); ?></span> |
                    <span class="post-author">by <?php the_author(); ?></span>
                </div>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                <div class="post-navigation">
                    <?php 
                    previous_post_link('%link', '« Previous Post'); 
                    next_post_link('%link', 'Next Post »'); 
                    ?>
                </div>
            </article>
        <?php endwhile; 
    else : 
        echo '<p>No articles found.</p>';
    endif; 
    ?>
</div>

<?php get_footer(); ?>

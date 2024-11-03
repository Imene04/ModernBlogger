<?php get_header(); ?>
<?php
/**
 * Template Name: Category
 */ 
get_header(); ?>

<div class="category-page">
    <h1><?php single_cat_title(); ?></h1>
    <p class="category-description"><?php echo category_description(); ?></p>

    <div class="article-list">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="article-item">
                    <div class="article-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                    <div class="article-info">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span> |
                            <span class="post-category"><?php the_category(', '); ?></span>
                        </div>
                        <p class="post-excerpt"><?php the_excerpt(); ?></p>
                        <a class="btn read-more" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            <?php endwhile; 
        else : 
            echo '<p>No articles found.</p>';
        endif; 
        ?>
    </div>
</div>

<?php get_footer(); ?>

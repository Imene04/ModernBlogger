<?php
/**
 * Template Name: Blog
 */
get_header(); 
?>

<div class="blog-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/blog.jpg');">
    <h1>Our Blog</h1>
    <p>Explore enriching articles on various topics that will inspire you.</p>
</div>

<div class="blog-container">
    <div class="blog">
        <div class="featured-posts">
            <h2>Featured Articles</h2>
            <div class="featured-post">
                <?php
                // Query to display featured articles (the latest 3 articles)
                $args = array('posts_per_page' => 3);
                $featured_posts = new WP_Query($args);
                while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                    <article class="blog-post featured">
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                            <span class="badge">Popular</span>
                        </div>
                        <div class="post-info">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span> |
                                <span class="post-category"><?php the_category(', '); ?></span>
                            </div>
                            <p class="post-excerpt"><?php the_excerpt(); ?></p>
                            <a class="btn read-more" href="<?php the_permalink(); ?>">Read More</a>
                            <div class="social-share">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">Share</a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">Tweet</a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>

        <div class="blog-posts">
            <?php
            // Loop to display all articles
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <article class="blog-post">
                        <div class="post-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            <?php endif; ?>
                            <span class="badge">New</span>
                        </div>
                        <div class="post-info">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span> |
                                <span class="post-category"><?php the_category(', '); ?></span>
                            </div>
                            <p class="post-excerpt"><?php the_excerpt(); ?></p>
                            <a class="btn read-more" href="<?php the_permalink(); ?>">Read More</a>
                            <div class="social-share">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">Share</a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">Tweet</a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; 
            else : 
                echo '<p>No articles found.</p>';
            endif; 
            ?>
        </div>

        <div class="pagination">
            <?php 
            // Display pagination
            echo paginate_links(); 
            ?>
        </div>

        <div class="newsletter">
            <h2>Subscribe to Our Newsletter</h2>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="Your Email" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="faq">
            <h2>Frequently Asked Questions</h2>
            <p>Q: How can I submit an article?</p>
            <p>A: You can contact us via our contact form to submit your ideas.</p>
            <p>Q: How can I stay informed about new articles?</p>
            <p>A: Subscribe to our newsletter to receive updates directly in your inbox.</p>
        </div>
    </div>

    <aside class="sidebar">
        <h2>Recent Articles</h2>
        <ul>
            <?php
            // Display recent articles
            $recent_posts = wp_get_recent_posts(['numberposts' => 5]);
            foreach ($recent_posts as $post) : ?>
                <li><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></li>
            <?php endforeach; ?>
        </ul>

        <h2>Categories</h2>
        <ul>
            <?php
            // Display all categories, even those without articles
            $categories = get_categories(array(
                'hide_empty' => false, // Show all categories, including those without articles
            ));
            if (!empty($categories)) {
                foreach ($categories as $category) : ?>
                    <li>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    </li>
                <?php endforeach; 
            } else {
                echo '<li>No categories found.</li>';
            }
            ?>
        </ul>
    </aside>
</div>

<?php get_footer(); ?>

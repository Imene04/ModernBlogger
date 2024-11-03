<?php get_header(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css" integrity="sha512-EJp8vMVhYl7tBFE2rgNGb//drnr1+6XKMvTyamMS34YwOEFohhWkGq13tPWnK0FbjSS6D8YoA3n3bZmb3KiUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="home">
    <!-- Dynamic Banner -->
    <section class="banner">
        <h1>Welcome to Our Blog!</h1>
        <p>Discover our latest articles and stay informed on captivating topics.</p>
        <a href="#latest-posts" class="btn btn-primary">View Articles</a>
    </section>

    <!-- Featured Articles Carousel -->
    <section class="featured-posts">
        <h2>Featured Articles</h2>
        <div class="carousel">
            <?php
            $featured_query = new WP_Query(['posts_per_page' => 5, 'meta_key' => 'featured', 'meta_value' => '1']);
            while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                <div class="carousel-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                    <?php endif; ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <button class="carousel-btn prev">❮</button>
        <button class="carousel-btn next">❯</button>
    </section>

    <!-- Popular Articles -->
    <section class="popular-posts">
        <h2>Popular Articles</h2>
        <div class="popular-list">
            <?php
            $popular_query = new WP_Query(['posts_per_page' => 3, 'orderby' => 'comment_count']);
            while ($popular_query->have_posts()) : $popular_query->the_post(); ?>
                <div class="popular-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="popular-thumbnail">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                        </div>
                    <?php endif; ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="post-meta"><?php echo get_the_date(); ?> | <?php comments_number('0 comments', '1 comment', '% comments'); ?></p>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </section>

    <!-- Trending Topics -->
    <?php
    // Associative array of categories and their icons
    $category_icons = array(
        'Technology' => 'fa-solid fa-microchip',
        'Travel' => 'fa-solid fa-plane',
        'Lifestyle' => 'fa-solid fa-user-friends',
        'News' => 'fa-solid fa-newspaper',
        'Personal development' => 'fa-solid fa-user-plus',
        'Tutorials' => 'fa-solid fa-book-open',
        // Add more categories and icons here if necessary
    );
    ?>
    <section class="trending-topics">
        <h2>Trending Topics</h2>
        <ul class="trending-list">
            <?php
            // Retrieve all categories
            $categories = get_categories(array(
                'hide_empty' => false // Display all categories, even those without posts
            ));

            foreach ($categories as $category) {
                $category_link = get_category_link($category->term_id); // Get the category link
                
                // Get the icon from the array
                $icon = isset($category_icons[$category->name]) ? $category_icons[$category->name] : 'fa-solid fa-circle'; // Default icon
                
                echo '<li><a href="' . esc_url($category_link) . '"><i class="' . esc_attr($icon) . '"></i> ' . esc_html($category->name) . '</a></li>';
            }
            ?>
        </ul>
    </section>

    <!-- Reader Testimonials -->
    <section class="reader-testimonials">
        <h2>Reader Testimonials</h2>
        <div class="testimonials-list">
            <div class="testimonial-item">
                <p>"I love this blog! The articles are always interesting and well written."</p>
                <p><strong>- Marie Dupont</strong></p>
            </div>
            <div class="testimonial-item">
                <p>"The tips on health and wellness have truly changed my life."</p>
                <p><strong>- Pierre Martin</strong></p>
            </div>
            <div class="testimonial-item">
                <p>"I always find captivating subjects and useful information."</p>
                <p><strong>- Sophie Bernard</strong></p>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <h2>Subscribe to Our Newsletter</h2>
        <p>Receive the latest news and articles directly in your inbox.</p>
        <form action="#" method="post">
            <input type="email" placeholder="Your email" required>
            <button type="submit">Subscribe</button>
        </form>
    </section>
</div>

<?php get_footer(); ?>

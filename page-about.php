<?php
/**
 * Template Name: About
 */
get_header(); 
?>

<div class="about">
    <h1>About Us</h1>
    <p>Welcome to <strong><?php bloginfo('name'); ?></strong>! We are a community of enthusiasts dedicated to exploring ideas and knowledge. Our goal is to provide you with content that informs, inspires, and entertains.</p>
    
    <h2>Our Mission</h2>
    <p>At <strong><?php bloginfo('name'); ?></strong>, our mission is to create high-quality articles that add value to our audience. We believe in the power of idea exchange and collaboration to enrich our understanding of the world.</p>
    
    <h2>Our Team</h2>
    <div class="team">
        <div class="team-member">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/member1.jpg" alt="Marie Dupont">
            <h3>Marie Dupont</h3>
            <p>Editor-in-chief, Marie is passionate about creating engaging and informative content.</p>
        </div>
        <div class="team-member">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/member2.jpg" alt="Sophie Martin">
            <h3>Sophie Martin</h3>
            <p>Sophie is an expert in communication and marketing, with a talent for storytelling.</p>
        </div>
        <!-- Add more team members as needed -->
    </div>

    <h2>Why Choose Us?</h2>
    <p>We are committed to providing you with in-depth content based on research and real experiences. Each article is designed to answer your questions and help you navigate complex topics with ease.</p>

    <h2>Join Our Community</h2>
    <p>We would love to hear from you! Share your ideas, questions, or suggestions via our <a href="<?php echo esc_url(home_url('/contact')); ?>" class="contact-link">contact page</a>. Together, let's grow our community!</p>
</div>

<?php
get_footer();
?>

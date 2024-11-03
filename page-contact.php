<?php get_header(); ?>
<?php
/**
 * Template Name: Contact
 */

get_header(); 
?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>

<div class="contact-us">
    <h1>Contact Us</h1>
    <p>We would be delighted to receive your questions, suggestions, or comments.</p>
    
    <h2>Contact Information</h2>
    <div class="contact-info">
        <p><i class="fas fa-phone"></i> <strong>Phone:</strong> +33 1 23 45 67 89</p>
        <p><i class="fas fa-envelope"></i> <strong>Email:</strong> contact@yourblog.com</p>
        <p><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> 123 Example Street, 75001 Paris, France</p>
    </div>
    
    <h2>Contact Form</h2>
    <form action="#" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>
        
        <button type="submit">Send</button>
    </form>

    <h2>Our Location</h2>
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?..."></iframe>
    </div>
</div>

<?php
get_footer();
?>

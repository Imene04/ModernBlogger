<?php 
    function theme_enqueue_styles() {
        // Charger le CSS principal
        wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.15' );
    
        // Charger le CSS spécifique à chaque page
        if (is_home()) {
            wp_enqueue_style('home-style', get_template_directory_uri() . '/assets/css/index.css' , array(), '1.0.27');
        } elseif (is_page('about')) {
            wp_enqueue_style('about-style', get_template_directory_uri() . '/assets/css/about.css', array(), '1.0.12');
        } elseif (is_page_template('page-contact.php')) {
             wp_enqueue_style('contact-style', get_template_directory_uri() . '/assets/css/contact.css', array(), '1.0.17');
        }
        elseif (is_page('Blog')) {
            wp_enqueue_style('blog-style', get_template_directory_uri() . '/assets/css/blog.css', array(), '1.0.21');
        }
        elseif (is_category()) {
            wp_enqueue_style('category-style', get_template_directory_uri() . '/assets/css/category.css', array(), '1.0.8');
        }
     elseif (is_single()) { 
        wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/single.css', array(), '1.0.2'); 
    }
}  
    add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
    
    
    
    function mon_theme_customizer($wp_customize) {
        // Ajoutez une section
        $wp_customize->add_section('mon_theme_section', array(
            'title' => __('Options du thème', 'blogtheme'),
            'priority' => 30,
        ));
    
        // Ajoutez une option pour changer le logo
        $wp_customize->add_setting('mon_theme_logo');
    
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mon_theme_logo', array(
            'label' => __('Logo', 'blogtheme'),
            'section' => 'mon_theme_section',
            'settings' => 'mon_theme_logo',
        )));
    }
    
    add_action('customize_register', 'mon_theme_customizer');


    function mon_theme_setup() {
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        register_nav_menus(array(
            'main-menu' => 'Menu Principal',
        ));
    
        // Support des formats d'article
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
    }
    
    add_action('after_setup_theme', 'mon_theme_setup');
    function enqueue_font_awesome() {
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');
    }
    add_action('wp_enqueue_scripts', 'enqueue_font_awesome');
    


    // Ajouter un champ personnalisé pour les icônes de catégories
function add_category_icon_field() {
    ?>
    <div class="form-field">
        <label for="category_icon"><?php _e('Category Icon', 'textdomain'); ?></label>
        <input type="text" name="category_icon" id="category_icon" value="" />
        <p class="description"><?php _e('Enter the icon class name (e.g., fa-solid fa-laptop-code)', 'textdomain'); ?></p>
    </div>
    <?php
}

function save_category_icon_field($term_id) {
    if (isset($_POST['category_icon'])) {
        add_term_meta($term_id, 'category_icon', sanitize_text_field($_POST['category_icon']));
    }
}

add_action('category_add_form_fields', 'add_category_icon_field');
add_action('created_category', 'save_category_icon_field');

function edit_category_icon_field($term) {
    $icon = get_term_meta($term->term_id, 'category_icon', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="category_icon"><?php _e('Category Icon', 'textdomain'); ?></label></th>
        <td>
            <input type="text" name="category_icon" id="category_icon" value="<?php echo esc_attr($icon); ?>" />
            <p class="description"><?php _e('Enter the icon class name (e.g., fa-solid fa-laptop-code)', 'textdomain'); ?></p>
        </td>
    </tr>
    <?php
}

function update_category_icon_field($term_id) {
    if (isset($_POST['category_icon'])) {
        update_term_meta($term_id, 'category_icon', sanitize_text_field($_POST['category_icon']));
    }
}

add_action('category_edit_form_fields', 'edit_category_icon_field');
add_action('edited_category', 'update_category_icon_field');

// functions.php
function get_category_icons() {
    return array(
        'Technologie' => 'fa-solid fa-laptop-code',
        'Environnement' => 'fa-solid fa-leaf',
        'Voyages' => 'fa-solid fa-plane',
        'Lifestyle' => 'fa-solid fa-user-friends',
        'Santé' => 'fa-solid fa-heartbeat',
       
    );
}

    ?>
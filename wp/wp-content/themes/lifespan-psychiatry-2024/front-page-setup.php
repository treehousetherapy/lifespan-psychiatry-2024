<?php
/**
 * Template Name: Front Page with Setup
 * 
 * This is a special template that will display the front page
 * and also run the setup if needed.
 */

// Force setup to run if not completed
if (!get_option('lifespan_setup_complete')) {
    // Include setup functionality
    require_once get_template_directory() . '/setup-theme.php';
    
    // Run setup if not done
    if (function_exists('lifespan_setup_theme')) {
        lifespan_setup_theme();
    }
}

// Normal front page template
get_header();
?>

<main id="primary" class="site-main">
    
    <?php 
    // Include hero section
    get_template_part('template-parts/homepage/hero'); 
    
    // Include trust indicators section
    get_template_part('template-parts/homepage/trust-indicators');
    
    // Include services overview section
    get_template_part('template-parts/homepage/services-overview');
    
    // Include conditions section
    get_template_part('template-parts/homepage/conditions-section');
    
    // Include CTA section
    get_template_part('template-parts/homepage/cta-section');
    ?>
    
</main><!-- #main -->

<?php get_footer(); ?>








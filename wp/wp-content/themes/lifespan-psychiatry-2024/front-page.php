<?php
/**
 * The front page template file
 *
 * @package LifespanPsychiatry
 */

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
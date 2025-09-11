<?php
/**
 * Template Name: Providers Grid
 * 
 * Template for displaying all providers in a grid layout
 *
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    if (!function_exists('lifespan_find_provider_headshot')) {
        function lifespan_find_provider_headshot($title) {
            $dir = get_stylesheet_directory() . '/assets/images';
            if (!is_dir($dir)) { return ''; }
            $entries = scandir($dir);
            $title_low = strtolower($title);
            $name_tokens = preg_split('/[^a-z0-9]+/i', $title_low, -1, PREG_SPLIT_NO_EMPTY);
            $first = isset($name_tokens[0]) ? preg_replace('/[^a-z0-9]+/i','',$name_tokens[0]) : '';
            $last  = isset($name_tokens[1]) ? preg_replace('/[^a-z0-9]+/i','',$name_tokens[1]) : '';
            // Pass 1: require both first and last
            foreach ($entries as $file) {
                if ($file === '.' || $file === '..') { continue; }
                if (!preg_match('/\.(jpe?g|png|webp)$/i', $file)) { continue; }
                $norm_clean = preg_replace('/[^a-z0-9]+/i', '', strtolower($file));
                if ($first && $last && strpos($norm_clean, $first) !== false && strpos($norm_clean, $last) !== false) {
                    return trailingslashit(get_stylesheet_directory_uri()) . 'assets/images/' . rawurlencode($file);
                }
            }
            // Pass 2: require at least first OR last (no generic tokens to avoid wrong matches)
            foreach ($entries as $file) {
                if ($file === '.' || $file === '..') { continue; }
                if (!preg_match('/\.(jpe?g|png|webp)$/i', $file)) { continue; }
                $norm_clean = preg_replace('/[^a-z0-9]+/i', '', strtolower($file));
                if (($first && strpos($norm_clean, $first) !== false) || ($last && strpos($norm_clean, $last) !== false)) {
                    return trailingslashit(get_stylesheet_directory_uri()) . 'assets/images/' . rawurlencode($file);
                }
            }
            return '';
        }
    }
    ?>
    <!-- Removed duplicate page hero to avoid repeating title -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('providers-page'); ?>>
        <div class="container">
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <div class="page-intro">
                    <p>Meet our experienced team of mental health providers at Lifespan Psychiatry. Our specialists are dedicated to providing compassionate, evidence-based care to support you on your mental health journey.</p>
                </div>
            </header>

            <div class="providers-grid">
                <?php
                // Query all pages that use the provider template or have the provider tag
                $provider_pages = new WP_Query(array(
                    'post_type' => 'page',
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => '_wp_page_template',
                            'value' => 'page-templates/provider-single.php',
                            'compare' => '='
                        ),
                        array(
                            'key' => 'provider_credentials',
                            'compare' => 'EXISTS'
                        )
                    ),
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                ));

                // If no providers are found via template, look for pages with "provider-" in the slug
                if (!$provider_pages->have_posts()) {
                    $provider_pages = new WP_Query(array(
                        'post_type' => 'page',
                        'name__like' => 'provider-',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC',
                    ));
                }

                if ($provider_pages->have_posts()) :
                    while ($provider_pages->have_posts()) : $provider_pages->the_post();
                        
                        // Get provider info
                        $provider_credentials = get_post_meta(get_the_ID(), 'provider_credentials', true);
                        $provider_specialty = get_post_meta(get_the_ID(), 'provider_specialty', true);
                        $provider_accepting = get_post_meta(get_the_ID(), 'provider_accepting', true);
                        
                        // Get provider initials for placeholder
                        $name_parts = explode(' ', get_the_title());
                        $initials = '';
                        if (count($name_parts) >= 2) {
                            $initials = substr($name_parts[0], 0, 1) . substr($name_parts[count($name_parts)-1], 0, 1);
                        } else {
                            $initials = substr(get_the_title(), 0, 2);
                        }
                ?>
                    <div class="provider-card">
                        <a href="<?php the_permalink(); ?>" class="provider-link">
                            <div class="provider-image">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', ['class' => 'provider-photo']);
                                } else {
                                    $headshot_url = lifespan_find_provider_headshot(get_the_title());
                                    if (!empty($headshot_url)) {
                                        echo '<img src="' . esc_url($headshot_url) . '" alt="' . esc_attr(get_the_title()) . '" class="provider-photo" />';
                                    } else {
                                        echo '<div class="provider-placeholder"><div class="provider-initials">' . esc_html($initials) . '</div></div>';
                                    }
                                }
                                ?>
                            </div>
                            
                            <div class="provider-info">
                                <h2 class="provider-name"><?php the_title(); ?></h2>
                                
                                <?php if ($provider_credentials) : ?>
                                    <div class="provider-credentials"><?php echo esc_html($provider_credentials); ?></div>
                                <?php endif; ?>
                                
                                <?php if ($provider_specialty) : ?>
                                    <div class="provider-specialty"><?php echo esc_html($provider_specialty); ?></div>
                                <?php endif; ?>
                                
                                <?php if ($provider_accepting === 'yes') : ?>
                                    <div class="provider-accepting">Currently accepting new patients</div>
                                <?php endif; ?>
                            </div>
                        </a>
                        
                        <div class="provider-cta">
                            <a href="/contact/" class="btn btn-primary">Book Appointment</a>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline">View Profile</a>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <div class="no-providers">
                        <p>No providers found. Please check back soon as we update our team information.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="providers-info-section">
                <h2>Why Choose Our Providers?</h2>
                <div class="providers-info-grid">
                    <div class="info-card">
                        <div class="info-icon">🧠</div>
                        <h3>Expert Care</h3>
                        <p>Our providers are board-certified specialists with extensive training in mental health treatment approaches.</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">🤝</div>
                        <h3>Compassionate Approach</h3>
                        <p>We believe in building strong therapeutic relationships with each patient, providing a safe and supportive environment.</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">📋</div>
                        <h3>Personalized Treatment</h3>
                        <p>We develop individualized care plans tailored to your specific needs and circumstances.</p>
                    </div>
                </div>
            </div>
            
            <div class="providers-cta-section">
                <h2>Ready to Begin Your Mental Health Journey?</h2>
                <p>Our providers are ready to help you feel better. Contact us today to schedule an appointment.</p>
                <a href="/contact/" class="btn btn-large btn-primary">Book an Appointment</a>
            </div>
        </div>
    </article>
</main>

<style>
/* Provider Grid Styles */
.providers-page {
    padding: 4rem 0;
}

.page-header {
    margin-bottom: 3rem;
    text-align: center;
}

.page-title {
    margin-bottom: 1rem;
}

.page-intro {
    max-width: 800px;
    margin: 0 auto 2rem;
}

.providers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.provider-card {
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s, box-shadow 0.2s;
}

.provider-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.provider-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.provider-image {
    height: 300px;
    background-color: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
}

.provider-photo {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
}

.provider-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--color-primary);
}

.provider-initials {
    font-size: 4rem;
    font-weight: 600;
    color: white;
}

.provider-info {
    padding: 1.5rem;
    border-bottom: 1px solid #eee;
}

.provider-name {
    margin: 0 0 0.5rem;
    font-size: 1.5rem;
}

.provider-credentials {
    font-size: 1rem;
    color: var(--color-text-light);
    margin-bottom: 0.5rem;
}

.provider-specialty {
    font-size: 0.95rem;
    margin-bottom: 0.75rem;
}

.provider-accepting {
    font-size: 0.9rem;
    color: #117a38;
    font-weight: 500;
}

.provider-cta {
    display: flex;
    padding: 1rem 1.5rem;
    gap: 0.75rem;
}

.provider-cta .btn {
    flex: 1;
    text-align: center;
    padding: 0.75rem 0;
    font-size: 0.9rem;
}

.btn-outline {
    border: 1px solid var(--color-primary);
    color: var(--color-primary);
    background-color: transparent;
}

.btn-outline:hover {
    background-color: rgba(0, 85, 183, 0.05);
}

/* Info section */
.providers-info-section {
    margin-bottom: 4rem;
    text-align: center;
}

.providers-info-section h2 {
    margin-bottom: 2rem;
}

.providers-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.info-card {
    padding: 2rem;
    background-color: #f8f9fa;
    border-radius: 8px;
}

.info-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

/* CTA section */
.providers-cta-section {
    text-align: center;
    padding: 3rem 2rem;
    background-color: #f8f9fa;
    border-radius: 8px;
}

.providers-cta-section h2 {
    margin-bottom: 1rem;
}

.providers-cta-section p {
    max-width: 600px;
    margin: 0 auto 2rem;
}

.btn-large {
    padding: 0.75rem 2rem;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .providers-page {
        padding: 2rem 0;
    }
    
    .provider-cta {
        flex-direction: column;
    }
    
    .providers-info-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>








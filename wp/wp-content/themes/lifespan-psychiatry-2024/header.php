<?php
/**
 * The header for our theme - Professional Geode Health inspired design
 *
 * @package LifespanPsychiatry
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<!-- Preconnect to Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	
	<?php wp_head(); ?>
	
	<!-- Real Logo Style Override -->
	<style>
	.real-logo,
	.custom-logo-link {
		text-decoration: none;
		display: inline-block;
	}
	.real-logo img,
	.custom-logo-link img,
	.custom-logo {
		max-height: 200px !important; /* Larger logo for stronger brand presence */
		width: auto !important;
		margin: 10px 0;
		height: auto !important;
	}
	.header-content {
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 2rem;
		padding: 0.75rem 0;
	}
	/* Make the site branding take up more space */
	.site-branding {
		flex: 0 0 auto;
		max-width: none;
	}
    /* Center the navigation between logo and actions */
    .main-navigation { flex: 1 1 auto; display: flex; justify-content: center; }
	@media (max-width: 992px) {
		.real-logo img,
		.custom-logo-link img,
		.custom-logo {
			max-height: 180px !important;
		}
	}
	@media (max-width: 768px) {
		.real-logo img,
		.custom-logo-link img,
		.custom-logo {
			max-height: 160px !important;
		}
	}
	@media (max-width: 480px) {
		.real-logo img,
		.custom-logo-link img,
		.custom-logo {
			max-height: 140px !important;
		}
	}
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to main content', 'lifespan-psychiatry' ); ?></a>

	<!-- Top Notification Bar -->
	<div class="top-notification">
		<div class="container">
			<p><strong>Same Week Appointments – Book Today!</strong></p>
		</div>
	</div>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-content">
				<div class="site-branding">
					<!-- Real Logo Override with custom logo support and cache-busting -->
					<?php
					// Prefer WordPress custom logo if set
					if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
						the_custom_logo();
					} else {
						$trimmed_path = get_stylesheet_directory() . '/assets/images/lifespan-logo-transparent.png';
						$png_path     = get_stylesheet_directory() . '/assets/images/lifespan-logo-transparent.png';

						// Choose the most recently updated logo between trimmed and full
						$use_path = null;
						if ( file_exists( $trimmed_path ) && file_exists( $png_path ) ) {
							$use_path = ( filemtime( $png_path ) > filemtime( $trimmed_path ) ) ? $png_path : $trimmed_path;
						} elseif ( file_exists( $trimmed_path ) ) {
							$use_path = $trimmed_path;
						} else {
							$use_path = $png_path;
						}

						$logo_uri = str_replace( get_stylesheet_directory(), get_stylesheet_directory_uri(), $use_path );
						$cache_buster = file_exists( $use_path ) ? '?v=' . filemtime( $use_path ) : '';
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="real-logo" rel="home">
							<img src="<?php echo esc_url( $logo_uri . $cache_buster ); ?>" 
								alt="Lifespan Psychiatry & Wellness" 
								width="520" height="130">
						</a>
						<?php
					}
					?>
				</div><!-- .site-branding -->

				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="menu-icon" aria-hidden="true">
						<span class="bar"></span>
						<span class="bar"></span>
						<span class="bar"></span>
					</span>
					<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'lifespan-psychiatry' ); ?></span>
				</button>

				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'lifespan-psychiatry' ); ?>">
					<?php
					$menu_html = wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'menu_class'     => 'nav-menu',
							'fallback_cb'    => false,
							'echo'           => false,
						)
					);
					$li_count = substr_count( (string) $menu_html, '<li' );
					if ( $li_count < 3 ) {
						lifespan_psychiatry_fallback_menu();
					} else {
						echo $menu_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>
				</nav><!-- #site-navigation -->
				
				<div class="header-actions">
					<a href="/book-now/" class="btn btn-primary">Book now</a>
					<a href="/login/" class="btn btn-outline">Log in</a>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<!-- Mobile overlay for off-canvas menu -->
	<div class="mobile-overlay" aria-hidden="true"></div>

<style>
/* Homepage hero color overrides */
body.home .wp-block-cover h1,
body.home .wp-block-group.alignfull h1,
body.home .hero h1 { color: #7B61FF !important; }
body.home .wp-block-cover p,
body.home .wp-block-group.alignfull p,
body.home .hero p { color: #7B61FF !important; }

/* Header Styles */
.top-notification {
	background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
	color: white;
	text-align: center;
	padding: 0.5rem 0;
	font-size: 0.9rem;
}

.top-notification p {
	margin: 0;
}

.site-header {
	background-color: white;
	box-shadow: var(--shadow-sm);
	position: sticky;
	top: 0;
	z-index: 1000;
}

/* Header layout is now defined in the logo style override section */

.site-logo {
	display: flex;
	align-items: center;
	gap: 0.5rem;
	text-decoration: none;
	font-size: 1.5rem;
	font-weight: 700;
	color: var(--primary-color);
}

.logo-icon {
	font-size: 2rem;
}

.logo-text {
	font-family: var(--font-family-heading);
}

.main-navigation .nav-menu { display: flex; list-style: none; margin: 0; padding: 0; gap: 2.75rem; }

.main-navigation .nav-menu li {
	margin: 0;
	position: relative;
}

.main-navigation .nav-menu a { color: var(--text-dark); font-weight: 700; font-size: 1.0625rem; font-family: 'Poppins', Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; padding: 0.5rem 0.25rem; text-decoration: none; letter-spacing: 0.3px; transition: color var(--transition-fast); position: relative; white-space: nowrap; }
.main-navigation .nav-menu a:visited { color: var(--text-dark); }

.main-navigation .nav-menu a:hover,
.main-navigation .nav-menu a:focus,
.main-navigation .nav-menu .current-menu-item > a,
.main-navigation .nav-menu .current_page_item > a { color: var(--primary-color); text-decoration: none; }

.main-navigation .nav-menu a::after { content: ''; position: absolute; bottom: -6px; left: 0; width: 0; height: 3px; background-color: var(--primary-color); transition: width var(--transition-fast); display: block; border-radius: 2px; }

.main-navigation .nav-menu a:hover::after,
.main-navigation .nav-menu a:focus::after,
.main-navigation .nav-menu .current-menu-item > a::after,
.main-navigation .nav-menu .current_page_item > a::after { width: 100%; }

.header-actions {
	display: flex;
	gap: 1rem;
	align-items: center;
}

.header-actions .btn {
	padding: 0.5rem 1rem;
	font-size: 0.9rem;
	white-space: nowrap;
}

/* Dropdown Menu Styles */
.main-navigation .nav-menu .sub-menu {
	position: absolute;
	top: 100%;
	left: 0;
	background: white;
	box-shadow: var(--shadow-lg);
	border-radius: var(--border-radius-md);
	padding: 0.5rem 0;
	min-width: 200px;
	opacity: 0;
	visibility: hidden;
	transform: translateY(-10px);
	transition: all var(--transition-fast);
	z-index: 1000;
}

.main-navigation .nav-menu li:hover .sub-menu,
.main-navigation .nav-menu li:focus-within .sub-menu {
	opacity: 1;
	visibility: visible;
	transform: translateY(0);
}

.main-navigation .nav-menu .sub-menu a {
	display: block;
	padding: 0.75rem 1rem;
	color: var(--text-medium);
	border-bottom: none;
}

.main-navigation .nav-menu .sub-menu a:hover {
	background-color: var(--background-light);
	color: var(--primary-color);
}

/* Mobile Menu Toggle */
.menu-toggle {
	display: none;
	background: none;
	border: none;
	color: var(--text-dark);
	cursor: pointer;
	padding: 0.5rem;
}

.menu-toggle:focus {
	outline: 2px solid var(--primary-color);
	outline-offset: 2px;
}

/* Mobile Styles */
@media (max-width: 1024px) {
	.header-content {
		flex-wrap: wrap;
	}
	
	.header-actions .btn {
		padding: 0.4rem 0.8rem;
		font-size: 0.85rem;
	}
}

@media (max-width: 768px) {
	/* Mobile header layout */
	.menu-toggle { display: block; order: 2; }
	.menu-toggle .menu-icon { display: inline-flex; flex-direction: column; gap: 5px; }
	.menu-toggle .bar { display: block; width: 24px; height: 2px; background: var(--text-dark); border-radius: 2px; transition: transform var(--transition-fast), opacity var(--transition-fast); }
	.menu-toggle.open .bar:nth-child(1) { transform: translateY(7px) rotate(45deg); }
	.menu-toggle.open .bar:nth-child(2) { opacity: 0; }
	.menu-toggle.open .bar:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

	/* Smaller logo on mobile */
	.real-logo img,
	.custom-logo-link img,
	.custom-logo { max-height: 56px !important; }
	
	.main-navigation {
		order: 3;
		flex-basis: auto;
	}
	
	/* Off-canvas menu */
	.main-navigation .nav-menu { position: fixed; inset: 0 auto 0 0; top: 0; left: 0; height: 100vh; width: 80%; max-width: 320px; display: flex; flex-direction: column; gap: 0; background: #fff; box-shadow: var(--shadow-lg); border-radius: 0; padding: 1.25rem; margin-top: 0; transform: translateX(-100%); transition: transform var(--transition-fast); z-index: 1100; }
	
	.main-navigation .nav-menu.active { transform: translateX(0); }

	/* Overlay behind the drawer */
	.mobile-overlay { position: fixed; inset: 0; background: rgba(0,0,0,.45); opacity: 0; visibility: hidden; transition: opacity var(--transition-fast), visibility var(--transition-fast); z-index: 1000; }
	.mobile-overlay.active { opacity: 1; visibility: visible; }
	
	.main-navigation .nav-menu a {
		padding: 0.9rem 0.25rem;
		border-bottom: 1px solid var(--border-color);
		font-size: 1.05rem;
	}
	
	.main-navigation .nav-menu li:last-child a {
		border-bottom: none;
	}
	
	.main-navigation .nav-menu .sub-menu {
		position: static;
		opacity: 1;
		visibility: visible;
		transform: none;
		box-shadow: none;
		background: var(--background-light);
		margin-top: 0.5rem;
		border-radius: var(--border-radius-sm);
	}
	
	.header-actions {
		gap: 0.5rem;
		order: 4;
		flex-basis: 100%;
		justify-content: center;
		margin-top: 0.5rem;
	}
	
	.header-actions .btn {
		padding: 0.6rem 0.9rem;
		font-size: 0.85rem;
		flex: 0 0 auto;
		text-align: center;
	}

	/* Hero adjustments on mobile */
	.hero .container { padding-top: 2rem; padding-bottom: 2rem; }
	.hero h1 { font-size: 2rem; line-height: 1.2; margin-bottom: 0.75rem; }
	.hero p { font-size: 1.0625rem; line-height: 1.6; margin-bottom: 1rem; }
	.hero .flex { justify-content: center; }
	.hero a[class*="px-"] { border-radius: 0.5rem; font-weight: 700; }

	/* Gutenberg cover hero adjustments */
	.wp-block-cover { min-height: 50vh; }
	.wp-block-cover h1 { font-size: 2rem; line-height: 1.2; }
	.wp-block-cover p { font-size: 1.0625rem; line-height: 1.6; }
	.wp-block-buttons { display: flex; justify-content: center; }
	.wp-block-button__link { padding: 0.9rem 1.1rem; border-radius: 8px; font-weight: 700; }
}

@media (max-width: 480px) {
	.site-logo { font-size: 1.25rem; }
	.logo-icon { font-size: 1.5rem; }
	.real-logo img,
	.custom-logo-link img,
	.custom-logo { max-height: 52px !important; }

	/* Very small phones: typography */
	.hero h1, .wp-block-cover h1 { font-size: 1.75rem; }
	.hero p, .wp-block-cover p { font-size: 1rem; }
}

/* Narrow iPhones (375px) */
@media (max-width: 375px) {
	.hero h1, .wp-block-cover h1 { font-size: 1.625rem; }
	.hero p, .wp-block-cover p { font-size: 0.975rem; }
}

/* Smallest iPhones (320px) */
@media (max-width: 320px) {
	.hero h1, .wp-block-cover h1 { font-size: 1.5rem; }
	.hero p, .wp-block-cover p { font-size: 0.95rem; }
}
</style>

<script>
// Mobile menu: off-canvas with overlay, ESC to close, scroll lock
document.addEventListener('DOMContentLoaded', function() {
	const menuToggle = document.querySelector('.menu-toggle');
	const navMenu = document.querySelector('.nav-menu');
	const overlay = document.querySelector('.mobile-overlay');
	const focusableSelectors = 'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])';
	let previousActiveElement = null;

	function openMenu() {
		if (!navMenu) return;
		previousActiveElement = document.activeElement;
		navMenu.classList.add('active');
		overlay && overlay.classList.add('active');
		menuToggle && menuToggle.classList.add('open');
		menuToggle && menuToggle.setAttribute('aria-expanded', 'true');
		document.body.style.overflow = 'hidden';
		const firstFocusable = navMenu.querySelector(focusableSelectors);
		if (firstFocusable) firstFocusable.focus();
	}

	function closeMenu() {
		if (!navMenu) return;
		navMenu.classList.remove('active');
		overlay && overlay.classList.remove('active');
		menuToggle && menuToggle.classList.remove('open');
		menuToggle && menuToggle.setAttribute('aria-expanded', 'false');
		document.body.style.overflow = '';
		if (previousActiveElement) previousActiveElement.focus({ preventScroll: true });
	}

	if (menuToggle && navMenu) {
		menuToggle.addEventListener('click', function() {
			const isOpen = navMenu.classList.contains('active');
			isOpen ? closeMenu() : openMenu();
		});
	}

	overlay && overlay.addEventListener('click', closeMenu);

	navMenu && navMenu.addEventListener('click', function(e) {
		const target = e.target;
		if (target && target.tagName === 'A') {
			closeMenu();
		}
	});

	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape' && navMenu && navMenu.classList.contains('active')) {
			closeMenu();
		}
	});

	window.addEventListener('resize', function() {
		if (window.innerWidth > 1024) {
			closeMenu();
		}
	});
});
</script>

<?php
// Fallback menu function
if (!function_exists('lifespan_psychiatry_fallback_menu')) {
	function lifespan_psychiatry_fallback_menu() {
		echo '<ul class="nav-menu">';
		echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
		echo '<li><a href="' . esc_url(home_url('/what-we-treat/')) . '">What we treat</a></li>';
		echo '<li><a href="' . esc_url(home_url('/services/')) . '">Services</a></li>';
		echo '<li><a href="' . esc_url(home_url('/our-providers/')) . '">Our Providers</a></li>';
		echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
		echo '</ul>';
	}
}
?>




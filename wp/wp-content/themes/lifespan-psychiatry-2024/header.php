<?php
/**
 * The header for our theme
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
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lifespan-psychiatry' ); ?></a>

	<header id="masthead" class="site-header bg-white shadow-md sticky top-0 z-50">
		<div class="container mx-auto px-4">
			<div class="flex justify-between items-center py-4">
				<div class="site-branding">
					<?php
					if ( has_custom_logo() ) :
						the_custom_logo();
					else :
					?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-primary font-bold text-2xl" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation hidden md:block" aria-label="<?php esc_attr_e( 'Primary Menu', 'lifespan-psychiatry' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'menu_class'     => 'flex space-x-6 items-center',
							'fallback_cb'    => false,
						)
					);
					?>
				</nav><!-- #site-navigation -->

				<div class="flex md:hidden" x-data="{ mobileMenuOpen: false }">
					<button @click="mobileMenuOpen = true" class="text-primary" aria-label="Open mobile menu">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
						</svg>
					</button>
					
					<div x-show="mobileMenuOpen" 
						 x-transition:enter="transition ease-out duration-200" 
						 x-transition:enter-start="opacity-0 transform translate-x-full" 
						 x-transition:enter-end="opacity-100 transform translate-x-0" 
						 x-transition:leave="transition ease-in duration-200" 
						 x-transition:leave-start="opacity-100 transform translate-x-0" 
						 x-transition:leave-end="opacity-0 transform translate-x-full" 
						 class="fixed top-0 right-0 w-full h-full bg-white z-50 overflow-y-auto">
						
						<div class="flex justify-between items-center p-4 border-b">
							<div class="site-branding">
								<?php
								if ( has_custom_logo() ) :
									the_custom_logo();
								else :
								?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-primary font-bold text-2xl" rel="home">
										<?php bloginfo( 'name' ); ?>
									</a>
								<?php endif; ?>
							</div>
							
							<button @click="mobileMenuOpen = false" class="text-primary" aria-label="Close mobile menu">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</button>
						</div>
						
						<nav class="mobile-navigation p-4">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_id'        => 'mobile-menu',
									'container'      => false,
									'menu_class'     => 'mobile-menu',
									'fallback_cb'    => false,
								)
							);
							?>
						</nav>
						
						<div class="p-4 border-t">
							<a href="/contact/" class="block w-full py-3 bg-primary text-white text-center font-semibold rounded-md">
								Book Appointment
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->








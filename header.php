<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="format-detection" content="telephone=no"/>
	
	<link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/themes/ec_original_01/css/bootstrap.min.css">
	<?php $timestamp = time() ?>
	<link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/themes/ec_original_01/css/design.css?<?php echo $timestamp; ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
        <?php if( ( is_front_page() || is_home() ) && get_header_image() ): ?>
            <div class="main-image" style="background-image: url('<?php header_image(); ?>');">
                <?php /*
                <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>">
                */ ?>
            </div><!-- main-image -->
        <?php endif; ?>
	
		
		<div id="mainMenu" class="fixedmenu">
            <div class="inner cf">

                <?php if(! welcart_basic_is_cart_page()): ?>
                    <div class="snav cf">

                        <div class="search-box">
                            <i class="fa fa-search"></i>
                            <?php get_search_form(); ?>
                        </div>

                        <?php if(usces_is_membersystem_state()): ?>
                            <div class="membership">
                                <i class="fa fa-user"></i>
                                <ul class="cf">
                                    <?php if( usces_is_login() ): ?>
                                        <li><?php printf(__('Hello %s', 'usces'), usces_the_member_name('return')); ?></li>
                                        <li><?php usces_loginout(); ?></li>
                                        <li><a href="<?php echo USCES_MEMBER_URL; ?>"><?php _e('My page', 'welcart_basic') ?></a></li>
                                    <?php else: ?>
                                        <li><?php _e('guest', 'usces'); ?></li>
                                        <li><?php usces_loginout(); ?></li>
                                        <li><a href="<?php echo USCES_NEWMEMBER_URL; ?>"><?php _e('New Membership Registration','usces') ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="incart-btn">
                            <a href="<?php echo USCES_CART_URL; ?>">
                                <i class="fa fa-shopping-cart">
                                    <span><?php _e('In the cart', 'usces') ?></span>
                                </i>
                                <?php if(! defined( 'WCEX_WIDGET_CART' ) ): ?>
                                    <span class="total-quant"><?php usces_totalquantity_in_cart(); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div><!-- .snav -->
                <?php endif; ?>

                <div class="container">
                    <p class="site-description">
                        <?php bloginfo( 'description' ); ?>
                    </p>

                    <?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
                    <<?php echo $heading_tag; ?> class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </<?php echo $heading_tag; ?>>
                </div>

            </div><!-- .inner -->
            <div class="container">
                <div class="row">
                <?php /*if(! welcart_basic_is_cart_page()):*/ ?>
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <label for="panel"><span></span></label>
                        <input type="checkbox" id="panel" class="on-off" />
                        <?php 
                            $page_c	=	get_page_by_path('usces-cart');
                            $page_m	=	get_page_by_path('usces-member');
                            $pages	=	"{$page_c->ID},{$page_m->ID}";
                            wp_nav_menu( array( 'theme_location' => 'header', 'container_class' => 'nav-menu-open' , 'exclude' => $pages ,  'menu_class' => 'header-nav-container cf' ) );
                        ?>
                    </nav><!-- #site-navigation -->
                <?php /*endif;*/ ?>
                </div>
            </div>
		</div>


	</header><!-- #masthead -->

	<?php 
		if( is_front_page() || is_home() || welcart_basic_is_cart_page() || welcart_basic_is_member_page() ) {
			$class = 'one-column';	
		}else {
			$class = 'two-column right-set';
		};
	?>
	
	<div id="main" class="wrapper <?php /*echo $class;*/ ?>">
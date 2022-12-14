<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <?php wp_head();?>
<script type='text/javascript'>
window.__lo_site_id = 327625;
	(function() {
		var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
		wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
	  })();
</script>    
</head>
<body <?php body_class();?>>
<header>
    <div class="wrapper blue top-bar">
        <div class="container-xl text-white right">
            <p>
               <?php if ( is_account_page() || is_woocommerce() || is_checkout() || is_cart() ) { ?>
               	<a href="/my-account/">Your Account</a>
               	<a href="/basket/">Your Basket</a>
                <a href="/checkout/">Checkout</a>
               <?php } ?>

                <?php if (get_theme_mod('hsd_contact_phone')): ?>
                    <a href="tel:<?php echo (get_theme_mod('hsd_contact_phone')); ?>">
                        <span class="fas fa-phone-alt icon"></span> <span class="text"><?php echo (get_theme_mod('hsd_contact_phone')); ?></span>
                    </a>
                <?php endif;?>
                <?php if (get_theme_mod('hsd_contact_email')): ?>
                    <a href="mailto:<?php echo (get_theme_mod('hsd_contact_email')); ?>">
                        <span class="fas fa-envelope icon"></span> <span class="text"><?php echo (get_theme_mod('hsd_contact_email')); ?></span>
                    </a>
                <?php endif;?>
            </p>

        </div>
    </div>
    <div class="wrapper">
        <div class="container-xl">
            <nav class="navbar navbar-expand-xl navbar-light">
                <?php if (get_theme_mod('hsd_logo')): ?>
                <a class="navbar-brand" href='<?php echo esc_url(home_url('')); ?>' title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'><img class="logo" src='<?php echo esc_url(get_theme_mod('hsd_logo')); ?>' alt='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'></a>
                <?php endif;?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hsdnavbar" aria-controls="hsdnavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="hsdnavbar">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'main',
                        'depth'           => 2,
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'navbar-nav ml-auto',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                </div>
				
            </nav>
        </div>
    </div>
</header>
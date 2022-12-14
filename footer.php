<footer>
<!--<div class="call-back wrapper blue text-white paddingtopxsm paddingbottomxsm">
    <div class="container-fluid">
        <span id='close'>x</span>
        <div class="row justify-content-center">
            <div class="col-11 col-xl-10 text-center">
                <h4>Request a call back</h4>
                <?php echo do_shortcode('[gravityform id="3" title="false" description="false"]'); ?>
            </div>
        </div>
    </div>
</div>-->

<div class="wrapper grey has-background newsletter slim aos ">
    <div class="container text-center">
        <h2>Sign up to our newsletter</h2>
        <?php echo do_shortcode('[mc4wp_form id="2301"]'); ?>
    </div>
</div>
<div class="wrapper dark-grey text-white has-background xslim">
    <div class="container-narrow"> 
        <ul class="social-icons aos">
            <?php if ( get_theme_mod( 'hsd_social_twitter' ) ) : ?>
                <li><a href="<?php echo ( get_theme_mod( 'hsd_social_twitter' ) ); ?>" title="Twitter"><span class="fab icon fa-twitter"></span></a></li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'hsd_social_facebook' ) ) : ?>
                <li><a href="<?php echo ( get_theme_mod( 'hsd_social_facebook' ) ); ?>" title="Facebook"><span class="fab icon fa-facebook"></span></a></li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'hsd_social_youtube' ) ) : ?>
                <li><a href="<?php echo ( get_theme_mod( 'hsd_social_youtube' ) ); ?>" title="Youtube"><span class="fab icon fa-youtube"></span></a></li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'hsd_social_instagram' ) ) : ?>
                <li><a href="<?php echo ( get_theme_mod( 'hsd_social_instagram' ) ); ?>" title="Instagram"><span class="fab icon fa-instagram"></span></a></li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'hsd_social_linkedin' ) ) : ?>
                <li><a href="<?php echo ( get_theme_mod( 'hsd_social_linkedin' ) ); ?>" title="Linkedin"><span class="fab icon fa-linkedin"></span></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div id="footer-menu" class="wrapper footer blue text-white has-background slim ">
    <div class="container-xl aos">
        <div class="row spacer">
            <div class="col-lg left spacer">
                <img class="logo" src='<?php echo esc_url( get_theme_mod( 'hsd_footer_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                <ul class="contact-details">
                    <?php if ( get_theme_mod( 'hsd_contact_phone' ) ) : ?>
                    <li><a href="tel:<?php echo ( get_theme_mod( 'hsd_contact_phone' ) ); ?>"><span class="fas icon fa-phone-alt"></span><?php echo ( get_theme_mod( 'hsd_contact_phone' ) ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'hsd_contact_fax' ) ) : ?>
                    <li><a href="tel:<?php echo ( get_theme_mod( 'hsd_contact_fax' ) ); ?>"><span class="fas icon fa-fax"></span><?php echo ( get_theme_mod( 'hsd_contact_fax' ) ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'hsd_contact_email' ) ) : ?>
                    <li><a href="mailto:<?php echo ( get_theme_mod( 'hsd_contact_email' ) ); ?>"><span class="fas icon fa-envelope"></span><?php echo ( get_theme_mod( 'hsd_contact_email' ) ); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-lg left spacer">    
                <?php dynamic_sidebar( 'footer' ); ?>
            </div>
            <div class="col-lg left spacer">    
                <?php dynamic_sidebar( 'footer2' ); ?>
            </div>
            <div class="col-lg left spacer">    
                <?php dynamic_sidebar( 'footer3' ); ?>
            </div>
            <div class=" col-lg left spacer">    
                <?php dynamic_sidebar( 'footer4' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 left">
                <p class="small-text">&copy; Gartec Limited <?php echo date("Y"); ?>. All rights reserved. | UK Registered: 02898632 | Gartec Lifts, Midshires Business Park, Unit 6, Smeaton Cl, Aylesbury HP19 8HL</p>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</footer>
</body>
</html>

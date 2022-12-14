<?php get_header(); ?>
<main>
<?php if ( get_theme_mod( 'hsd_casestudies_img' ) ) : ?>
    <div class="wrapper has-background full-height hero" style="background-image: url('<?php echo esc_url( get_theme_mod( 'hsd_casestudies_img' ) ); ?>'); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="page-title">
                <h1>Our Case Studies</h1>
                <?php if ( get_theme_mod( 'hsd_casestudies_text' ) ) : ?><p><?php echo ( get_theme_mod( 'hsd_casestudies_text' ) ); ?></p><?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ( have_posts() ) : ?>
<div class="wrapper">
    <div class="container">
        <div class="blog-feed">
            <?php while ( have_posts() ) : the_post(); ?>
                <a class="blog-feed-link " href="<?php the_permalink(); ?>" title="<?php the_field('location'); ?> - <?php the_field('lift_type'); ?>">
                <?php if(get_the_post_thumbnail()){
                        the_post_thumbnail('landscape', array('class' => 'thumbnail')); 
                    } else{ ?>
                        <img class="thumbnail" src="<?php echo esc_url( get_theme_mod( 'hsd_casestudies_img' ) ); ?>" alt>
                    <?php 
                    } ?>
                    <div class="blog-feed-link-text ">
                        <h2><?php the_field('location'); ?></h2>
                        <p class="small-text"><?php the_field('lift_type'); ?></p>
                        <span class="link">View case studies <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-arrow-right-blue.svg"></span>
                    </div>
                </a>
               
            <?php endwhile; ?>
            <div class="row">
                <div class="col-sm">
                <?php the_posts_pagination( array(
                    'mid_size'  => 2
                ) );
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
</main>
<?php get_footer(); ?>
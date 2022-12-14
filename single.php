<?php get_header(); ?>
<main>
    <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'extra-large' );
    ?>
    <div class="wrapper has-background full-height hero" style="background-image: url('<?php if($image){ echo $image[0]; } else{ if(is_singular('post')){ echo esc_url( get_theme_mod( 'hsd_blog_img' ) ); } else{ echo esc_url( get_theme_mod( 'hsd_casestudies_img' ) );} } ?>'); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="page-title single-page-title">
                <?php if(is_singular('post')): ?>
                    <a href="<?php echo get_the_permalink('802'); ?>">Blog</a>
                <?php elseif(is_singular('case-studies')): ?>
                    <a href="<?php echo get_the_permalink('804'); ?>">Case Studies</a>
                <?php endif; ?>
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">
            <?php the_content(); ?>
            <?php if(have_rows('post_content')): while(have_rows('post_content')): the_row(); ?>
                <div class="row">
                    <div class="col-md-5">
                        <?php the_sub_field('section_heading'); ?>
                    </div>
                    <div class="col-md-7">
                        <?php while ( have_rows('section_content') ) : the_row(); 
                            if( get_row_layout() == 'text' ): 
                                the_sub_field('text_content');
                            elseif(get_row_layout() == 'image'):
                                $image = get_sub_field('image_content');
                                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if( $image ) {
                                    echo wp_get_attachment_image( $image, $size );
                                };
                            endif; 
                        endwhile; ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
            
    <?php if (is_singular( 'projects' ) || is_singular( 'case-studies' )): ?>
        <div class="wrapper">
            <div class="container">
            
                <?php $images = get_field('gallery');
                $size = 'medium_large';

                if( $images ): ?>
                    <ul class="image-grid">
                        <?php foreach( $images as $image ): ?>
                            <li>
                               
                                <?php 

                                     // (thumbnail, medium, large, full or custom size)
                                
                                        echo wp_get_attachment_image( $image, $size );
                                    ?>

                             
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(is_singular('case-studies')): ?>
        <div class="wrapper related">
            <div class="container">
                <h2 class="spacer">Related Case Studies</h2>
                <div class="blog-feed">
                <?php 
                $args=array( 
                    'post_type'=> 'case-studies', 
                    'posts_per_page' =>3,  
                    'post__not_in' => array(get_the_ID())
                ); 
                $loop = new WP_Query( $args ); 
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            
                        <a class="blog-feed-link " href="<?php the_permalink(); ?>" title="<?php the_field('location'); ?> - <?php the_field('lift_type'); ?>">
                            <?php the_post_thumbnail('landscape'); ?>
                            <div class="blog-feed-link-text ">
                                <h2><?php the_field('location'); ?></h2>
                                <p class="small-text"><?php the_field('lift_type'); ?></p>
                                <span class="link">View case studies <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-arrow-right-blue.svg"></span>
                            </div>
                        </a>
                    
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</main>
<?php get_footer(); ?>
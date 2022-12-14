<?php get_header(); ?>
<main class="aos aos--slow">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php if( have_rows('content') ): while ( have_rows('content') ) : the_row(); ?>
            <?php if( get_row_layout() == 'one_column' ): ?>
                <div class="wrapper one-col aos">
                    <div class="container">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>
            <?php elseif( get_row_layout() == 'full_width_column' ): ?>
                <div class="wrapper aos">
                    <div class="container">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>
            <?php elseif( get_row_layout() == 'intro_block' ): ?>
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'extra-large' ); ?>
                    <div class="aos wrapper has-background full-height hero" style="background-image: url('<?php echo $image[0]; ?>'); background-size: cover; background-position: center center;">
                        <div class="container">
                            <div class="page-title aos">
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="aos wrapper grey has-background hero">
                        <div class="container">
                            <div class="page-title aos">
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (!is_front_page()): ?>
                    <div class="aos wrapper breadcrumbs">
                        <div class="container">
                            <?php bcn_display(); ?>
                        </div>
                    </div>
                <?php endif; ?>
        <?php elseif( get_row_layout() == 'two_columns' ): ?>
        <div class="wrapper aos two-col <?php if(get_sub_field('background') == "Grey"): ?> has-background grey slim <?php elseif(get_sub_field('background') == "Dark Grey"): ?> has-background blue text-white slim <?php else: ?>white<?php endif; ?>">
            <div class="container">
                <?php if(get_sub_field('image_orientation') == "Landscape"): ?>
                    <div class="row <?php if(get_sub_field('right_column_type') == "Video" || get_sub_field('left_column_type') == "Video"): ?> align-items-center <?php endif; ?>">
                        <?php if(get_sub_field('left_column_type') == "Image"): ?>
                            <div class="col-md-6 aos aos--slide-up img">
                                <div class="image-bg" <?php $image = get_sub_field('left_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                                </div>
                            </div>
                        <?php elseif(get_sub_field('left_column_type') == "Video"): ?>
                            <div class="col-md-6 aos video">
                                <?php the_sub_field('left_video'); ?>
                            </div>
                        <?php else: ?>
                            <div class="col-md-6 aos <?php if(get_sub_field('left_column_type') == "Image"): ?>panel-tb-large<?php endif; ?>">
                                <?php the_sub_field('left_text'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(get_sub_field('right_column_type') == "Text"): ?>
                            <div class="col-md-6 aos <?php if(get_sub_field('left_column_type') == "Image"): ?>panel-tb-large<?php endif; ?>">
                                <?php the_sub_field('right_text'); ?>
                            </div>
                        <?php elseif(get_sub_field('right_column_type') == "Video"): ?>
                            <div class="col-md-6 aos video">
                                <?php the_sub_field('right_video'); ?>
                            </div>
                        <?php else: ?>
                            <div class="col-md-6 aos aos--slide-up img">
                                <div class="image-bg" <?php $image = get_sub_field('right_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php elseif(get_sub_field('image_orientation') == "Portrait"): ?>
                    <div class="row">
                        <?php if(get_sub_field('left_column_type') == "Image"): ?>
                            <div class="col-md-4 aos aos--slide-up img">
                                <div class="image-bg" <?php $image = get_sub_field('left_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-md-8 aos <?php if(get_sub_field('right_column_type') == "Image"): ?>panel-tb-large<?php endif; ?>">
                                <?php the_sub_field('left_text'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(get_sub_field('right_column_type') == "Text"): ?>
                            <div class="col-md-8 aos <?php if(get_sub_field('right_column_type') == "Image"): ?>panel-tb-large<?php endif; ?>">
                                <?php the_sub_field('right_text'); ?>
                            </div>
                        <?php elseif(get_sub_field('right_column_type') == "Image"): ?>
                            <div class="col-md-4 aos aos--slide-up img">
                                <div class="image-bg" <?php $image = get_sub_field('right_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="row <?php if(get_sub_field('right_column_type') == "Video" || get_sub_field('left_column_type') == "Video"): ?> align-items-center <?php endif; ?>">
                        <?php if(get_sub_field('left_column_type') == "Image"): ?>
                            <div class="col-md-7 aos aos--slide-up img">
                                <div class="image-bg" <?php $image = get_sub_field('left_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                                </div>
                            </div>
                        <?php elseif(get_sub_field('left_column_type') == "Video"): ?>
                            <div class="col-md-7 aos video">
                                <?php the_sub_field('left_video'); ?>
                            </div>
                        <?php else: ?>
                            <div class="col-md-5 aos aos--slide-up <?php if(get_sub_field('left_column_type') == "Image"): ?>panel-tb-large<?php endif; ?>">
                                <?php the_sub_field('left_text'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(get_sub_field('right_column_type') == "Text"): ?>
                            <div class="col-md-5 aos <?php if(get_sub_field('left_column_type') == "Image"): ?>panel-tb-large<?php endif; ?>">
                                <?php the_sub_field('right_text'); ?>
                            </div>
                        <?php elseif(get_sub_field('right_column_type') == "Video"): ?>
                            <div class="col-md-7 aos video">
                                <?php the_sub_field('right_video'); ?>
                            </div>
                        <?php else: ?>
                            <div class="col-md-7 aos aos--slide-up img">
                                <div class="image-bg" <?php $image = get_sub_field('right_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif( get_row_layout() == 'three_columns' ): ?>
        <div class="wrapper wrapper-three-col">
            <div class="container three-col">
                <?php if(get_sub_field('left_column_type') == "Image"): ?>
                    <div class="panel three-col-img-bg aos aos--slide-up">
                        <div class="image-bg" <?php $image = get_sub_field('left_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="panel aos aos--slide-up">
                        <?php the_sub_field('left_text'); ?>
                    </div>
                <?php endif; ?>
                <?php if(get_sub_field('center_column_type') == "Text"): ?>
                    <div class="panel aos aos--slide-up">
                        <?php the_sub_field('center_text'); ?>
                    </div>
                <?php elseif(get_sub_field('center_column_type') == "Image"): ?>
                    <div class="panel three-col-img-bg aos aos--slide-up">
                        <div class="image-bg" <?php $image = get_sub_field('center_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(get_sub_field('right_column_type') == "Text"): ?>
                    <div class="panel aos aos--slide-up">
                        <?php the_sub_field('right_text'); ?>
                    </div>
                <?php elseif(get_sub_field('right_column_type') == "Image"): ?>
                    <div class="panel three-col-img-bg aos aos--slide-up">
                        <div class="image-bg" <?php $image = get_sub_field('right_image'); if( !empty($image) ): ?>style="background-image: url(<?php echo $image['sizes']['large']; ?>); "<?php endif; ?>>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php elseif( get_row_layout() == 'map_form' ): ?>
            <div class="wrapper map-form">
                <div class="container-full">
                    <div class="form aos">
                        <?php the_sub_field('form'); ?>
                    </div>
                    <div class="map">
                        <?php the_sub_field('map'); ?>
                    </div>
                   
                </div>
            </div>
        <?php elseif( get_row_layout() == 'home_three_boxes' ): ?>
            <div class="wrapper">
                <div class="container three-col">
                        <div class="panel aos aos--slide-up">
                            <?php the_sub_field('one'); ?>
                        </div>
                        <div class="panel aos aos--slide-up">
                            <?php the_sub_field('two'); ?>
                        </div>
                        <div class="panel aos aos--slide-up">
                            <?php the_sub_field('three'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif( get_row_layout() == 'home_our_customers' ): 
            $layout = get_sub_field('layout');?>
            <div class="wrapper link-boxes <?php if(get_sub_field('background') == "Grey"): ?> has-background grey<?php elseif(get_sub_field('background') == "Dark Grey"): ?> has-background blue text-white<?php else: ?>white<?php endif; ?>">
                <div class="container">
                    <div class="row">
                        <div class="spacer aos <?php if($layout == 'twoline'): ?>col-12  col-md-8 col-lg-6 <?php else: ?> col-12 col-md-6 col-lg-4<?php endif; ?>">
                            <?php the_sub_field('intro'); ?>
                        </div>
                        <div class="aos <?php if($layout == 'twoline'): ?> col-12 <?php else: ?> col-12 col-md-6 col-lg-8<?php endif; ?>">
                            <div class="<?php if($layout == 'twoline'): ?>slick-slider-carousel3 <?php else: ?> slick-slider-carousel2<?php endif; ?>">
                                <?php if( have_rows('repeater') ): while( have_rows('repeater') ): the_row(); ?>
                                    <a class="link-box " href="<?php the_sub_field('link'); ?>">
                                        <?php $image = get_sub_field('image'); if( !empty($image) ): ?>
                                            <img loading="lazy" src="<?php echo $image['sizes']['portrait']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        <?php endif; ?>
                                        <div class="overlay">
                                            <h3><?php the_sub_field('title'); ?></h3>
                                            <img loading="lazy" class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-arrow-right-white.svg" alt="">
                                        </div>
                                    </a>
                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif( get_row_layout() == 'slider_img' ): ?>
        <div class="wrapper has-background slick-slider-hero-wrapper full-height aos">
            <div class="slick-slider-hero slick-slider-bg">
                <?php if( have_rows('repeater') ): while( have_rows('repeater') ): the_row(); ?>
                    <div class="slick-slider-bg-img">
                    <?php 
                        $image = get_sub_field('image');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        } ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            <div class="container-xl">
                <div class="slick-slider-hero-text aos">
                    <?php the_sub_field('content'); ?>
                </div>
            </div>
			<button aria-label="Pause" class="play-pause hero-play-pause ">
				<svg class="pause show" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11 22h-4v-20h4v20zm6-20h-4v20h4v-20z"/></svg>
				<svg class="play hide" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
			</button>
            <a class="hero-link" href="#nextSection"  title="Go To Next Section">
                <img loading="lazy" class="hero-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-arrow-right-blue.svg" alt="Arrow to next section">
            </a>
			
	
        </div>
        <div id="nextSection"></div>
        <?php elseif( get_row_layout() == 'slider' ): ?>
            <div class="wrapper has-background slick-slider-hero aos">
                <?php if( have_rows('repeater') ): while( have_rows('repeater') ): the_row(); ?>
                    <div>
                        <div class="slick-slider-hero-img slick-slider-hero-wrapper full-height" <?php $image = get_sub_field('image'); if( !empty($image) ): ?>style="background: url(<?php echo $image['sizes']['extra-large']; ?>); background-repeat: no-repeat; background-size: cover; background-position: center center;"<?php endif; ?>>
                            <div class="container-xl">
                                <div class="slick-slider-hero-text aos">
                                    <?php the_sub_field('content'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
                <button aria-label="Pause" class="play-pause hero-play-pause ">
                    <svg class="pause show" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11 22h-4v-20h4v20zm6-20h-4v20h4v-20z"/></svg>
                    <svg class="play hide" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
                </button>
                <a class="hero-link" href="#nextSection"  title="Go To Next Section">
                    <img loading="lazy" class="hero-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-arrow-right-blue.svg" alt="Arrow to next section">
                </a>
            </div>
            <div id="nextSection"></div>
                
        <?php elseif( get_row_layout() == 'carousel' ): ?>
        <div class="wrapper slim aos autoplayCarousel">
            <div class="container-xl">
                <div class="slick-slider-carousel">
                    <?php if( have_rows('repeater') ): while( have_rows('repeater') ): the_row(); ?>
                        <?php $image = get_sub_field('image'); if( !empty($image) ): ?>
                            <img loading="lazy" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif; ?>
                    <?php endwhile; endif; ?>
                </div>
                <button aria-label="Pause" class="play-pause carousel-play-pause ">
                    <svg class="pause show" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11 22h-4v-20h4v20zm6-20h-4v20h4v-20z"/></svg>
                    <svg class="play hide" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
                </button>
            </div>
        </div>
        <?php elseif( get_row_layout() == 'team' ): ?>
        <div class="wrapper team aos">
            <div class="container">
                <div class="row">
                    <?php if( have_rows('repeater') ): ?>
                    <?php $postnumber = 1; while( have_rows('repeater') ): the_row(); $bio = get_sub_field('bio'); $name = get_sub_field('name'); $job = get_sub_field('title'); $id = $postnumber++;  ?>
                    <div class="col-md-4 text-center aos aos--slide-up">
                        <a href="#" data-toggle="modal" data-target="#id<?php echo $id; ?>">
                            <?php $image=get_sub_field( 'image'); if( !empty($image) ): ?>
                                <img loading="lazy" class="fullsize" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $name; ?>" />
                            <?php endif; ?>
                            <p class="name"><?php echo $name; ?></p>
                            <p class="job"><?php echo $job; ?></p>
                        </a>
                    </div>
                    <div class="modal fade" id="id<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $id; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <?php $image=get_sub_field( 'image'); if( !empty($image) ): ?>
                                        <img loading="lazy" class="modal-image" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $name; ?>" />
                                    <?php endif; ?>
                                    <p class="name"><?php echo $name; ?></p>
                            <p class="job"><?php echo $job; ?></p>
                                    <p><?php echo $bio; ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php elseif( get_row_layout() == 'testimonials' ): ?>
        <div class="wrapper testimonials grey has-background slim aos">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-5 aos">
                        <?php if(get_sub_field('testimonials_intro')):
                            the_sub_field('testimonials_intro');
                        else: ?>
                            <h2>What our customers say</h2>
                        <?php endif; ?>
                        <div class="spacer"></div>
                    </div>
                    <div class="col-12 col-lg-7 aos">
                    
                        <div class="slick-slider-quotes">
                        <?php $args=array( 'post_type'=> 'testimonials', 'posts_per_page' => 8 ); $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="testimonial">
                                <blockquote><?php the_content(); ?>
                                    <?php if(get_the_title()): ?>
                                        <hr>
                                        <cite><?php the_title(); ?></cite>
                                    <?php endif; ?>
                                </blockquote>
                            </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif( get_row_layout() == 'case_studies' ): 
            $number = get_sub_field('number_to_show');
            if(!$number){
                $number = 3;
            }?>
            <div class="wrapper aos">
                <div class="container flex">
                    <div class="col-12 spacer aos">
                        <?php if(get_sub_field('intro_text')): 
                             the_sub_field('intro_text');
                        else: ?>
                            <h2>Case Studies</h2>
                        <?php endif; ?>
                    </div>
                    <div class="slick-slider-casestudies aos aos--slide-up">
                        <?php $args=array( 'post_type'=> 'case-studies', 'posts_per_page' => $number ); $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="slide-casestudy">
                                <div class="col-12 col-lg-6 blue text-white panel-large panel">
                                    <div>
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_field('snippet'); ?></p>
                                    </div>
                                    <div>
                                        <a class="btn btn-transparent" href="<?php the_permalink(); ?>">View case study</a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 right-bg">
                                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>
                                    <div class="image-bg" style="background-image: url(<?php echo $featured_img_url; ?>);">
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                    <a class="link" href="/case-studies/">View all case studies <img loading="lazy" class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-arrow-right-blue.svg" alt="">
                                        </a>
                    
                </div>
            </div>
        <?php elseif( get_row_layout() == 'accordion' ): ?>
        <div class="wrapper aos">
            <div class="container">

                        <?php if( have_rows('repeater') ): $i = 0; ?>
                            <div class="accordion" id="accordion">
                                <?php while( have_rows('repeater') ): $i++; the_row(); 
                                    $title = get_sub_field('question');
                                    $content = get_sub_field('answer'); ?>
                                    <div class="card aos aos--slide-up">
                                        <div class="card-header" id="heading<?php echo $i; ?>">
                                            <h4 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>"><?php echo $title; ?></button></h4>
                                        </div>
                                        <div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php echo $content; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

            </div>
        </div>
        <?php elseif( get_row_layout() == 'divider' ): ?>
        <div class="wrapper">
        </div>
        <?php elseif( get_row_layout() == 'values' ): ?>
        <div class="wrapper grey has-background aos">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center aos">
                        <h2><?php the_sub_field('title'); ?></h2>
                        <div class="spacer-gap"></div>
                    </div>
                    <?php if( have_rows('repeater') ): ?>
                    <?php while( have_rows('repeater') ): the_row(); $text = get_sub_field('text'); ?>
                    <div class="col-md-3 icon-box aos aos--slide-up">
                                <?php $image=get_sub_field( 'image'); if( !empty($image) ): ?>
                                    <img loading="lazy" src="<?php echo $image['sizes']['medium']; ?>" />
                                <?php endif; ?>

                                <?php echo $text; ?>
                            
                       
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php elseif( get_row_layout() == 'lift_boxes' ): ?>
        <div class="wrapper slim aos">
            <div class="container">
                <?php if( have_rows('repeater') ):  while( have_rows('repeater') ): the_row(); ?>
                    <div class="panel lift-box aos aos--slide-up">
                        
                        <div class="lift-box-content">
                            <div class="lift-box-text">
                                <h2><?php the_sub_field('title'); ?></h2>
                                <p><?php the_sub_field('blurb'); ?></p>
                            </div>
                            <div class="lift-box-buttons">
                                <?php
                                $file = get_sub_field('brochure');
                                if( $file ): ?>
                                    <a class="btn btn-primary" href="<?php echo $file['url']; ?>">View brochure</a>
                                <?php endif; ?>
                                <?php $link = get_sub_field('link'); if( $link ): ?>
                                    <a class="btn btn-transparent" href="<?php echo esc_url( $link ); ?>">Find out more</a>
                                <?php endif; ?>   
                            </div>  
                        </div>   
                        <?php $image=get_sub_field( 'image'); if( !empty($image) ): ?>
                            <img loading="lazy" src="<?php echo $image['sizes']['landscape']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif; ?>           
                    </div>
                <?php endwhile; 
                wp_reset_query(); 
                endif; ?>
            </div>
        </div>
        <?php elseif( get_row_layout() == 'icon_boxes' ): ?>
            <div class="wrapper aos">
                <div class="container">
                    <div class="row">
                        <div class="col-12 marginbottomsm aos">
                            <h2><?php the_sub_field('title'); ?></h2>
                        </div>
                        <?php if( have_rows('repeater') ): ?>
                    </div>
                    <div class="row icon-box-wrapper">

                        <?php while( have_rows('repeater') ): the_row(); $text = get_sub_field('text'); ?>
                        <div class="icon-box aos aos--slide-up">
                            <div class="col-12 col-lg-4">
                                <?php $image=get_sub_field( 'image'); if( !empty($image) ): ?><img loading="lazy" class="marginbottomsm" src="<?php echo $image['sizes']['medium']; ?>" /><?php endif; ?>
                            </div>
                            <div class="col-10 col-lg-8">
                                <?php echo $text; ?>
                            </div>
                            
                        </div>
                        <?php endwhile; wp_reset_query(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php elseif( get_row_layout() == 'icon_list' ): ?>
            <div class="wrapper aos">
                <div class="container">
                    <?php if( have_rows('repeater') ): while( have_rows('repeater') ): the_row(); 
                    $text = get_sub_field('text'); ?>
                        <div class="row icon-list ">
                            <div class="col-12 col-md-3 col-lg-2">
                                <?php $image=get_sub_field( 'image'); if( !empty($image) ): ?><img loading="lazy" class="marginbottomsm" src="<?php echo $image['sizes']['medium']; ?>" /><?php endif; ?>
                            </div>
                            <div class="col-10 col-md-9 col-lg-10 marginbottomsm">
                                <?php echo $text; ?>
                            </div>
                        </div>
                    <?php endwhile; 
                    wp_reset_query();
                    endif; ?>
                </div>
            </div>
        <?php elseif( get_row_layout() == 'exhibitions' ): ?>
            <div class="wrapper aos">
                <div class="container lift-box-alt-container">
                    <div class="row lift-box-wrapper">
                    
                        <?php if( have_rows('repeater') ): while( have_rows('repeater') ): the_row(); 
                        $text = get_sub_field('text'); 
                        $date = get_sub_field('date'); 
                        $link = get_sub_field('link'); ?>
                         <div class="panel lift-box lift-box-alt aos aos--slide-up">
                        
                            <div class="lift-box-content">
                            
                            	<?php $image=get_sub_field( 'image'); if( !empty($image) ): ?><img loading="lazy" class="marginbottomsm" src="<?php echo $image['sizes']['medium']; ?>" /><?php endif; ?>
                                
                                <div class="lift-box-text">
                                    <h2><?php echo $text; ?></h2>
                                    <p><?php echo $date; ?></p>
                                </div>
                                <div class="lift-box-buttons">
                                    
                                        <a class="btn btn-primary" href="<?php echo $link; ?>">Find out more</a>
                                      
                                </div>
                                
                            </div>   
                                      
                        </div>


                        <?php endwhile; endif; ?>
                            </div>
                </div>
            </div>
        <?php elseif( get_row_layout() == 'projects' ): ?>
            <div class="wrapper aos">
                <div class="container">
                    <div class="blog-feed">
                        <?php $term = get_sub_field('project_section'); $args=array( 'post_type'=> 'projects', 'posts_per_page' => 100, 'orderby' => 'date', 'tax_query' => array( array(
                                'taxonomy' => 'project_section',
                                'field'    => 'term_id',
                                'terms'    => $term,
                                ),
                            ),); $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
                             <a class="blog-feed-link " href="<?php the_permalink(); ?>" title="<?php the_field('location'); ?> - <?php the_field('lift_type'); ?>">
                                <?php if(get_the_post_thumbnail()){
                                        the_post_thumbnail('landscape', array('class' => 'thumbnail')); 
                                    } else{ ?>
                                        <img loading="lazy" class="thumbnail" src="<?php echo esc_url( get_theme_mod( 'hsd_projects_img' ) ); ?>">
                                    <?php 
                                    } ?>
                                    <div class="blog-feed-link-text ">
                                        <h2><?php the_title(); ?></h2>
                                        <p class="small-text"><?php the_field('lift_type'); ?></p>
                                        <span class="link">View case studies <img loading="lazy" class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-arrow-right-blue.svg" alt=""></span>
                                    </div>
                                </a>
                        
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        <?php elseif( get_row_layout() == 'latest_news' ): ?>
            <div class="wrapper aos">
                <div class="container">
                            <h2>Latest news</h2>
                            <div class="row"> 
                                <?php 
                                $args=array( 'post_type'=> 'post', 'posts_per_page' => 3, 'orderby' => 'date'); 
                                $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <div class="col-lg-4 aos aos--slide-up">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('home-boxes', array( 'class' => 'border-image' ) ); ?>
                                        </a>
                                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                    </div>
                                <?php endwhile; wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif( get_row_layout() == 'documents' ): ?>
            <div class="wrapper aos docs">
                <div class="container">
                    <h3><?php the_sub_field('heading'); ?></h3>
                    <div class="downloads ">
                        <?php if( have_rows('repeater') ): while( have_rows('repeater') ): the_row(); ?>
                            <?php $file = get_sub_field('file');
                                    if( $file ): ?>
                                    <a href="<?php echo $file['url']; ?>" class=" downloads-panel blue text-white borderradius aos aos--slide-up">
                                <?php else: ?>
                                    <div class=" downloads-panel blue text-white borderradius aos aos--slide-up">
                                <?php endif; ?>
                                    <div class="download ">
                                        <p><?php the_sub_field('title'); ?></p>
                                    </div>
                                    
                                        <?php
                                      
                                        if( $file ): ?>
                                        <div class=" download-button">
                                            <i class="fas fa-download"></i>
                                        </div>
                                        <?php endif; ?>
                                   
                                    
                                <?php if( $file ): ?></a><?php else:?> </div><?php endif; ?>
                          
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; 
        endwhile; 
        endif; 
    endwhile; ?>
   <?php if ( is_account_page() || is_woocommerce() || is_checkout() || is_cart() ) { the_content(); } ?>
</main>
<?php get_footer(); ?>
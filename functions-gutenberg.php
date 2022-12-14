<?php

/* GUTENBERG */
   //add_theme_support('wp-block-styles');
   add_theme_support('align-wide');
   //add_theme_support('responsive-embeds');

// Add custom editor font sizes
add_theme_support(
    'editor-font-sizes',
    array(
        array(
            'name'      => esc_html__('Small', 'bamboonine'),
            'shortName' => esc_html_x('S', 'Font size', 'bamboonine'),
            'size'      => 12,
            'slug'      => 's',
        ),
        array(
            'name'      => esc_html__('Normal', 'bamboonine'),
            'shortName' => esc_html_x('N', 'Font size', 'bamboonine'),
            'size'      => 16,
            'slug'      => 'default',
        ),
        array(
            'name'      => esc_html__('Large', 'bamboonine'),
            'shortName' => esc_html_x('L', 'Font size', 'bamboonine'),
            'size'      => 25,
            'slug'      => 'l',
        ),
        array(
            'name'      => esc_html__('Extra Large', 'bamboonine'),
            'shortName' => esc_html_x('XL', 'Font size', 'bamboonine'),
            'size'      => 30,
            'slug'      => 'xl',
        ),
        array(
            'name'      => esc_html__('XXL', 'bamboonine'),
            'shortName' => esc_html_x('XXL', 'Font size', 'bamboonine'),
            'size'      => 40,
            'slug'      => 'xxl',
        ),
        array(
            'name'      => esc_html__('XXXL', 'bamboonine'),
            'shortName' => esc_html_x('XXXL', 'Font size', 'bamboonine'),
            'size'      => 50,
            'slug'      => 'xxxl',
        ),
    )
);

//Define custom colours
$colours = (object) [
    "white" => "#ffffff",
    "lgrey" => "#EFEFEF",
    "grey" => "#999999",
    "black" => "#000000",
    "blue"  => "#020627",
    "beige"  => "#887262",
];

add_action('wp_head', function ($args) use ($colours) {my_custom_styles($colours);}, 1);

function my_custom_styles($colours)
{
    echo "
    <style>
        :root{
            --color-white:" . $colours->white . ";
            --color-lgrey:" . $colours->lgrey . ";
            --color-grey:" . $colours->dgrey . ";
            --color-black:" . $colours->black . ";
            --color-blue:" . $colours->blue . ";
            --color-beige:" . $colours->beige . ";
        };
    </style>
 ";
}

// Add custom colours to editor
add_theme_support(
    'editor-color-palette',
    array(
        array(
            'name'  => esc_html__('Blue', 'bamboonine'),
            'slug'  => 'blue',
            'color' => $colours->blue,
        ),
        array(
            'name'  => esc_html__('Beige', 'bamboonine'),
            'slug'  => 'beige',
            'color' => $colours->beige,
        ),
        array(
            'name'  => esc_html__('Light Grey', 'bamboonine'),
            'slug'  => 'lgrey',
            'color' => $colours->lgrey,
        ),
        array(
            'name'  => esc_html__('Grey', 'bamboonine'),
            'slug'  => 'dgrey',
            'color' => $colours->grey,
        ),
        array(
            'name'  => esc_html__('White', 'bamboonine'),
            'slug'  => 'white',
            'color' => $colours->white,
        ),
        array(
            'name'  => esc_html__('Black', 'bamboonine'),
            'slug'  => 'black',
            'color' => $colours->black,
        ),
        
       
        
       

    )
);

//Get the colors formatted for use with gutenberg editor palette
function output_the_colors()
{

    // get the colors
    $color_palette = current((array) get_theme_support('editor-color-palette'));

    // bail if there aren't any colors found
    if (!$color_palette) {
        return;
    }

    // output begins
    ob_start();

    // output the names in a string
    echo '[';
    foreach ($color_palette as $color) {
        echo "'" . $color['color'] . "', ";
    }
    echo ']';

    return ob_get_clean();

}

//Add the colors into ACF
function gutenberg_sections_register_acf_color_palette()
{

    $color_palette = output_the_colors();
    if (!$color_palette) {
        return;
    }

    ?>
    <script type="text/javascript">
        (function( $ ) {
            acf.add_filter( 'color_picker_args', function( args, $field ){

                // add the hexadecimal codes here for the colors you want to appear as swatches
                args.palettes = <?php echo $color_palette; ?>

                // return colors
                return args;

            });
        })(jQuery);
    </script>
    <?php
}
add_action('acf/input/admin_footer', 'gutenberg_sections_register_acf_color_palette');


add_filter( 'allowed_block_types', 'misha_allowed_block_types' );
 
function misha_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'core/paragraph',
		'core/image',
		'core/heading',
		//'core/gallery',
		'core/list',
		'core/quote',
		//'core/audio',
		'core/group',
		'core/cover',
		//'core/file',
		//'core/video',
		'core/table',
		//'core/verse',
		//'core/code',
		//'core/freeform',
		//'core/html',
		//'core/preformatted',
		//'core/pullquote',
		'core/buttons',
		'core/button',
		'core/columns',
		'core/media-text',
		//'core/more',
		//'core/nextpage',
		'core/separator',
		'core/spacer',
		'core/shortcode',
		//'core/archives',
		//'core/categories',
		//'core/latest-comments',
		//'core/latest-posts',
		//'core/calendar',
		//'core/rss',
		//'core/search',
		//'core/tag-cloud',
		//'core/embed',
		//'core-embed/twitter',
		//'core-embed/youtube',
		//'core-embed/facebook',
		//'core-embed/instagram',
		//'core-embed/wordpress',
		//'core-embed/soundcloud',
		//'core-embed/spotify',
		//'core-embed/flickr',
		//'core-embed/vimeo',
		//'core-embed/animoto',
		//'core-embed/cloudup',
		//'core-embed/collegehumor',
		//'core-embed/dailymotion',
		//'core-embed/funnyordie',
		//'core-embed/hulu',
		//'core-embed/imgur',
		//'core-embed/issuu',
		//'core-embed/kickstarter',
		//'core-embed/meetup-com',
		//'core-embed/mixcloud',
		//'core-embed/photobucket',
		//'core-embed/polldaddy',
		//'core-embed/reddit',
		//'core-embed/reverbnation',
		//'core-embed/screencast',
		//'core-embed/scribd',
		//'core-embed/slideshare',
		//'core-embed/smugmug',
		//'core-embed/speaker',
		//'core-embed/ted',
		//'core-embed/tumblr',
		//'core-embed/videopress',
		//'core-embed/wordpress-tv',
	);
 
}
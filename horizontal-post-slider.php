<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://beescripts.com
 * @since             1.0.0
 * @package           Horizontal_Post_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       Horizontal Post Slider
 * Plugin URI:        http://beescripts.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            aumsrini
 * Author URI:        http://beescripts.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       horizontal-post-slider
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-horizontal-post-slider-activator.php
 */
function activate_horizontal_post_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-horizontal-post-slider-activator.php';
	Horizontal_Post_Slider_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-horizontal-post-slider-deactivator.php
 */
function deactivate_horizontal_post_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-horizontal-post-slider-deactivator.php';
	Horizontal_Post_Slider_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_horizontal_post_slider' );
register_deactivation_hook( __FILE__, 'deactivate_horizontal_post_slider' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-horizontal-post-slider.php';
require  plugin_dir_path( __FILE__ ) .'cs-framework/cs-framework.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
 
 ///Register Css and scripts
 
 
 function horizontal_post_slider_scripts() {
    wp_enqueue_style( 'hori-post-slider-css', plugin_dir_url( __FILE__ ) .'public/css/horizontal-post-slider-public.css' );
    wp_enqueue_script( 'woo-grid-masonry', plugin_dir_url( __FILE__ ) . 'public/js/horizontal-post-slider-public.js');
	 
	 	
}
add_action( 'wp_enqueue_scripts', 'horizontal_post_slider_scripts' );



function run_horizontal_post_slider() {

	$plugin = new Horizontal_Post_Slider();
	$plugin->run();
	}
run_horizontal_post_slider();

	function horizontal_post_slider()
	 {
	
	?>
<?php
  // set up or arguments for our custom query
  $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
  
  $hor_post_cat=cs_get_option( 'hor_post_cat' );
  
 
  $hor_post_cat_name=get_cat_name( $hor_post_cat);
  $hor_post_count=cs_get_option( 'hor_post_count' );
  $query_args = array(
    'post_type' => 'post',
    'category_name' => $hor_post_cat_name,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_status'      => 'publish',
    'posts_per_page' => $hor_post_count,
    'paged' => $paged
  );
  // create a new instance of WP_Query
  $the_query = new WP_Query( $query_args );
  function script_that_requires_jquery(){
    wp_enqueue_script( 'jquery' );
	$hor_post_column=cs_get_option( 'hor_post_coloumn' );
    ?>
        <script type="text/javascript">
        jQuery(document).ready(function() {
      jQuery("#bee-posts").owlCarousel({
        autoPlay: 3000,
        items : <?php  echo (int)$hor_post_column;?>,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
        </script>
    <?php 
}
add_action('wp_footer', 'script_that_requires_jquery');
?>
    <h3>Recent Posts</h3>
	<div id="bee-posts" class="bee-carousel">
<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
  
	    <div class="item">
		  <img src="<?php echo the_post_thumbnail_url('large'); ?>"  alt="nyc subway">
            <span class="title"> <h3><?php echo  wp_trim_words( get_the_title(), 4 ); ?></h3></span>
    
    
    <p> <?php
	
	$bee_post_content = get_the_excerpt();
$bee_post_content = strip_tags($bee_post_content);    
echo substr($bee_post_content, 0, 100).'...';
	  ?></p>
    
<a  class="bee-readmore" href="<?php the_permalink(); ?>">Read More &raquo;</a>
        </div><!-- post #1 -->
<?php endwhile; ?>

</div>


<?php else: ?>

    <p>sorry <?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; 


}

add_shortcode( 'hori-post-slider', 'horizontal_post_slider' );



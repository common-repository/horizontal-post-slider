<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$horizontal_slider_pro=  plugins_url( 'images/horizontal-slider-pro.png' , __FILE__ );
$horizontal_slider_link='http://beeplugins.com/horizontal-post-slider-pro';

$settings      = array(
  'menu_title' => 'Post Slider Options',
  'menu_type'  => 'add_menu_page',
  'menu_slug'  => 'horizontal-post-slide',
  'ajax_save'  => true,
);


// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------

$options[]      = array(
  'name'        => 'Settings',
  'title'       => 'Post Slider Options ',
  'icon'        => 'fa fa-gear',

  // begin: fields
  'fields'      => array(

    // begin: a field
    // end: a field
array(
  'type'    => 'heading',
  'content' => 'Horizontal Post Slider Setings',
),
array(
  'id'             => 'hor_post_cat',
  'type'           => 'select',
  'title'          => 'Select Category for Posts',
  'options'        => 'categories',
  'query_args'     => array(
  'orderby'      => 'date',
  'order'        => 'ASC',
  ),
  'default_option' => 'Select a category',
),

	
	array(
  'id'    => 'hor_post_coloumn', // this is must be unique
  'type'  => 'number',
   'default' => '4',
  'title' => 'No.of column in a row',
  
), 
	
	array(
  'id'    => 'hor_post_count', // this is must be unique
  'type'  => 'number',
  'default' => '6',
  'title' => 'No.of post to show',
  
),
array(
  'type'    => 'notice',
  'class'   => '',
  'content' => '<a href="'.$horizontal_slider_link.'"><img  src="'.$horizontal_slider_pro.'" /></a>',
), 

)
);







CSFramework::instance( $settings, $options );

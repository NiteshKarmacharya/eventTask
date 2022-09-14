<?php
function event_post_type() {

	$labels = array(
			'name'                => 'Event',
			'singular_name'       => 'Event',
			'add_new'							=> 'Add Event',
			'all_items'						=> 'All Events',
			'add_new_item'				=> 'Add Event',
			'edit_item'						=> 'Edit Event',
			'view_item'						=> 'View Event',
			'search_item'					=> 'Search Event'

	);

	$args = array(
			'labels'              => $labels,
			'public'							=> true,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'taxonomies'					=> array( 'event_type' ),
			'has_archive' 				=> true,
			'rewrite' 						=> array('slug' => 'events'),
			'show_in_rest' 				=> true,
	);

	register_post_type( 'event', $args );

}

add_action( 'init', 'event_post_type' , 0);
  
function event_type_taxonomy() {

  $labels = array(
		'name'							=> 'Event Types',
		'singular_name'			=> 'Event Type',
		'search_item'				=> 'Search Event Type',
		'all_item'					=> 'All Event Type',
		'edit_item'					=> 'Edit Event Type',
		'update_item'				=> 'Update Event Type',
		'add_new_item'			=> 'Add Event Type',
		'men_name'					=> 'Event Types'
  );    

  register_taxonomy('event_type',array('event'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event type' ),
  ));
  
}

add_action( 'init', 'event_type_taxonomy', 0 );


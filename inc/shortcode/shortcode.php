<?php
function create_shortcode($atts){

	$atts = shortcode_atts( array(
		'limit'		=> 5,
		'type'	=>  'webinar'
	), $atts ,'event' );


	$result = '';
	$args = array(
		'post_type'      => 'event',
		'posts_per_page' => $atts['limit'],
		'order'					 => 'asc',
		'tax_query' => array(
			array(
				'taxonomy' =>'event_type',
				'terms'		=> $atts['type'],
				'field' => 'slug'
			)
		),
		'publish_status' => 'published'
	);

	$query = new WP_Query($args);

	if($query->have_posts()) :

		while($query->have_posts()) : $query->the_post() ;
			
			 
			$result .= '<div class="container"><div class="row mb-5">';
			if(!empty(get_the_post_thumbnail())) {
				$result .= '<div class="col-md-4"><div class="event-poster">' . get_the_post_thumbnail() . '</div></div><div class="col-md-8">';
			}
			else {
				$result .= '<div class="col-md-12">';
			}
			$result .= '<div class="event-name">' . get_the_title() . '</div>';
			$result .= '<div class="event-desc">' . get_the_content() . '</div>'; 
			$result .= '</div></div></div>';
		endwhile;
		wp_reset_postdata();
	endif;

	return $result;
}

add_shortcode( 'event', 'create_shortcode' ); 

// shortcode code ends here
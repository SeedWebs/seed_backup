<?php

/**
 * s_loop shortcode
 * REF: https://github.com/billerickson/display-posts-shortcode/blob/master/display-posts-shortcode.php
 * EXAMPLE USAGE:
 * [s_loop args="posts_per_page=10&post_type=page&post_parent=1" template="card" css_class=""]
 */
function s_loop_shortcode($atts) {
	
	$atts = shortcode_atts(
		array(
			'author'                => '',
			'author_name'			=> '',
			'cat'              		=> '',
			'category_name'         => '',
            'ignore_sticky_posts'   => false,
            'meta_key'              => '',
			'meta_value'            => '',
			'offset'                => 0,
			'order'                 => 'DESC',
            'orderby'               => 'date',
			'post_parent'           => false,
			'post_parent__in'       => false,
            'post_parent__not_in'   => false,
			'post_status'           => 'publish',
            'post_type'             => 'post',
            'post__in'              => false,
            'post__not_in'          => false,
			'posts_per_page'        => '9',
			'tag'                   => '',
			'tax_operator'          => 'IN',
			'tax_include_children'  => true,
			'tax_term'              => false,
            'taxonomy'              => false,
            'exclude_current'       => false,
            'pagination'            => false,
            'css'                   => 's-grid -d3',
            'template'              => 'card',
		),
		$atts,
		's_loop'
    );
    
	$author                = sanitize_text_field( $atts['author'] );
	$author_name           = sanitize_text_field( $atts['author_name'] );
	$cat                   = sanitize_text_field( $atts['cat'] );
    $category_name         = sanitize_text_field( $atts['category_name'] );
    $exclude_current       = filter_var( $atts['exclude_current'], FILTER_VALIDATE_BOOLEAN );
	$ignore_sticky_posts   = filter_var( $atts['ignore_sticky_posts'], FILTER_VALIDATE_BOOLEAN );
	$meta_key              = sanitize_text_field( $atts['meta_key'] );
	$meta_value            = sanitize_text_field( $atts['meta_value'] );
	$offset                = (int) $atts['offset'];
	$order                 = sanitize_key( $atts['order'] );
	$orderby               = sanitize_key( $atts['orderby'] );
	$post_parent           = $atts['post_parent'];
	$post_parent__in       = $atts['post_parent__in'];
	$post_parent__not_in   = $atts['post_parent__not_in'];
	$post_status           = $atts['post_status']; // Validated later as one of a few values.
    $post_type             = sanitize_text_field( $atts['post_type'] );
    $post__in              = $atts['post__in'];
    $post__not_in          = $atts['post__not_in'];
	$posts_per_page        = (int) $atts['posts_per_page'];
	$tag                   = sanitize_text_field( $atts['tag'] );
	$tax_operator          = $atts['tax_operator']; // Validated later as one of a few values.
	$tax_include_children  = filter_var( $atts['tax_include_children'], FILTER_VALIDATE_BOOLEAN );
	$tax_term              = sanitize_text_field( $atts['tax_term'] );
    $taxonomy              = sanitize_key( $atts['taxonomy'] );
    $pagination            = sanitize_key( $atts['pagination'] );
    $css                   = sanitize_text_field( $atts['css'] );
    $template              = sanitize_text_field( $atts['template'] );

	$args = array();

    if ( ! empty( $cat ) ) {
		$args['cat'] = $cat;
	}
	if ( ! empty( $category_name ) ) {
		$args['category_name'] = $category_name;
    }
    if ( ! empty( $order ) ) {
		$args['order'] = $order;
	}
    if ( ! empty( $orderby ) ) {
		$args['orderby'] = $orderby;
	}
	if ( ! empty( $post_type ) ) {
		$args['post_type'] = s_explode( $post_type );
	}
	if ( ! empty( $posts_per_page ) ) {
		$args['posts_per_page'] = $posts_per_page;
    }
    if ( ! empty( $tag ) ) {
		$args['tag'] = $tag;
    }
    if ( $ignore_sticky_posts ) {
		$args['ignore_sticky_posts'] = true;
    }
    // Meta key (for ordering).
	if ( ! empty( $meta_key ) ) {
		$args['meta_key'] = $meta_key;
	}
	// Meta value (for simple meta queries).
	if ( ! empty( $meta_value ) ) {
		$args['meta_value'] = $meta_value;
    }
    if ( $post__in ) {
		$posts_in         = array_map( 'intval', s_explode( $post__in ) );
		$args['post__in'] = $posts_in;
    }

    $posts_not_in = array();
	if ( ! empty( $post__not_in ) ) {
		$posts_not_in = array_map( 'intval', s_explode( $post__not_in ) );
	}
	if ( is_singular() && $exclude_current ) {
		$posts_not_in[] = get_the_ID();
	}
	if ( ! empty( $posts_not_in ) ) {
		$args['post__not_in'] = $posts_not_in;
    }
    
    if ( ! empty( $author ) ) {
		$args['author'] = $author;
	}
	
	if ( ! empty( $author_name ) ) {
		$args['author_name'] = $author_name;
    }
    
    if ( ! empty( $offset ) ) {
		$args['offset'] = $offset;
	}

    $post_status = s_explode( $post_status );
	$validated   = array();
	$available   = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
	foreach ( $post_status as $unvalidated ) {
		if ( in_array( $unvalidated, $available, true ) ) {
			$validated[] = $unvalidated;
		}
	}
	if ( ! empty( $validated ) ) {
		$args['post_status'] = $validated;
	}

    if ( ! empty( $taxonomy ) && ! empty( $tax_term ) ) {
		if ( 'current' === $tax_term ) {
			global $post;
			$terms    = wp_get_post_terms( get_the_ID(), $taxonomy );
			$tax_term = array();
			foreach ( $terms as $term ) {
				$tax_term[] = $term->slug;
			}
		} else {
			// Term string to array.
			$tax_term = s_explode( $tax_term );
		}
		// Validate operator.
		if ( ! in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ), true ) ) {
			$tax_operator = 'IN';
		}
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy'         => $taxonomy,
					'field'            => 'slug',
					'terms'            => $tax_term,
					'operator'         => $tax_operator,
					'include_children' => $tax_include_children,
				),
			),
		);
		// Check for multiple taxonomy queries.
		$count            = 2;
		$more_tax_queries = false;
		while (
			isset( $original_atts[ 'taxonomy_' . $count ] ) && ! empty( $original_atts[ 'taxonomy_' . $count ] ) &&
			isset( $original_atts[ 'tax_' . $count . '_term' ] ) && ! empty( $original_atts[ 'tax_' . $count . '_term' ] )
		) :
			// Sanitize values.
			$more_tax_queries     = true;
			$taxonomy             = sanitize_key( $original_atts[ 'taxonomy_' . $count ] );
			$terms                = s_explode( sanitize_text_field( $original_atts[ 'tax_' . $count . '_term' ] ) );
			$tax_operator         = isset( $original_atts[ 'tax_' . $count . '_operator' ] ) ? $original_atts[ 'tax_' . $count . '_operator' ] : 'IN';
			$tax_operator         = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ), true ) ? $tax_operator : 'IN';
			$tax_include_children = isset( $original_atts[ 'tax_' . $count . '_include_children' ] ) ? filter_var( $atts[ 'tax_' . $count . '_include_children' ], FILTER_VALIDATE_BOOLEAN ) : true;
			$tax_args['tax_query'][] = array(
				'taxonomy'         => $taxonomy,
				'field'            => 'slug',
				'terms'            => $terms,
				'operator'         => $tax_operator,
				'include_children' => $tax_include_children,
			);
			$count++;
		endwhile;
		if ( $more_tax_queries ) :
			$tax_relation = 'AND';
			if ( isset( $original_atts['tax_relation'] ) && in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ), true ) ) {
				$tax_relation = $original_atts['tax_relation'];
			}
			$args['tax_query']['relation'] = $tax_relation;
		endif;
		$args = array_merge_recursive( $args, $tax_args );
    }
    
    if ( false !== $post_parent ) {
		if ( 'current' === $post_parent ) {
			$post_parent = get_the_ID();
		}
		$args['post_parent'] = (int) $post_parent;
	}
	if ( false !== $post_parent__in ) {
		$args['post_parent__in'] = array_map( 'intval', be_dps_explode( $atts['post_parent__in'] ) );
	}
	if ( false !== $post_parent__not_in ) {
		$args['post_parent__not_in'] = array_map( 'intval', be_dps_explode( $atts['post_parent__in'] ) );
	}


	if($pagination) {
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args["paged"] = $paged;
	}
	
	if(substr($css, 0, 8) == 's-slider') {
		$slider = true;
	} else {
		$slider = false;
	}

	$the_query = new WP_Query( $args );

	if ($the_query->have_posts()) {
        ob_start();
        echo '<div class="'. $css . '">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			if($slider) {echo '<div class="slider">';}
			get_template_part( 'template-parts/content', $template );
			if($slider) {echo '</div>';}
        }
        echo '</div>';
        if($pagination) {
            seed_posts_navigation($the_query);
        }
		wp_reset_query();
		return ob_get_clean();
	} else {
		return "NOT FOUND";
	}

 }
 add_shortcode("s_loop", "s_loop_shortcode");


 /**
 * Explode list using "," and ", ".
 *
 * @param string $string String to split up.
 * @return array Array of string parts.
 */
function s_explode( $string = '' ) {
	$string = str_replace( ', ', ',', $string );
	return explode( ',', $string );
}


/**
 * Shortcode [s_icon i="ICON_NAME"]
 */

function s_icon_shortcode($atts) {
	$atts = shortcode_atts(
		array(
			'i' => '',
		),
		$atts,
		's_icon'
	);
	$i = sanitize_text_field( $atts['i'] );
	$file = get_theme_file_path( '/img/i/' . $i . '.svg');
	if(file_exists($file)) {
		ob_start();
		include($file);
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
add_shortcode("s_icon", "s_icon_shortcode");
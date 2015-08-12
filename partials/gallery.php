<?php

//TAU Gallery ShortCode
add_action('wp_enqueue_scripts', 'gallery_scripts');
add_shortcode('tau_gallery', 'tau_gallery_shortcode');

function gallery_scripts(){
	$vendor_dir = get_bloginfo('template_directory').'/js/vendors';

	wp_register_script('flip', $vendor_dir.'/flip/dist/jquery.flip.min.js', array('jquery'), null, true);
	wp_register_script('isotope', $vendor_dir.'/isotope/dist/isotope.pkgd.min.js', array('jquery'), null, true);
	wp_register_script('gallery', get_bloginfo('template_directory').'/js/gallery.js', array('isotope'), null, true);
	
	wp_register_script('fancybox', $vendor_dir.'/fancybox/source/jquery.fancybox.js', array('jquery'), null, true);
	wp_register_style('fancybox', $vendor_dir.'/fancybox/source/jquery.fancybox.css', array(), null, 'screen');
}

function enqueue_gallery_scripts(){
	wp_enqueue_script('flip');
	wp_enqueue_script('isotope');
	wp_enqueue_script('fancybox');
	wp_enqueue_script('gallery');
	wp_enqueue_style('fancybox');
}

function tau_gallery_shortcode( $attr ) {
	enqueue_gallery_scripts();

	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	/**
	 * Filter the default gallery shortcode output.
	 *
	 * If the filtered output isn't empty, it will be used instead of generating
	 * the default gallery template.
	 *
	 * @since 2.5.0
	 *
	 * @see gallery_shortcode()
	 *
	 * @param string $output The gallery output. Default empty.
	 * @param array  $attr   Attributes of the gallery shortcode.
	 */
	$output = apply_filters( 'post_gallery', '', $attr );
	if ( $output != '' ) {
		return $output;
	}

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) {
			unset( $attr['orderby'] );
		}
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'li',
		'icontag'    => $html5 ? 'div'        : 'div',
		'captiontag' => $html5 ? 'figcaption' : 'p',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery' );

	$id = intval( $atts['id'] );
	if ( 'RAND' == $atts['order'] ) {
		$atts['orderby'] = 'none';
	}

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
		}
		return $output;
	}

	$itemtag = tag_escape( $atts['itemtag'] );
	$captiontag = tag_escape( $atts['captiontag'] );
	$icontag = tag_escape( $atts['icontag'] );
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) ) {
		$itemtag = 'li';
	}
	if ( ! isset( $valid_tags[ $captiontag ] ) ) {
		$captiontag = 'div';
	}
	if ( ! isset( $valid_tags[ $icontag ] ) ) {
		$icontag = 'div';
	}

	$columns = intval( $atts['columns'] );
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = '';

	$size_class = sanitize_html_class( $atts['size'] );
	$gallery_list = "<ul id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

	
	$output = apply_filters( 'gallery_style', $gallery_style . $gallery_list);

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
			$image_output = wp_get_attachment_link( $id, $atts['size'], false, false );
		} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
			$image_output = wp_get_attachment_image( $id, $atts['size'], false );
		} else {
			$image_output = wp_get_attachment_link( $id, $atts['size'], true, false );
		}
		$image_meta  = wp_get_attachment_metadata( $id );
		
		// echo "<pre>";
		// var_dump($attachment);
		// echo "</pre>";
		// die('');

		$filter_class = ($i % 2 == 0) ? 'red' : 'blue';
		$orientation  = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
		}
		
		$output .= "<{$itemtag} id='card-".$i."' class='gallery-item ".$filter_class." card'>";
		$output .= "
			<{$icontag} class='gallery-icon {$orientation} front'>
				<div class='filter'></div>
				$image_output
			</{$icontag}>
			<div class='back'>
				<p>$attachment->post_title</p>
				<a class='action' href='".$attachment->guid."'>
					<i class='fa fa-arrow-circle-right'></i>
				</a>
			</div>";

		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		++$i;
	}

	if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
		$output .= "
			<br style='clear: both' />";
	}

	$output .= "</ul>\n";

	return $output;
}
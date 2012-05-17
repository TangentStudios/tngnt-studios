<?php	

// Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
// Add RSS links to <head> section
	automatic_feed_links();

// CLEAN UP <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    
//POST FORMATS
	//add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video'));
	
//CUSTOM EXCERPT STUFF
	add_filter('excerpt_length', 'my_excerpt_length');
	function my_excerpt_length($length) {
	return 30; }
	
	function new_excerpt_more($more) {
	       global $post;
		return '<p><a href="'. get_permalink($post->ID) . '">Continue Reading ...</a></p>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
    
//CUSTOM BODY CLASS
    function custom_body_classes($classes) {
        global $wp_query;
        
        // if there is no parent ID and it's not a single post page, category page, or 404 page, give it
        // a class of "parent-page"
        if( $wp_query->post->post_parent < 1  && !is_single() && !is_archive() && !is_404() ) {
            $classes[] = 'parent-page';
        };
        
        // if the page/post has a parent, it's a child, give it a class of its parent name
        if($wp_query->post->post_parent > 0 ) {
            $parent_title = get_the_title($wp_query->post->post_parent);
            $parent_title = preg_replace('#\s#','-', $parent_title);
            $parent_title = strtolower($parent_title);
            $classes[] = 'parent-pagename-'.$parent_title;
        };
        
        // add a class = to the name of post or page
        $classes[] = $wp_query->queried_object->post_name;
        
        return array_unique($classes);
    };
    add_filter('body_class','custom_body_classes');
    
// AUTO INSERT FIGURE
    add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
    add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
    
    function remove_thumbnail_dimensions( $html ) {
        $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
        return $html;
    }
    
    add_filter('image_send_to_editor', 'wrap_my_div', 10, 8);
    
      function wrap_my_div($html, $id, $caption, $title, $align, $url, $size, $alt){
        return '<figure id="fig-'.$id.'">'.$html.'<figcaption>'.$caption.'</figcaption></figure>';
      }
      	
// CLEAN UP POST IMAGE WIDTH/HEIGHTS
    function image_tag_class($class, $id, $align, $size) {
    	$align = 'align' . esc_attr($align);
    	return $align;
    }
    add_filter('get_image_tag_class', 'image_tag_class', 0, 4);
    function image_tag($html, $id, $alt, $title) {
    	return preg_replace(array(
    			'/\s+width="\d+"/i',
    			'/\s+height="\d+"/i',
    			'/alt=""/i'
    		),
    		array(
    			'',
    			'',
    			'',
    			'alt="' . $title . '"'
    		),
    		$html);
    }
    add_filter('get_image_tag', 'image_tag', 0, 4);
    
//ADD .intro TO FIRST PARAGRAPH
    function first_paragraph($content){
    	return preg_replace('/<p([^>]+)?>/', '<p$1 class="intro">', $content, 1);
    }
    add_filter('the_content', 'first_paragraph');
    
//CUSTOM PAGINATION
    function custom_paginate($args = null) {
    	$defaults = array(
    		'page' => null, 'pages' => null, 
    		'range' => 3, 'gap' => 3, 'anchor' => 1,
    		'before' => '<nav class="pagination">', 'after' => '</nav>',
    		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
    		'echo' => 1
    	);
    
    	$r = wp_parse_args($args, $defaults);
    	extract($r, EXTR_SKIP);
    
    	if (!$page && !$pages) {
    		global $wp_query;
    
    		$page = get_query_var('paged');
    		$page = !empty($page) ? intval($page) : 1;
    
    		$posts_per_page = intval(get_query_var('posts_per_page'));
    		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
    	}
    	
    	$output = "";
    	if ($pages > 1) {	
    		$output .= "$before";
    		$ellipsis = "<span class='ellip'>...</span>";
    
    		if ($page > 1 && !empty($previouspage)) {
    			$output .= "<a href='" . get_pagenum_link($page - 1) . "' class='prev'>$previouspage</a>";
    		}
    		
    		$min_links = $range * 2 + 1;
    		$block_min = min($page - $range, $pages - $min_links);
    		$block_high = max($page + $range, $min_links);
    		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
    		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;
    
    		if ($left_gap && !$right_gap) {
    			$output .= sprintf('%s%s%s', 
    				custom_paginate_loop(1, $anchor), 
    				$ellipsis, 
    				custom_paginate_loop($block_min, $pages, $page)
    			);
    		}
    		else if ($left_gap && $right_gap) {
    			$output .= sprintf('%s%s%s%s%s', 
    				custom_paginate_loop(1, $anchor), 
    				$ellipsis, 
    				custom_paginate_loop($block_min, $block_high, $page), 
    				$ellipsis, 
    				custom_paginate_loop(($pages - $anchor + 1), $pages)
    			);
    		}
    		else if ($right_gap && !$left_gap) {
    			$output .= sprintf('%s%s%s', 
    				custom_paginate_loop(1, $block_high, $page),
    				$ellipsis,
    				custom_paginate_loop(($pages - $anchor + 1), $pages)
    			);
    		}
    		else {
    			$output .= custom_paginate_loop(1, $pages, $page);
    		}
    
    		if ($page < $pages && !empty($nextpage)) {
    			$output .= "<a href='" . get_pagenum_link($page + 1) . "' class='next'>$nextpage</a>";
    		}
    
    		$output .= $after;
    	}
    
    	if ($echo) {
    		echo $output;
    	}
    
    	return $output;
    }
    
    function custom_paginate_loop($start, $max, $page = 0) {
    	$output = "";
    	for ($i = $start; $i <= $max; $i++) {
    		$output .= ($page === intval($i)) 
    			? "<span class='current'>$i</span>" 
    			: "<a href='" . get_pagenum_link($i) . "' class='page'>$i</a>";
    	}
    	return $output;
    }
    
//CUSTOM POST TYPES
	add_action( 'init', 'portfolio_register' );

	function portfolio_register() {
	
	    $labels = array( 
	        'name' => _x( 'Portfolio', 'portfolio_item' ),
	        'singular_name' => _x( 'Portfolio Item', 'portfolio_item' ),
	        'add_new' => _x( 'Add New Item', 'portfolio_item' ),
	        'add_new_item' => _x( 'Add New Portfolio Item', 'portfolio_item' ),
	        'edit_item' => _x( 'Edit Portfolio Item', 'portfolio_item' ),
	        'new_item' => _x( 'New Portfolio Item', 'portfolio_item' ),
	        'view_item' => _x( 'View Portfolio Item', 'portfolio_item' ),
	        'search_items' => _x( 'Search Our Work', 'portfolio_item' ),
	        'not_found' => _x( 'No Item found', 'portfolio_item' ),
	        'not_found_in_trash' => _x( 'No Item found in Trash', 'portfolio_item' ),
	        'parent_item_colon' => _x( 'Porfolio', 'portfolio_item' ),
	        'menu_name' => _x( 'Portfolio', 'portfolio_item' ),
	    );
	
	    $args = array( 
	        'labels' => $labels,
	        'hierarchical' => true,
	        'description' => 'Portfolio Items for Tangent Studios',
	        'supports' => array( 'title', 'editor', 'thumbnail' ),
	        'taxonomies' => array( 'category', 'web_design', 'branding', 'identity', 'mobile', 'print', 'graphics', 'design', 'development', 'wordpress', 'tumblr', 'bigcartel', 'e-commerce', 'cms', 'photography', 'lookbook', 'video', 'animation' ),
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 3,
	        //'menu_icon' => 'menuicon.png',
	        'show_in_nav_menus' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'has_archive' => false,
	        'query_var' => true,
	        'can_export' => true,
	        'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false ),
	        'capability_type' => 'post'
	    );
	
	    register_post_type( 'portfolio', $args );

	}

//CUSTOM META BOX	
	add_action("admin_init", "portfolio_meta_box");     
  
	function portfolio_meta_box(){  
	    add_meta_box("projInfo-meta", "Project Options", "portfolio_meta_options", "portfolio", "side", "low");  
	}    
	  
	function portfolio_meta_options(){  
	        global $post;  
	        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;  
	        $custom = get_post_custom($post->ID);  
	        $link = $custom["projLink"][0];  
	?>  
	    <label>Link:</label><input name="projLink" value="<?php echo $link; ?>" />  
	<?php  
	    }  
	    
	add_action('save_post', 'save_project_link');   
  
function save_project_link(){  
    global $post;    
  
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
        return $post_id;  
    }else{  
        update_post_meta($post->ID, "projLink", $_POST["projLink"]);  
    }  
}
	
//POST THUMBNAILS
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 700, 700, false ); // Default thumbnail size
	add_image_size( 'hero-image', 1200, 0, false ); // Hero
	add_image_size( 'hero-image-mobile', 480, 0, false ); // Hero
	add_image_size( 'portfolio', 540, 385, true ); // Portfolio Grid
	add_image_size( 'portfolio-mobile', 440, 315, true ); // Portfolio Grid Mobile
	add_filter('wp_generate_attachment_metadata','bw_images_filter');
	add_filter('wp_generate_attachment_metadata','bw_images_mobile_filter');
	
	function bw_images_filter($meta) {
		$file = wp_upload_dir();
		$file = trailingslashit($file['path']).$meta['sizes']['portfolio']['file'];
		list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
		$image = wp_load_image($file);
		imagefilter($image, IMG_FILTER_GRAYSCALE);
		imagefilter($image, IMG_FILTER_CONTRAST, -10);
		switch ($orig_type) {
			case IMAGETYPE_GIF:
				$file = str_replace(".gif", "-bw.gif", $file);
				imagegif( $image, $file );
				$meta['sizes']['portfolio-bw']['file'] = str_replace(".gif", "-bw.gif", $meta['sizes']['portfolio']['file']);
				break;
			case IMAGETYPE_PNG:
				$file = str_replace(".png", "-bw.png", $file);
				imagepng( $image, $file );
				$meta['sizes']['portfolio-bw']['file'] = str_replace(".png", "-bw.png", $meta['sizes']['portfolio']['file']);
				break;
			case IMAGETYPE_JPEG:
				$file = str_replace(".jpg", "-bw.jpg", $file);
				imagejpeg( $image, $file );
				$meta['sizes']['portfolio-bw']['file'] = str_replace(".jpg", "-bw.jpg", $meta['sizes']['portfolio']['file']);
				break;
			}
		return $meta;
	}
	
	function bw_images_mobile_filter($meta) {
		$file = wp_upload_dir();
		$file = trailingslashit($file['path']).$meta['sizes']['portfolio-mobile']['file'];
		list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
		$image = wp_load_image($file);
		imagefilter($image, IMG_FILTER_GRAYSCALE);
		imagefilter($image, IMG_FILTER_CONTRAST, -10);
		switch ($orig_type) {
			case IMAGETYPE_GIF:
				$file = str_replace(".gif", "-bw.gif", $file);
				imagegif( $image, $file );
				$meta['sizes']['portfolio-mobile-bw']['file'] = str_replace(".gif", "-bw.gif", $meta['sizes']['portfolio-mobile']['file']);
				break;
			case IMAGETYPE_PNG:
				$file = str_replace(".png", "-bw.png", $file);
				imagepng( $image, $file );
				$meta['sizes']['portfolio-mobile-bw']['file'] = str_replace(".png", "-bw.png", $meta['sizes']['portfolio-mobile']['file']);
				break;
			case IMAGETYPE_JPEG:
				$file = str_replace(".jpg", "-bw.jpg", $file);
				imagejpeg( $image, $file );
				$meta['sizes']['portfolio-mobile-bw']['file'] = str_replace(".jpg", "-bw.jpg", $meta['sizes']['portfolio-mobile']['file']);
				break;
			}
		return $meta;
	}
	
//MULTIPLE POST THUMBNAILS
	require_once('library/multi-post-thumbnails.php');
	// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
	if (class_exists('MultiPostThumbnails')) {
	    new MultiPostThumbnails(array(
	        'label' => 'Hero Image Image',
	        'id' => 'hero-image',
	        'post_type' => 'portfolio'
	        )
	    );
	};
	
//VIDEO IN IMAGES SECTION
	function tngnt_get_clean_content($dirty){
		$content = preg_replace('%<object.*<\/object>%smUi', '', $dirty);
		$content = preg_replace('%<embed.*<\/embed>%smUi', '', $content);
		$content = preg_replace('%<iframe.*<\/iframe>%smUi', '', $content);
		$content = preg_replace('/<img[^>]+\>/i', '', $content);
		return $content;
	}
	function tngnt_get_embed($content){
		$the_content = $content;
		$the_content = str_replace(',', '', $the_content);
		preg_match_all('/<iframe[^>]*>(.*)<\/iframe>/smUi', $the_content, $embed1);			
		$embeds1 = implode(",",$embed1[0]);
		$embeds1 = explode(",",$embeds1);
		preg_match_all('/<object[^>]*>(.*)<\/object>/smUi', $the_content, $embed2);			
		$embeds2 = implode(",",$embed2[0]);
		$embeds2 = explode(",",$embeds2);
		$embeds = array_merge($embeds1, $embeds2);
		foreach($embeds as $key => $value) { 
		  if($value == "") { 
		    unset($embeds[$key]); 
		  } 
		} 
		$the_array = array_values($embeds); 	
		return $the_array;
	}
	function tngnt_add_new_height_width($attachment){
	
		$no_prev_match = 0;
		preg_match('/width="(\d+)(px)?" height="(\d+)(px)?"/', $attachment, $matches);
		
		if(!$matches[1]){
			$no_prev_match = 1;
			preg_match('/width: (\d+)px; height: (\d+)px"/', $attachment, $matches);
		}
		
		$width = intval($matches[1]);
		$height = intval($matches[3]);
		
		$new_width = "800px";
		$new_height = "450px";
		
		$attachment = preg_replace('/width="(\d+)(px)?" height="(\d+)(px)?"/', 'width="' . $new_width . '" height="' . $new_height . '"', $attachment); 
		$attachment = preg_replace('%style=".*"%smUi',"",$attachment);	
		return $attachment;
	}
	
// Specify favicon for Dashboard
	function favicon4admin() {
	 echo '<link rel="Shortcut Icon" type="image/x-icon" href="http://tngnt.co/favicon.ico" />';
	}
	add_action( 'admin_head', 'favicon4admin' );

?>
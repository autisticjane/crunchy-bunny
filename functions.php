<?php
    // Adding post image URLs to metadata || sauce: https://github.com/georgiecel/bermuda
    function image_url_meta() {
        global $post;
        $args = array(
            'post_type' => 'attachment', 
            'numberposts' => -1,
            'post_mime_type' => 'image',
            'post_status' => null,
            'post_parent' => $post->ID
        );
        $attachments = get_posts($args);
        if ($attachments) {
            foreach ( $attachments as $attachment ) {
                echo '<meta itemprop="image" content="' . $attachment->guid . '">
';
            }
        } else {
            echo '<meta itemprop="image" content="' . get_first_image() . '">
';
        }
    }
	// Allow HTML in taxonomy descriptions
	    remove_filter( 'pre_term_description', 'wp_filter_kses' );
		remove_filter( 'pre_link_description', 'wp_filter_kses' );
		remove_filter( 'pre_link_notes', 'wp_filter_kses' );
		remove_filter( 'term_description', 'wp_kses_data' );
	// Automatic feed links
		if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );
	// Calculates word count
		function wordcount() {
			ob_start();
			the_content();
			$postcontent = ob_get_clean();
			return sizeof(explode(" ", $postcontent));
		}
	// Calculates reading time
	    function reading_time() {
            $content = get_post_field( 'post_content', $post->ID );
            $word_count = str_word_count( strip_tags( $content ) );
            $readingtime = ceil($word_count / 200);
        
            if ($readingtime == 1) {
              $timer = " minute";
            } else {
              $timer = " minutes";
            }
            $totalreadingtime = $readingtime . $timer;
        
            return $totalreadingtime;
        }
    // Cloak emails [cloak email=$]
        function email_cloaking_shortcode( $atts ) {
        	$atts = shortcode_atts(
        		array(
        			'email' => '',
        		),
        		$atts,
        		'cloak'
        	);
        	return antispambot( $atts['email'] );
        }
        add_shortcode( 'cloak', 'email_cloaking_shortcode' );
    // Comments walker || sauce: georgie
    	class comment_walker extends Walker_Comment {
    		var $tree_type = 'comment';
    		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
     
    		// constructor – wrapper for the comments list
    		function __construct() { ?>
    
    			<section class="comments-list">
    
    		<?php }
    
    		// start_lvl – wrapper for child comments list
    		function start_lvl( &$output, $depth = 0, $args = array() ) {
    			$GLOBALS['comment_depth'] = $depth + 2; ?>
    			
    			<section class="comments-list--child">
    
    		<?php }
    	
    		// end_lvl – closing wrapper for child comments list
    		function end_lvl( &$output, $depth = 0, $args = array() ) {
    			$GLOBALS['comment_depth'] = $depth + 2; ?>
    
    			</section>
    
    		<?php }
    
    		// start_el – HTML for comment template
    		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
    			$depth++;
    			$GLOBALS['comment_depth'] = $depth;
    			$GLOBALS['comment'] = $comment;
    			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 
    	
    			if ( 'article' == $args['style'] ) {
    				$tag = 'article';
    				$add_below = 'comment';
    			} else {
    				$tag = 'article';
    				$add_below = 'comment';
    			} ?>
    
    			<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
    				<div class="comment-meta post-meta" role="complementary">
    					<h2 class="comment-author">
    						<a class="comment-author-link" href="<?php comment_author_url(); ?>" rel="nofollow' itemprop="author"><?php comment_author(); ?></a>
    					</h2>
    					<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('F j, Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
    					<?php edit_comment_link('<p>Edit this comment</p>','',''); ?>
    					<?php if ($comment->comment_approved == '0') : ?>
    					<p class="comment-meta-item">Your comment is awaiting moderation.</p>
    					<?php endif; ?>
    				</div>
    				<div class="comment-content post-content" itemprop="text">
    					<?php comment_text() ?>
    					<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'Reply to this &raquo;' ) )) ?>
    				</div>
    
    		<?php }
    
    		// end_el – closing HTML for comment template
    		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
    
    			</article>
    
    		<?php }
    
    		// destructor – closing wrapper for the comments list
    		function __destruct() { ?>
    
    			</section>
    		
    	<?php	}
    
    	}
    // Custom login screen
        // Change logo URL to site instead of WP
            function my_login_logo_url() {
        	    return get_bloginfo( 'url' );
            }
            add_filter( 'login_headerurl', 'my_login_logo_url' );
        // Change logo hover title to site name instead of WP
            function my_login_logo_url_title() {
            	return 'Crunchy Family';
            }
            add_filter( 'login_headertitle', 'my_login_logo_url_title' );
        // Customize CSS
            function my_login_css() {
            	wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/custom-login.css' );
            }
            add_action( 'login_enqueue_scripts', 'my_login_css' );
    // Custom visual editor
        function visual_editor_style($url) {
        	if ( !empty($url) )
        		$url .= ',';
        	// Change the path here if using sub-directory
        	$url .= trailingslashit( get_stylesheet_directory_uri() ) . 'visual-editor.css';
        	return $url;
        }
    add_filter('mce_css', 'visual_editor_style');
	// Get first image & resize thumbnails || sauce: https://gist.github.com/brajeshwar/1205901
	    add_theme_support( 'post-thumbnails' );
	    update_option( 'thumbnail_crop', 1 );
		function get_first_image() {
		    if (has_post_thumbnail()) {
        		$image_id = get_post_thumbnail_id();
        		$image_url = wp_get_attachment_image_src($image_id);
        		$first_img = $image_url[0];
            } else {
    			global $post, $posts;
    			$first_img = '';
    			ob_start();
    			ob_end_clean();
    			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    			$first_img = $matches [1] [0];
    			if (empty($first_img)) {
    				return get_bloginfo('template_directory') . '/images/default.png';
    			}
            }
			return $first_img;
		}
	// Pagination || sauce: georgie
	    // Add classes to page nav
    	    function posts_link_attributes_1() {
                return 'class="pagination__newer"';
            }
            function posts_link_attributes_2() {
                return 'class="pagination__older"';
            }
            add_filter( 'next_posts_link_attributes', 'posts_link_attributes_2' );
            add_filter( 'previous_posts_link_attributes', 'posts_link_attributes_1');
        // Add classes to post nav
            function post_link_attributes_2( $output ) {
                $code = 'class="pagination__newer"';
                return str_replace('<a href=', '<a ' . $code . ' href=', $output);
            }
            function post_link_attributes_1( $output ) {
                $code = 'class="pagination__older"';
                return str_replace('<a href=', '<a ' . $code . ' href=', $output);
            }
            add_filter( 'next_post_link', 'post_link_attributes_2' );
            add_filter( 'previous_post_link', 'post_link_attributes_1' );
    // Profile
        // Add fields
            function modify_contact_methods($profile_fields) {
                $profile_fields['facebook'] = 'Facebook URL';
                $profile_fields['instagram'] = 'Instagram username';
                $profile_fields['pinterest'] = 'Pinterest username';
                $profile_fields['twitter'] = 'Twitter username';
            return $profile_fields;
            }
        add_filter('user_contactmethods', 'modify_contact_methods');
	// Register menus
	    function register_my_menus() {
          register_nav_menus(
            array(
              'header-menu' => __( 'Header menu' ),
              'footer-menu' => __( 'Footer menu' )
             )
           );
         }
         add_action( 'init', 'register_my_menus' );
    // Register sidebar
		if ( function_exists('register_sidebar') )
			register_sidebar( array(
			'name' => __( 'Sidebar', 'crunchy-bunny' ),
			'id' => 'right-sidebar',
			'before_widget' => '<!-- start widget --><div class="sidebar-item">',
			'after_widget' => '</div><!-- end widget -->',
			'before_title' => '<h2>',
			'after_title' => '</h2>')
		);
	// Stop WP fucking up images
		// No wrapping img in <p>
			function filter_ptags_on_images($content){
					// do a regular expression replace...
					// find all p tags that have just
					// <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
					// replace it with just the image tag...
					return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
				}

				// we want it to be run after the autop stuff... 10 is default.
				add_filter('the_content', 'filter_ptags_on_images');
		// Remove inline CSS
			add_filter( 'img_caption_shortcode_width', '__return_false' );
?>
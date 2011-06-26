<?php

add_action( 'init', 'initialize_template' );
add_action( 'init', 'register_theme_sidebars' );

/**
 * @since version 1.0.0
 */
function initialize_template() {
	/**
	 * Remove the generator meta tag for enhanced security
	 */
	remove_action( 'wp_head', 'wp_generator' );
	
	/**
	 * Deregister the default jQuery for the front end
	 * so it can be loaded directly from Goolgle
	 */
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
	}

	/**
	 * Add the theme's JavaScript
	 */
	wp_enqueue_script( 'theme', 'http://media.xn--stphanethibault-cnb.com/js/theme.js' );

	/**
	 * Deregister the OpenID plugin script and style as they are included
	 * in the theme's js and css file for better performance
	 */
	remove_action( 'wp', 'openid_js_setup', 9 );
	remove_action( 'wp', 'openid_style');

	/**
	 * Remove Really simple discovery link
	 */
	//remove_action( 'wp_head', 'rsd_link' );  /** Required by Delicious */
	
	/**
	 * Remove Windows Live Writer link
	 */
	remove_action( 'wp_head', 'wlwmanifest_link' );  

	/**
	 * Remove default style packaged with the Recent Comments widget
	 */
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );

	/**
	 * Enable post thumbnails
	 * @see http://codex.wordpress.org/Function_Reference/the_post_thumbnail
	 */
	add_theme_support( 'post-thumbnails' );
	
	/**
	 * Enable the Main navigation menu
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menu
	 */
	register_nav_menu( 'main-menu', __( 'Main menu' ) );


}

/**
 * Include Admin Panel
 */
//include( dirname(__FILE__) . '/admin/admin_panel.php' );

/**
 * @since version 1.0.0 
 */
function register_theme_sidebars() {

	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Sidebar' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Site Footer Column 1' ),
		'id' => 'site-footer-col-1',
		'description' => __( 'Site Footer Column 1' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Site Footer Column 2' ),
		'id' => 'site-footer-col-2',
		'description' => __( 'Site Footer Column 2' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Site Footer Column 3' ),
		'id' => 'site-footer-col-3',
		'description' => __( 'Site Footer Column 3' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Site Footer Column 4' ),
		'id' => 'site-footer-col-4',
		'description' => __( 'Site Footer Column 4' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

}

/**
 * TwentyTen style title meta tag
 * Based on work by The WordPress team
 * <http://wordpress.org/>
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since version 1.0.0
 */
function display_meta_title( ) {
	
	global $page, $paged;

	wp_title( '|', true, 'right' );
	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		echo ' | ' . $site_description;
	}

	if ( $paged >= 2 || $page >= 2 ) {
		echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	}
}

/**
 * For better SEO results, wrap title in h3 tags
 * on front page and h1 on single page
 * @since version 1.0.0
 */
function display_post_title( ) {
	
	if ( is_single() || is_page() ) {
		echo '<h1><a href="';
		the_permalink();
		echo '" title="';
		the_title();
		echo ' | ';
		bloginfo( 'name' );	
		echo '">';
		the_title();
		echo '</a></h1>';
	}

	else {
		echo '<h2><a href="';
		the_permalink();
		echo '" title="';
		the_title();
		echo ' | ';
		bloginfo( 'name' );	
		echo '">';
		the_title();
		echo '</a></h2>';
	}

}

/**
 * @since version 1.2.0
 */
function display_permalink( $title ) {
	echo '<a href="';
	the_permalink();
	echo '" title="';
	the_title();
	echo ' | ';
	bloginfo( 'name' );	
	echo '">';
	
	if ( $title == true ) {
		the_title();
	} else {
		_e( 'Permalink' );
	}
	echo '</a>';
}


/**
 * @since version 1.2.0
 */
function display_author() {

	echo '<a href="';
	bloginfo( 'url' );
	echo '/author/'
		. get_the_author_meta( 'nickname' );
	echo '" title="'
		. get_the_author_meta( 'nickname' )
		. ' | ';
	bloginfo( 'name' );
	echo '">'
	. get_the_author_meta( 'nickname' )
	. '</a> ';

	echo get_the_author_meta( 'display_name' );
}


/**
 * @todo Add microformats
 * @since version 1.0.0
 */
function display_scientific_reference() {
	echo '<div class="reference">';
	
	/**
	 * Author
	 */
	echo '<a href="';
	
	$author_url = get_the_author_meta( 'user_url' );
	
	if ( !empty( $author_url ) ) {
		the_author_meta( 'user_url' );
		echo '" title="'
			. get_the_author_meta( 'display_name' );
	}
	else {
		bloginfo( 'url' );
		echo '/author/'
			. get_the_author_meta( 'nickname' );
		echo '" title="'
			. get_the_author_meta( 'display_name' )
			. ' | ';
		bloginfo( 'name' );
	}
	echo '">';
	
	$last_name = get_the_author_meta( 'last_name' );
	$first_name = get_the_author_meta( 'first_name' );

	if ( !empty( $last_name ) && !empty( $first_name ) ) {
		echo '<span class="last-name">'
			. get_the_author_meta( 'last_name' )
			. '</span>, <span class="first-name">'
			. get_the_author_meta( 'first_name' )
			. '</span>';
	}
	else {
		echo '<span class="display-name">'
			. get_the_author_meta( 'display_name' )
			. '</span>';
	}
	echo '</a> ';
	
	echo '<time datetime="'
		. get_the_date( 'Y' )
		. '">('
		. get_the_date( 'Y' )
		. ')</time>. ';

	/**
	 * Article title
	 */
	_e( '“&nbsp;' );
	echo '<a href="';
	the_permalink();
	echo '" title="';
	the_title();
	echo ' | ';
	bloginfo( 'name' );
	echo '">';
	the_title();
	echo '</a>';
	_e( '&nbsp;”' );
	echo ', ';
	
	_e( 'online' );
	echo ', ';

	/**
	 * Permalink
	 */
	echo '&lt;<a href="';
	the_permalink();
	echo '" title="';
	the_title();
	echo ' | ';
	bloginfo( 'name' );
	echo '">';
	the_permalink();
	echo '</a>&gt;, ';

	/**
	 * Site name
	 */
	echo '<i><a href="';
	bloginfo( 'url' );
	echo '" title="';
	bloginfo( 'name' );
	echo ' | ';
	bloginfo( 'description' );
	echo '">';
	bloginfo( 'name' );
	echo '</a></i>, ';

	/**
	 * Publication date
	 */
	_e( 'published on' );
	echo ' '
		. '<time datetime="'
		. get_the_time( get_option( 'date_format' ) )
		. ', '
		. get_the_time( get_option( 'time_format' ) )
		. '" pubdate>';
		
	if ( is_page() ) {
		the_date( 'Y-m-d' );
	}
	else {
		echo '<a href="'
			. get_day_link( get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ))
			. '" title="'
			.  __( 'Articles posted on ' )
			. get_the_time( get_option( 'date_format' ) )
			. ' | ';
		bloginfo( 'name' );
		echo	'">'
			. get_the_date( 'Y-m-d' )
			. '</a>';
	}
	echo '</time>, ';

	/**
	 * Modification date
	 */
	 $pub_date = get_the_date( 'Y-m-d' );
	 $mod_date = get_the_modified_date( 'Y-m-d' );
	 
	 if ( $pub_date != $mod_date ) {
		_e( 'last modified on' );
		echo ' <time datetime="'
			. get_the_modified_date( 'Y-m-d' )
			. '">'
			. get_the_modified_date( 'Y-m-d' )
			. '</time>, ';
	 }

	/**
	 * Access date
	 */
	_e( 'accessed on' );
	echo ' <time datetime="'
		. date( 'Y-m-d' )
		. '">'
		. date( 'Y-m-d' )
		. '</time>';
	
	if ( !is_page() ) { echo ', '; comments_popup_link( 'no comments', '1 Comment', '% Comments' ); }
	
	echo '.</div><!-- END of scientific reference -->';
	
}

/**
 * Based on work by mono-lab
 * <http://www.mono-lab.net>
 * @package piano-black
 * @since version 1.0.0
 */
function get_first_post_year( ) {
	
	global $wpdb;
	
	$post_datetimes = $wpdb->get_row(
		$wpdb->prepare( "SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970" )
		);

	if ( $post_datetimes ) {
		$firstpost_year = $post_datetimes->firstyear;
	}

	return $firstpost_year;
}

/**
 * @since version 1.0.0
 */
function display_first_post_year( ) {
	echo get_first_post_year( );
}

/**
 * @since version 1.0.0
 */
function display_copyright_date_span( ) {
	
	$first_year = get_first_post_year();
	$current_year = date( 'Y' );

	if ( $first_year != $current_year ) {
		echo $first_year . '-' . $current_year;
	}
	else { echo $current_year; }
}

/**
 * @since version 1.0.0
 */
function display_site_rss_button() {
	echo '<a href="';
	bloginfo( 'rss2_url' );
	echo '" title="';
	_e( "Subscribe to this website's RSS feed" );
	echo ' | ';
	bloginfo( 'name' );
	echo '">'
		. '<img src="'
		. 'http://media.xn--stphanethibault-cnb.com/images/rss_icon_glass12.png"'
		. ' alt="'
		. __( 'RSS feed icon' )
		. '" class="rss12px" /></a>';
}


/**
 * @since version 1.0.0
 */
function display_post_comments_rss_button() {
	echo '<a href="';
	the_permalink();
	echo 'feed/" title="';
	_e( 'Comments on&nbsp;: ' );
	the_title();
	echo ' | ';
	bloginfo( 'name' );
	echo '">'
		. '<img src="'
		. 'http://media.xn--stphanethibault-cnb.com/images/rss_icon_glass12.png"'
		. ' alt="'
		. __( 'RSS feed icon' )
		. '" class="rss12px" /></a>';
}

/**
 * Currently not in use
 * @todo Check if SEO content siloing friendly
 * @see http://codex.wordpress.org/Function_Reference/wp_list_pages#List_whole_subpages
 * @since version 1.0.0
 */
function display_subpages() {
	
	global $post;

	$root_ancestor_id = end( $post->ancestors );
	$root_ancestor = get_post( $root_ancestor_id );
	
	if ( !$post->post_parent ) {
		$children = wp_list_pages( "title_li=&child_of=" . $post->ID . "&echo=0" );
	}
	
	else {
		if( $post->ancestors ) {
			$ancestors = end( $post->ancestors );
			$children = wp_list_pages( "title_li=&child_of=" . $ancestors . "&echo=0" );
		}
	}
	
	if ( $children ) {
		echo '<h4>'
		. '<a href="'
		. get_permalink( $root_ancestor_id )
		.'" title="'
		. $root_ancestor->post_title
		. ' | ';
		bloginfo( 'name' );
		echo '">'
		. $root_ancestor->post_title
		. '</a>'
		. "</h4>\n"
		. '<ul>'
		. $children
		. "</ul>\n";
	}
}

/**
 * @see <http://codex.wordpress.org/Function_Reference/paginate_links>
 *
 * For another breadcrumbs approach @see <http://codex.wordpress.org/Function_Reference/get_the_title>
 * @since version 1.0.0
 */
function display_pagination_nav( ) {

	global $wp_rewrite;		
	global $wp_query;
	$wp_query->query_vars[ 'paged' ] > 1 ? $current = $wp_query->query_vars[ 'paged' ] : $current = 1;
	
	$pagination = array(
		'base'			=> @add_query_arg( 'page','%#%' ),
		'format'			=> '',
		'total'			=> $wp_query->max_num_pages,
		'current'		=> $current,
		'show_all'		=> false,
		'prev_next'	=> true,
		'prev_text'		=> __( '&lt;&nbsp;Previous page' ),
		'next_text'		=> __( 'Next page&nbsp;&gt;' ),
		'end_size'		=> 1,
		'mid_size'		=> 2,
		'type'			=> 'plain',
		'add_args'		=> false, // array of query args to add
		'add_fragment' => ''
	);
	
	if ( $wp_rewrite->using_permalinks() )
		$pagination[ 'base' ] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link(1) ) )
			. 'page/%#%/', 'paged' );
	
	if ( !empty( $wp_query->query_vars[ 's' ] ) )
		$pagination[ 'add_args' ] = array( 's' => get_query_var( 's' ) );
	
	echo '<nav id="pagination">' . paginate_links( $pagination ) . "</nav>\n";
		
}

/**
 * Based on work by Dimox
 * @see http://dimox.net/wordpress-breadcrumbs-without-a-plugin/
 */
function display_breadcrumbs() {
	
	$delimiter = '&gt;';
	$name = __( 'Home' ); /** Text for the Home link */
	$currentBefore = '<span class="current">';
	$currentAfter = '</span>';
 
	if ( !is_home() && !is_front_page() || is_paged() ) {
	
		echo '<nav id="breadcrumbs">';
		
		global $post;
		$home = get_bloginfo( 'url' );
		echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
		
		if ( is_category() ) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category( $thisCat );
			$parentCat = get_category( $thisCat->parent );
			if ( $thisCat->parent != 0 ) echo( get_category_parents( $parentCat, true, ' ' . $delimiter . ' ' ) );

			echo $currentBefore;
			single_cat_title( '', true );
			echo $currentAfter;
		}
		
		elseif ( is_day() ) {
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time( 'd' ) . $currentAfter;
		}
		
		elseif ( is_month() ) {
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time( 'F' ) . $currentAfter;
		}
		
		elseif ( is_year() ) {
			echo $currentBefore . get_the_time( 'Y' ) . $currentAfter;
		}
		
		elseif ( is_single() && !is_attachment() ) {
			$cat = get_the_category();
			$cat = $cat[0];
			echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		}
		
		elseif ( is_attachment() ) {
			$parent = get_post( $post->post_parent );
			$cat = get_the_category( $parent->ID );
			$cat = $cat[0];
			echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
			echo '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		}
	
		elseif ( is_page() && !$post->post_parent ) {
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		}
		
		elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse( $breadcrumbs );
			foreach ( $breadcrumbs as $crumb ) {
				echo $crumb . ' ' . $delimiter . ' ';
			}
			echo $currentBefore;
			the_title();
			echo $currentAfter;
		}
		
		elseif ( is_search() ) {
			echo $currentBefore
			. __( 'Search results for' )
			. ' '
			. __( '“&nbsp;' )
			. get_search_query()
			. __( '&nbsp;”' )
			. $currentAfter;
		}
		
		elseif ( is_tag() ) {
			echo $currentBefore
			. __( 'Archives for the tag' )
			. ' '
			. __( '“&nbsp;' );
			single_cat_title( '', true );
			echo __( '&nbsp;”' )
			. $currentAfter;
		}
		
		elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo $currentBefore
			. $userdata->display_name
			. $currentAfter;
		}
		
		elseif ( is_404() ) {
			echo $currentBefore
			. __( '404 Not found' )
			. $currentAfter;
		}
		
		if ( get_query_var( 'paged' ) ) {
			echo ' ( '
			. __( 'Page' )
			. ' '
			. get_query_var( 'paged' )
			. ' )';
		}
		
		echo "</nav>\n";
		
	}

	else {
?>  	
<nav id="breadcrumbs">
	<span class="current"><?php _e( 'Home' ); ?></span>
</nav>
<?php  	
	}
}



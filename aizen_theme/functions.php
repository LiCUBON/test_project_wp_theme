<?php

/**
 * aizen_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aizen_theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

// Required plugin
function aizen_theme_register_required_plugins()
{
	$plugins = array(

		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'is_callable' => 'wpcf7_init',
			'required'  => true,
		),
		array(
			'name'      => 'Social Warfare',
			'slug'      => 'social-warfare',
			'is_callable' => 'wpcf7_init',
			'required'  => true,
		),

	
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
			'required'    => true,
		),

	);

	$config = array(
		'id'           => 'aizen_theme',           // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa($plugins, $config);
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aizen_theme_setup()
{
	add_action('tgmpa_register', 'aizen_theme_register_required_plugins');
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on aizen_theme, use a find and replace
		* to change 'aizen_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('aizen_theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Main menu', 'aizen_theme'),
			'menu-2' => esc_html__('Footer menu', 'aizen_theme'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'aizen_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'aizen_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aizen_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('aizen_theme_content_width', 640);
}
add_action('after_setup_theme', 'aizen_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aizen_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'aizen_theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'aizen_theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(array(
		'name'          => 'Custom Sidebar',
		'id'            => 'custom_sidebar',
		'description'   => 'This is a custom sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'aizen_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function aizen_theme_scripts()
{
	wp_enqueue_style('aizen_theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('aizen_theme-custom-style', get_template_directory_uri() . '/main.min.css', array(), _S_VERSION);
	wp_enqueue_script('aizen_theme-custom-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'aizen_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Breadcrumbs
 */

function get_breadcrumb()
{
	$delimiter = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	 <path fill-rule="evenodd" clip-rule="evenodd" d="M7.29289 14.7071C6.90237 14.3166 6.90237 13.6834 7.29289 13.2929L10.5858 10L7.29289 6.70711C6.90237 6.31658 6.90237 5.68342 7.29289 5.29289C7.68342 4.90237 8.31658 4.90237 8.70711 5.29289L12.7071 9.29289C13.0976 9.68342 13.0976 10.3166 12.7071 10.7071L8.70711 14.7071C8.31658 15.0976 7.68342 15.0976 7.29289 14.7071Z" fill="#8C8C92"/>
	 </svg>
	 ';

	$home = 'Blog';

	$url = home_url('/blog/');

	$breadcrumbs = array();

	$breadcrumbs[] = '<a href="' . $url . '">' . $home . '</a>';

	if (is_category()) {
		$category = get_queried_object();
		$breadcrumbs[] = single_cat_title('', false);
	} elseif (is_singular()) {
		$post = get_queried_object();
		$post_type = get_post_type_object(get_post_type());

		if ($post_type->has_archive) {
			$breadcrumbs[] = '<a href="' . get_post_type_archive_link($post_type->name) . '">' . $post_type->labels->name . '</a>';
		}
		$breadcrumbs[] = get_the_title();
	} elseif (is_tag()) {
		$breadcrumbs[] = single_tag_title('', false);
	} elseif (is_day()) {
		$breadcrumbs[] = '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>';
		$breadcrumbs[] = '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a>';
		$breadcrumbs[] = get_the_time('d');
	} elseif (is_month()) {
		$breadcrumbs[] = '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>';
		$breadcrumbs[] = get_the_time('F');
	} elseif (is_year()) {
		$breadcrumbs[] = get_the_time('Y');
	} elseif (is_search()) {
		$breadcrumbs[] = 'Search results for "' . get_search_query() . '"';
	} elseif (is_404()) {
		$breadcrumbs[] = '404 Error';
	}

	$breadcrumb_output = implode(' ' . $delimiter . ' ', $breadcrumbs);

	echo $breadcrumb_output;
}

// Comment form

function aizen_constructor_comment($comment, $args, $depth)
{

	if ('div' === $args['style']) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class(empty($args['has_children']) ? '' : 'parent', null, null, false);
?>

	<<?= $tag . $classes; ?> id="comment-<?php comment_ID() ?>">
		<?php if ('div' != $args['style']) { ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
																			} ?>

			<div class="comments-head">
				<div class="comment-author vcard">
					<?php
					printf(
						__('<cite class="fn">%s</cite>'),
						get_comment_author_link()
					);
					?>
				</div>

				<?php if ($comment->comment_approved == '0') { ?>
					<em class="comment-awaiting-moderation">
						<?php _e('Your comment is awaiting moderation.'); ?>
					</em><br />
				<?php } ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
						<?php
						printf(
							__('%1$s %2$s'),
							get_comment_date('d F, Y'),
							get_comment_time('H:i')
						); ?>
					</a>

					<?php edit_comment_link(__('(Edit)'), '  ', ''); ?>
				</div>
			</div>

			<?php comment_text(); ?>

			<div class="reply">
				<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_1520_214578)">
						<path d="M1.82886 6.33337H7.66219C8.89987 6.33337 10.0869 6.82504 10.962 7.70021C11.8372 8.57538 12.3289 9.76236 12.3289 11V12.1667M1.82886 6.33337L5.32886 9.83337M1.82886 6.33337L5.32886 2.83337" stroke="#2F39C1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</g>
					<defs>
						<clipPath id="clip0_1520_214578">
							<rect width="14" height="14" fill="white" transform="translate(0.0788574 0.5)" />
						</clipPath>
					</defs>
				</svg>

				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						)
					)
				); ?>
			</div>

			<?php if ('div' != $args['style']) { ?>
			</div>
			<?php }
		}


		/*
* add custom post type
*/

		function custom_post_type_portfolio()
		{

			$labels = array(
				'name'              => 'Categories',
				'singular_name'     => 'Category',
				'search_items'      => 'Search Categories',
				'all_items'         => 'All Categories',
				'parent_item'       => 'Parent Category',
				'parent_item_colon' => 'Parent Category:',
				'edit_item'         => 'Edit Category',
				'update_item'       => 'Update Category',
				'add_new_item'      => 'Add New Category',
				'new_item_name'     => 'New Category Name',
				'menu_name'         => 'Categories',
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array('slug' => 'portfolio-category'),
			);

			register_taxonomy('portfolio_category', 'portfolio', $args);

			unset($labels);
			unset($args);

			$labels = array(
				'name'               => 'Portfolio',
				'singular_name'      => 'Portfolio Item',
				'menu_name'          => 'Portfolio',
				'add_new'            => 'Add New',
				'add_new_item'       => 'Add New Portfolio Item',
				'edit_item'          => 'Edit Portfolio Item',
				'new_item'           => 'New Portfolio Item',
				'view_item'          => 'View Portfolio Item',
				'search_items'       => 'Search Portfolio Items',
				'not_found'          => 'No portfolio items found',
				'not_found_in_trash' => 'No portfolio items found in trash',
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'rewrite'            => array('slug' => 'portfolio'),
				'has_archive'        => true,
				'menu_position'      => 5,
				'supports'           => array('title', 'editor', 'thumbnail'),
				'show_in_rest'		 => true,
			);

			register_post_type('portfolio', $args);
		}

		add_action('init', 'custom_post_type_portfolio');

		function custom_portfolio_recent_posts_widget()
		{
			register_widget('Custom_Portfolio_Recent_Posts_Widget');
		}

		add_action('widgets_init', 'custom_portfolio_recent_posts_widget');

		class Custom_Portfolio_Recent_Posts_Widget extends WP_Widget
		{
			public function __construct()
			{
				parent::__construct(
					'custom_portfolio_recent_posts_widget',
					'Recent Portfolio Posts',
					array('description' => 'Displays recent portfolio posts.')
				);
			}

			public function widget($args, $instance)
			{
				$query_args = array(
					'post_type'      => 'portfolio',
					'posts_per_page' => $instance['number_of_posts'],
					'order'          => 'DESC',
				);

				$recent_portfolio_posts = new WP_Query($query_args);

				echo $args['before_widget'];

				if ($recent_portfolio_posts->have_posts()) :
			?>
				<h2 class="widget-title"><?php echo $instance['title']; ?></h2>
				<ul>
					<?php while ($recent_portfolio_posts->have_posts()) : $recent_portfolio_posts->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php
				else :
					echo 'No recent portfolio posts.';
				endif;

				echo $args['after_widget'];

				wp_reset_postdata();
			}

			public function form($instance)
			{
				$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
				$number_of_posts = isset($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 5;
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts to show:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="number" min="1" value="<?php echo $number_of_posts; ?>">
			</p>
	<?php
			}

			public function update($new_instance, $old_instance)
			{
				$instance = array();
				$instance['title'] = strip_tags($new_instance['title']);
				$instance['number_of_posts'] = absint($new_instance['number_of_posts']);
				return $instance;
			}
		}

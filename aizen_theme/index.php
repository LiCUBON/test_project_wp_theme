<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aizen_theme
 */

get_header();
?>

<section class="section hero-block-blog">
	<div class="container">
		<div class="hero-block-blog__inner">
			<div class="wrap-title wrap-title--prime">
				<div class="title">Blog</div>
				<div class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
			</div>
			<div class="hero-block-blog__img"><img src="<?php echo get_template_directory_uri() ?>/assets/img/bg/bg-blog-hero-block.svg" alt="background hero page"></div>
		</div>
	</div>
</section>
<section class="section posts-page post-list">
	<div class="container">
		<div class="posts-page__inner">
			<div id="primary" class="posts-col">
				<?php
				if (have_posts()) :
					/* Start the Loop */
					while (have_posts()) :
						the_post();
				?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<?php
								the_post_thumbnail('', ['class' => 'post-list-img']);

								if (is_singular()) :
									the_title('<h1 class="entry-title">', '</h1>');
								else :
									the_title('<h2 class="entry-title list-posts"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
								endif;
								?>
							</header>
							<div class="entry-content">
								<p class="post-description">
									<?php
									$content = wp_trim_words(get_the_content(), 40, '...');
									if (preg_match('/[,.]$/', $content)) {
										$content = rtrim($content, '.,');
										$content .= '...';
									}
									echo $content;;
									?></p>
							</div>
							<div class="wrap-btn">
								<a href="<?php the_permalink(); ?>" class="link-style-arrow">Continue reading<svg xmlns="http://www.w3.org/2000/svg" width="35" height="15" viewBox="0 0 35 15" fill="none">
										<path d="M1.5 6.5C0.947715 6.5 0.5 6.94772 0.5 7.5C0.5 8.05228 0.947715 8.5 1.5 8.5L1.5 6.5ZM34.2071 8.20711C34.5976 7.81658 34.5976 7.18342 34.2071 6.79289L27.8431 0.428932C27.4526 0.0384078 26.8195 0.0384078 26.4289 0.428932C26.0384 0.819457 26.0384 1.45262 26.4289 1.84315L32.0858 7.5L26.4289 13.1569C26.0384 13.5474 26.0384 14.1805 26.4289 14.5711C26.8195 14.9616 27.4526 14.9616 27.8431 14.5711L34.2071 8.20711ZM1.5 8.5L33.5 8.5V6.5L1.5 6.5L1.5 8.5Z" fill="" />
									</svg></a>
							</div>
						</article>
				<?php
					endwhile;

					the_posts_pagination(array(
						'mid_size' => 4,
						'end_size' => 1,
						'prev_next' => true,
						'prev_text' => _('<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M25.4142 29.4249C26.1953 28.658 26.1953 27.4147 25.4142 26.6479L18.8284 20.1818L25.4142 13.7158C26.1953 12.9489 26.1953 11.7056 25.4142 10.9388C24.6332 10.1719 23.3668 10.1719 22.5858 10.9388L14.5858 18.7933C13.8047 19.5602 13.8047 20.8035 14.5858 21.5703L22.5858 29.4249C23.3668 30.1917 24.6332 30.1917 25.4142 29.4249Z" fill="#8C8C92"/>
						</svg>
						'),
						'next_text' => _('<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M14.5858 29.4142C13.8047 28.6332 13.8047 27.3668 14.5858 26.5858L21.1716 20L14.5858 13.4142C13.8047 12.6332 13.8047 11.3668 14.5858 10.5858C15.3668 9.80474 16.6332 9.80474 17.4142 10.5858L25.4142 18.5858C26.1953 19.3668 26.1953 20.6332 25.4142 21.4142L17.4142 29.4142C16.6332 30.1953 15.3668 30.1953 14.5858 29.4142Z" fill="#8C8C92"/>
						</svg>
						'),
					));

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php
get_footer();

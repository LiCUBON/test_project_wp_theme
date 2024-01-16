<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aizen_theme
 */

get_header();
?>

<section class="section posts-page post-single">
  <div class="container">
    <div class="posts-page__inner">
      <div id="primary" class="posts-col">
        <?php
        while (have_posts()) :
          the_post();

          get_template_part('template-parts/content', get_post_type("portfolio"));


          $tags = wp_get_post_terms(get_queried_object_id(), 'post_tag', ['fields' => 'ids']);
          $args = [
            'post__not_in'        => array(get_queried_object_id()),
            'posts_per_page'      => 20,
            'ignore_sticky_posts' => 1,
            'orderby'             => 'rand',
            'tax_query' => [
              [
                'taxonomy' => 'post_tag',
                'terms'    => $tags
              ]
            ]
          ];
          $my_query = new wp_query($args);
          if ($my_query->have_posts() && $my_query->post_count > 1) { ?>
            <div class="related-posts">
              <?php echo '<div class="wrap-title"><div class="title">Related Posts</div></div>';
              echo '<div class="owl-related-posts">';
              while ($my_query->have_posts()) {
                $my_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="related-item">
                  <?php the_post_thumbnail(); ?>
                  <div class="related-post-title">
                    <?php echo wp_trim_words(get_the_title(), 8, '...'); ?>
                  </div>
                </a>
              <?php }
              wp_reset_postdata();
              echo '</div>';
              ?>
              <div class="nav-slider" <?php if ($my_query->post_count < 4) echo 'style="display:none"' ?>>
                <button class="related-slider-btn related-slider-btn--prev"><svg preserveAspectRatio="none" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4142 29.4249C26.1953 28.658 26.1953 27.4147 25.4142 26.6479L18.8284 20.1818L25.4142 13.7158C26.1953 12.9489 26.1953 11.7056 25.4142 10.9388C24.6332 10.1719 23.3668 10.1719 22.5858 10.9388L14.5858 18.7933C13.8047 19.5602 13.8047 20.8035 14.5858 21.5703L22.5858 29.4249C23.3668 30.1917 24.6332 30.1917 25.4142 29.4249Z" fill="" />
                  </svg>
                </button>
                <div class="nav-slider__dots"></div>
                <button class="related-slider-btn related-slider-btn--next"><svg preserveAspectRatio="none" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5858 29.4142C13.8047 28.6332 13.8047 27.3668 14.5858 26.5858L21.1716 20L14.5858 13.4142C13.8047 12.6332 13.8047 11.3668 14.5858 10.5858C15.3668 9.80474 16.6332 9.80474 17.4142 10.5858L25.4142 18.5858C26.1953 19.3668 26.1953 20.6332 25.4142 21.4142L17.4142 29.4142C16.6332 30.1953 15.3668 30.1953 14.5858 29.4142Z" fill="" />
                  </svg>
                </button>
              </div>
            </div>
        <?php
          }
          the_post_navigation(
            array(
              'prev_text' => '<div class="btn-post-nav"><div class="nav-title">%title</div><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.29289 14.7071C6.90237 14.3166 6.90237 13.6834 7.29289 13.2929L10.5858 10L7.29289 6.70711C6.90237 6.31658 6.90237 5.68342 7.29289 5.29289C7.68342 4.90237 8.31658 4.90237 8.70711 5.29289L12.7071 9.29289C13.0976 9.68342 13.0976 10.3166 12.7071 10.7071L8.70711 14.7071C8.31658 15.0976 7.68342 15.0976 7.29289 14.7071Z" fill="#8C8C92"/>
              </svg>
              </div>',
              'next_text' => '<div class="btn-post-nav"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7071 14.7071C13.0976 14.3166 13.0976 13.6834 12.7071 13.2929L9.41421 10L12.7071 6.70711C13.0976 6.31658 13.0976 5.68342 12.7071 5.29289C12.3166 4.90237 11.6834 4.90237 11.2929 5.29289L7.29289 9.29289C6.90237 9.68342 6.90237 10.3166 7.29289 10.7071L11.2929 14.7071C11.6834 15.0976 12.3166 15.0976 12.7071 14.7071Z" fill="#8C8C92"/>
              </svg>
              <div class="nav-title">%title</div></div>',
            )
          );

          // If comments are open or we have at least one comment, load up the comment template.
          if (comments_open() || get_comments_number()) :
            comments_template();
          endif;

        endwhile; // End of the loop.
        ?>
      </div>
      <?php //get_sidebar('sidebar-portfolio'); ?>
    </div>
  </div>
</section>

<?php
get_footer();
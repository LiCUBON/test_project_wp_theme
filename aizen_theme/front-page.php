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

<main id="primary" class="site-main">

    <section class="section hero-block">
        <div class="container">
            <div class="hero-block__inner">
                <div class="hero-block__content">
                    <div class="wrap-title wrap-title--prime">
                        <div class="title">Lorem ipsum dolor sit?</div>
                        <div class="subtitle">Lorem ipsum dolor sit amet consectetur.</div>
                    </div>
                    <div class="wrapper">
                        <a href="/manage/signup" class="btn">Text button</a>
                        <div class="rating-site main-hp">
                            <div class="rating-site__img"><span>68 reviews</span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/element/img-rating-site.svg" alt="rating-site" count-reviews="68 reviews"></div>
                            <div class="rating-site__grade">5/5<span></span></div>
                        </div>
                    </div>
                </div>
                <div class="hero-block__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/bg-hero-block.svg" alt="background hero page"></div>
            </div>
        </div>
    </section>
    <section class="section review-users">
  <div class="container">
    <div class="wrap-title wrap-title--second">
      <div class="title">Reviews</div>
      <div class="subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, architecto.</div>
    </div>
  </div>
  <div class="wrapper-slider-review">
    <div class="review-slider owl-carousel">
      <div class="slide-item">
        <div class="type-work">Type work<span class="verified-mark"></span></div>
        <div class="rate-star">
          <div class="wrap_star" style="width: 35%;"></div>
        </div>
        <div class="review-txt">
          <div class="review-txt__title">Title</div>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa unde mollitia doloribus numquam alias eligendi? Magni quos cumque blanditiis iste magnam, modi consectetur. Tempore, quam?</p>
        </div>
        <div class="author-info">
          <div class="name">User Name.</div>
          <span class="country-mark usa"></span>
        </div>
      </div>
      <div class="slide-item">
        <div class="type-work">Type work<span class="verified-mark"></span></div>
        <div class="rate-star">
          <div class="wrap_star" style="width: 10%;"></div>
        </div>
        <div class="review-txt">
          <div class="review-txt__title">Title</div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, quod mollitia? Facere, odio. Numquam illo earum qui ea a ipsam?</p>
        </div>
        <div class="author-info">
          <div class="name">User Name</div>
          <span class="country-mark uk"></span>
        </div>
      </div>
      <div class="slide-item">
        <div class="type-work">Type work<span class="verified-mark"></span></div>
        <div class="rate-star">
          <div class="wrap_star" style="width: 80%;"></div>
        </div>
        <div class="review-txt">
          <div class="review-txt__title">Title</div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde quidem culpa dolorem ad beatae possimus laboriosam voluptatem repellendus. Eius officiis sequi, omnis ullam, ea expedita magni, laudantium quisquam asperiores veritatis dignissimos libero non dolore repudiandae!</p>
        </div>
        <div class="author-info">
          <div class="name">User Name</div>
          <span class="country-mark usa"></span>
        </div>
      </div>
      <div class="slide-item">
        <div class="type-work">Type work<span class="verified-mark"></span></div>
        <div class="rate-star">
          <div class="wrap_star" style="width: 90%;"></div>
        </div>
        <div class="review-txt">
          <div class="review-txt__title">Title</div>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt, labore ipsam dolorum fuga repudiandae suscipit quisquam sequi quia consequatur sint eveniet quo autem laudantium? Officiis fugit numquam autem aliquam illum?</p>
        </div>
        <div class="author-info">
          <div class="name">User Name</div>
          <span class="country-mark ca"></span>
        </div>
      </div>
    </div>
    <button class="nav-review-slider nav-slider__btn--prev"><svg preserveAspectRatio="none" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4142 29.4249C26.1953 28.658 26.1953 27.4147 25.4142 26.6479L18.8284 20.1818L25.4142 13.7158C26.1953 12.9489 26.1953 11.7056 25.4142 10.9388C24.6332 10.1719 23.3668 10.1719 22.5858 10.9388L14.5858 18.7933C13.8047 19.5602 13.8047 20.8035 14.5858 21.5703L22.5858 29.4249C23.3668 30.1917 24.6332 30.1917 25.4142 29.4249Z" fill="" />
      </svg> </button>
    <button class="nav-review-slider nav-slider__btn--next"><svg preserveAspectRatio="none" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5858 29.4142C13.8047 28.6332 13.8047 27.3668 14.5858 26.5858L21.1716 20L14.5858 13.4142C13.8047 12.6332 13.8047 11.3668 14.5858 10.5858C15.3668 9.80474 16.6332 9.80474 17.4142 10.5858L25.4142 18.5858C26.1953 19.3668 26.1953 20.6332 25.4142 21.4142L17.4142 29.4142C16.6332 30.1953 15.3668 30.1953 14.5858 29.4142Z" fill="" />
      </svg> </button>
    <div class="review-slider__dots"></div>
  </div>
</section>

</main><!-- #main -->

<?php
get_footer();

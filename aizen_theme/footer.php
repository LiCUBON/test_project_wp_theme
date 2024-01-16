<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aizen_theme
 */

?>
</main>
<footer class="site-footer">
  <div class="container">
    <div class="footer__inner">
      <div class="footer__left">
        <a class="footer__logo" href="/"><img src="" alt="Logo site"></a>
        <div class="footer__txt">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione incidunt facere quo aperiam veniam!</div>
        <img class="footer__card-pay" src="<?php echo get_template_directory_uri() ?>/assets/img/ico/card-pay.svg" alt="icon card-pay">
      </div>
      <div class="info-contact">
        <div class="info-contact__title">Phone</div>
        <a class="info-contact__link" href="tel:+12341234123" rel="nofollow">+1 234 123 41 23</a>
        <div class="info-contact__title">Sales:</div>
        <a class="info-contact__link" href="mailto:sales@site.com" rel="nofollow">sales@site.com</a>
        <div class="info-contact__title">Support:</div>
        <a class="info-contact__link" href="mailto:support@site.com" rel="nofollow">support@site.com</a>
        <div class="info-contact__title">Billing:</div>
        <a class="info-contact__link" href="mailto:billing@site.com" rel="nofollow">billing@site.com</a>
      </div>
      <nav class="footer__right">
        <span class="footer__service-menu" id="footerServiceMenu">Services<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.79289 7.29289C6.18342 6.90237 6.81658 6.90237 7.20711 7.29289L10.5 10.5858L13.7929 7.29289C14.1834 6.90237 14.8166 6.90237 15.2071 7.29289C15.5976 7.68342 15.5976 8.31658 15.2071 8.70711L11.2071 12.7071C10.8166 13.0976 10.1834 13.0976 9.79289 12.7071L5.79289 8.70711C5.40237 8.31658 5.40237 7.68342 5.79289 7.29289Z" fill="#53525C" />
          </svg></span>
        <ul class="footer__menu link-style">
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
          <li><a href="#">Lorem, ipsum dolor</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="site-info">
    <div class="container">
      <div class="site-info__inner">
        <div class="site-info__text">
          <p>Lorem ipsum dolor sit.</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In sed ab sint omnis suscipit repudiandae dolorum illo similique quam quasi.</p>
        </div>
        <div class="service-link link-style">
          <a href="#">text link</a>
          <a href="#">text link</a>
          <a href="#">text link</a>
          <a href="#">text link</a>
        </div>
        <div class="copy">
          © <?php echo date("Y"); ?> Site.com. All Rights Reserved.
        </div>
      </div>
    </div>
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

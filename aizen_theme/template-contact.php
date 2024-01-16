<?php 
/*
Template Name: Contact
*/
get_header();
?>

<section class="section contact-page">
  <div class="container">
    <div class="wrap-title wrap-title--second">
      <div class="title">Contact</div>
      <div class="subtitle">We provide all kinds of help for educational work</div>
    </div>
    <div class="contact-page__inner">
      <div class="contact-page__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg/bg-contact.svg" alt=""></div>
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
    </div>
  </div>
</section>
<section class="сontainer-form">
  <div class="container">
    <div class="wrap-title wrap-title--second">
      <div class="title">Contact Form</div>
    </div>
    <?php the_content(); ?>
  </div>
</section>

<?php 
get_footer();
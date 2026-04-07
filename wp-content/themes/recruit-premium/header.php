<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
  <div class="container">
    <div class="site-header__inner">

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo" aria-label="<?php bloginfo( 'name' ); ?>">
        <span class="site-header__logo-text"><?php bloginfo( 'name' ); ?></span>
        <span class="site-header__logo-tagline">Premium Careers</span>
      </a>

      <nav class="site-nav" aria-label="メインナビゲーション">
        <ul class="site-nav__list">
          <li><a class="site-nav__link" href="#features">Our Values</a></li>
          <li><a class="site-nav__link" href="#jobs">Positions</a></li>
          <li><a class="site-nav__link" href="#voices">Members</a></li>
          <li><a class="site-nav__link" href="#flow">Process</a></li>
          <li><a class="site-nav__link" href="#faq">FAQ</a></li>
        </ul>
        <a href="#contact" class="btn btn--gold btn--sm">Apply Now</a>
      </nav>

      <button class="site-header__hamburger" id="hamburger-btn" aria-label="メニューを開く" aria-expanded="false" aria-controls="mobile-nav">
        <span></span>
        <span></span>
        <span></span>
      </button>

    </div>
  </div>
</header>

<nav class="mobile-nav" id="mobile-nav" aria-hidden="true">
  <ul class="mobile-nav__list">
    <li><a class="mobile-nav__link" href="#features">Our Values</a></li>
    <li><a class="mobile-nav__link" href="#jobs">Positions</a></li>
    <li><a class="mobile-nav__link" href="#voices">Members</a></li>
    <li><a class="mobile-nav__link" href="#flow">Process</a></li>
    <li><a class="mobile-nav__link" href="#faq">FAQ</a></li>
    <li><a class="mobile-nav__link mobile-nav__link--cta" href="#contact">Apply Now</a></li>
  </ul>
</nav>

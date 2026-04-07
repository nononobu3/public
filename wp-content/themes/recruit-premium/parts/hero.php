<section class="hero" id="hero">
  <div class="container">
    <div class="hero__inner">

      <div class="hero__content">
        <div class="hero__overline">
          <span class="hero__overline-rule" aria-hidden="true"></span>
          <span class="hero__overline-text">Careers at <?php bloginfo( 'name' ); ?></span>
        </div>
        <h1 class="hero__title">
          <em>Shape Your</em>
          Future with Excellence
        </h1>
        <p class="hero__desc">
          卓越を追い求める人が集う場所。確かな実力と高い志を持つあなたへ、最上の舞台を用意しています。
        </p>
        <div class="hero__actions">
          <a href="#jobs" class="btn btn--filled btn--lg">Open Positions</a>
          <a href="#voices" class="btn btn--outline-light btn--lg">Meet Our Team</a>
        </div>
        <div class="hero__figures">
          <div class="hero__figure">
            <p class="hero__figure-num"><span data-count="98">0</span>%</p>
            <p class="hero__figure-label">Employee Satisfaction</p>
          </div>
          <div class="hero__figure">
            <p class="hero__figure-num"><span data-count="15">0</span>+</p>
            <p class="hero__figure-label">Years of Excellence</p>
          </div>
          <div class="hero__figure">
            <p class="hero__figure-num"><span data-count="300">0</span>+</p>
            <p class="hero__figure-label">Team Members</p>
          </div>
        </div>
      </div>

      <div class="hero__visual">
        <div class="hero__image-frame">
          <?php
          $hero_img = get_template_directory_uri() . '/assets/images/hero.jpg';
          ?>
          <img src="<?php echo esc_url( $hero_img ); ?>"
               alt="働く環境のイメージ"
               width="600" height="750"
               onerror="this.style.background='#1A2234';this.style.aspectRatio='3/4';this.removeAttribute('src')">
          <div class="hero__image-caption">
            <span class="hero__image-caption-text">Premium Workplace</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

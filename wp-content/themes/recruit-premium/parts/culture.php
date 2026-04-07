<section class="culture-section section" id="culture">
  <div class="container">
    <div class="culture-inner">

      <div class="culture-visual reveal">
        <div class="culture-gallery">
          <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
            <div class="culture-gallery__item culture-gallery__item--<?php echo $i; ?>">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/culture-' . $i . '.jpg' ); ?>"
                   alt="カルチャーイメージ <?php echo $i; ?>"
                   onerror="this.style.display='none';this.parentElement.classList.add('culture-gallery__item--placeholder')">
            </div>
          <?php endfor; ?>
        </div>
      </div>

      <div class="culture-content reveal reveal-delay-2">
        <p class="section-heading__roman">Culture</p>
        <h2 class="section-heading__title" style="text-align:left;">私たちの文化</h2>
        <p class="culture-content__lead">
          高い志を持つプロフェッショナルが集まり、互いの卓越性を尊重しながら、より大きな目標に向かって歩む。それが私たちの文化です。
        </p>
        <ul class="culture-values">
          <li class="culture-value">
            <span class="culture-value__num">I.</span>
            <div>
              <h4 class="culture-value__title">Pursuit of Excellence</h4>
              <p class="culture-value__desc">常に最高水準を追求し、妥協を許さないプロフェッショナリズムを大切にしています。</p>
            </div>
          </li>
          <li class="culture-value">
            <span class="culture-value__num">II.</span>
            <div>
              <h4 class="culture-value__title">Integrity &amp; Trust</h4>
              <p class="culture-value__desc">誠実さと信頼を礎に、長期的なパートナーシップを築いていきます。</p>
            </div>
          </li>
          <li class="culture-value">
            <span class="culture-value__num">III.</span>
            <div>
              <h4 class="culture-value__title">Collective Growth</h4>
              <p class="culture-value__desc">個人の成長が組織の成長につながる。互いを高め合う環境を育んでいます。</p>
            </div>
          </li>
        </ul>
      </div>

    </div>
  </div>
</section>

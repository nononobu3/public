<section class="voices-section section" id="voices">
  <div class="container">
    <header class="section-heading reveal">
      <p class="section-heading__roman">Member Stories</p>
      <h2 class="section-heading__title">メンバーの声</h2>
      <p class="section-heading__desc">当社で活躍するプロフェッショナルたちの言葉をお届けします。</p>
    </header>

    <div class="voice-grid">
      <?php
      $voices = recruit_premium_get_voices( [ 'posts_per_page' => 3 ] );
      if ( ! empty( $voices ) ) :
        foreach ( $voices as $voice ) :
          $role   = get_post_meta( $voice->ID, 'voice_role', true );
          $joined = get_post_meta( $voice->ID, 'voice_joined', true );
      ?>
        <article class="voice-card reveal">
          <div class="voice-card__rule" aria-hidden="true"></div>
          <blockquote class="voice-card__text">
            <?php echo wp_kses_post( $voice->post_excerpt ?: $voice->post_content ); ?>
          </blockquote>
          <footer class="voice-card__author">
            <?php if ( has_post_thumbnail( $voice->ID ) ) : ?>
              <img class="voice-card__avatar"
                   src="<?php echo esc_url( get_the_post_thumbnail_url( $voice->ID, 'recruit-square' ) ); ?>"
                   alt="<?php echo esc_attr( $voice->post_title ); ?>">
            <?php else : ?>
              <div class="voice-card__avatar-placeholder">
                <?php echo esc_html( mb_substr( $voice->post_title, 0, 1 ) ); ?>
              </div>
            <?php endif; ?>
            <div>
              <p class="voice-card__name"><?php echo esc_html( $voice->post_title ); ?></p>
              <?php if ( $role ) : ?>
                <p class="voice-card__role"><?php echo esc_html( $role ); ?></p>
              <?php endif; ?>
              <?php if ( $joined ) : ?>
                <p class="voice-card__joined"><?php echo esc_html( $joined ); ?> 入社</p>
              <?php endif; ?>
            </div>
          </footer>
        </article>
      <?php
        endforeach;
      else :
        $dummy_voices = [
          [
            'name'   => 'Takashi Yamamoto',
            'role'   => 'Principal Engineer',
            'joined' => '2019年',
            'text'   => '入社当初から感じるのは、ここでは「卓越さ」が当たり前として扱われるということ。周囲のレベルの高さに刺激を受け、自分の限界を常に更新し続けられています。',
          ],
          [
            'name'   => 'Yuki Tanaka',
            'role'   => 'Senior Product Manager',
            'joined' => '2021年',
            'text'   => '意思決定のスピードと質の高さに驚きました。上質なプロセスと、本物のプロフェッショナルと共に仕事ができる環境は、他では得難い経験です。',
          ],
          [
            'name'   => 'Michiko Sato',
            'role'   => 'Head of Design',
            'joined' => '2020年',
            'text'   => 'デザインの本質的な価値を理解してくれる組織で働けることに誇りを感じています。クリエイティブの可能性を最大限に引き出してもらえる環境です。',
          ],
        ];
        foreach ( $dummy_voices as $i => $v ) :
      ?>
        <article class="voice-card reveal reveal-delay-<?php echo $i + 1; ?>">
          <div class="voice-card__rule" aria-hidden="true"></div>
          <blockquote class="voice-card__text"><?php echo esc_html( $v['text'] ); ?></blockquote>
          <footer class="voice-card__author">
            <div class="voice-card__avatar-placeholder">
              <?php echo esc_html( mb_substr( $v['name'], 0, 1 ) ); ?>
            </div>
            <div>
              <p class="voice-card__name"><?php echo esc_html( $v['name'] ); ?></p>
              <p class="voice-card__role"><?php echo esc_html( $v['role'] ); ?></p>
              <p class="voice-card__joined"><?php echo esc_html( $v['joined'] ); ?> 入社</p>
            </div>
          </footer>
        </article>
      <?php endforeach; endif; ?>
    </div>

  </div>
</section>

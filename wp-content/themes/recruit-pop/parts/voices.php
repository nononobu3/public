<?php
$voices = recruit_pop_get_voices( [ 'posts_per_page' => 3 ] );
$dummy_voices = [
    [
        'name'  => '田中 あおい',
        'role'  => 'フロントエンドエンジニア / 2022年入社',
        'text'  => '前職では自分のやりたいことが見つからず悩んでいましたが、ここでは毎日が発見の連続です。失敗しても責めるのではなく「次どうする?」と前向きに考えられる文化が好きです。',
        'initial' => 'T',
    ],
    [
        'name'  => '佐藤 健太',
        'role'  => 'プロダクトマネージャー / 2021年入社',
        'text'  => '入社後すぐに大きなプロジェクトを任されて最初は驚きましたが、チームのサポートのおかげで成長できました。働きながら自分の市場価値が上がっているのを実感できています。',
        'initial' => 'S',
    ],
    [
        'name'  => '山田 さくら',
        'role'  => 'UXデザイナー / 2023年入社',
        'text'  => '育児と仕事を両立できるか不安でしたが、フレックスとリモートのおかげで無理なく働けています。子育て中のメンバーへの理解が深く、本当に助かっています。',
        'initial' => 'Y',
    ],
];
?>
<section class="section" id="voices" aria-label="社員の声">
  <div class="container">

    <div class="section-heading reveal">
      <span class="section-heading__label">Employee Voices</span>
      <h2 class="section-heading__title">社員が語る、<span>リアルな声</span></h2>
      <p class="section-heading__desc">
        実際に働いているメンバーに、会社のことを正直に話してもらいました。
      </p>
    </div>

    <div class="voice-grid">

      <?php if ( $voices ) :
        foreach ( $voices as $i => $voice ) :
          $role = get_post_meta( $voice->ID, 'voice_role', true );
          $delay_class = 'reveal-delay-' . ( $i + 1 );
      ?>
      <article class="voice-card reveal <?php echo esc_attr( $delay_class ); ?>">
        <div class="voice-card__quote" aria-hidden="true">"</div>
        <p class="voice-card__text"><?php echo esc_html( $voice->post_excerpt ?: wp_trim_words( $voice->post_content, 60 ) ); ?></p>
        <div class="voice-card__author">
          <?php if ( has_post_thumbnail( $voice->ID ) ) : ?>
            <img class="voice-card__avatar" src="<?php echo esc_url( get_the_post_thumbnail_url( $voice->ID, 'recruit-square' ) ); ?>" alt="<?php echo esc_attr( $voice->post_title ); ?>" width="52" height="52">
          <?php else : ?>
            <div class="voice-card__avatar-placeholder" aria-hidden="true"><?php echo esc_html( mb_substr( $voice->post_title, 0, 1 ) ); ?></div>
          <?php endif; ?>
          <div>
            <p class="voice-card__name"><?php echo esc_html( $voice->post_title ); ?></p>
            <p class="voice-card__role"><?php echo esc_html( $role ); ?></p>
          </div>
        </div>
      </article>
      <?php endforeach;
      else :
        foreach ( $dummy_voices as $i => $v ) :
          $delay_class = 'reveal-delay-' . ( $i + 1 );
      ?>
      <article class="voice-card reveal <?php echo esc_attr( $delay_class ); ?>">
        <div class="voice-card__quote" aria-hidden="true">"</div>
        <p class="voice-card__text"><?php echo esc_html( $v['text'] ); ?></p>
        <div class="voice-card__author">
          <div class="voice-card__avatar-placeholder" aria-hidden="true"><?php echo esc_html( $v['initial'] ); ?></div>
          <div>
            <p class="voice-card__name"><?php echo esc_html( $v['name'] ); ?></p>
            <p class="voice-card__role"><?php echo esc_html( $v['role'] ); ?></p>
          </div>
        </div>
      </article>
      <?php endforeach;
      endif; ?>

    </div>

  </div>
</section>

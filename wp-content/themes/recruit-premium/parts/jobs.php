<section class="jobs-section section" id="jobs">
  <div class="container">
    <header class="section-heading reveal">
      <p class="section-heading__roman">Open Positions</p>
      <h2 class="section-heading__title">募集職種</h2>
      <p class="section-heading__desc">卓越した才能と高い志を持つ方をお待ちしています。</p>
    </header>

    <div class="jobs-filter reveal">
      <button class="tag is-active" data-filter="all">All Positions</button>
      <button class="tag" data-filter="management">Management</button>
      <button class="tag" data-filter="engineer">Engineer</button>
      <button class="tag" data-filter="creative">Creative</button>
      <button class="tag" data-filter="business">Business</button>
    </div>

    <?php
    $jobs = recruit_premium_get_jobs( [ 'posts_per_page' => 6 ] );
    ?>

    <div class="jobs-grid">
      <?php if ( ! empty( $jobs ) ) : ?>
        <?php foreach ( $jobs as $job ) : ?>
          <article class="job-card reveal" data-department="<?php echo esc_attr( implode( ' ', wp_get_post_terms( $job->ID, 'job_department', [ 'fields' => 'slugs' ] ) ) ); ?>">
            <div class="job-card__header">
              <div class="job-card__type">
                <?php
                $types = wp_get_post_terms( $job->ID, 'job_type' );
                if ( ! empty( $types ) ) :
                  foreach ( $types as $type ) :
                    echo '<span class="badge badge--primary">' . esc_html( $type->name ) . '</span>';
                  endforeach;
                endif;
                ?>
              </div>
              <?php if ( ( time() - get_post_time( 'U', false, $job ) ) < 7 * DAY_IN_SECONDS ) : ?>
                <span class="job-card__new">New</span>
              <?php endif; ?>
            </div>
            <h3 class="job-card__title"><?php echo esc_html( $job->post_title ); ?></h3>
            <?php if ( $job->post_excerpt ) : ?>
              <p class="job-card__desc"><?php echo esc_html( wp_trim_words( $job->post_excerpt, 40 ) ); ?></p>
            <?php endif; ?>
            <?php
            $salary   = get_post_meta( $job->ID, 'job_salary', true );
            $location = get_post_meta( $job->ID, 'job_location', true );
            $hours    = get_post_meta( $job->ID, 'job_hours', true );
            ?>
            <?php if ( $salary ) : ?>
              <p class="job-card__salary"><?php echo esc_html( $salary ); ?></p>
            <?php endif; ?>
            <div class="job-card__meta">
              <?php if ( $location ) : ?>
                <span class="job-card__meta-item">
                  <svg class="job-card__meta-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  <?php echo esc_html( $location ); ?>
                </span>
              <?php endif; ?>
              <?php if ( $hours ) : ?>
                <span class="job-card__meta-item">
                  <svg class="job-card__meta-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                  <?php echo esc_html( $hours ); ?>
                </span>
              <?php endif; ?>
            </div>
            <div class="job-card__footer">
              <a href="<?php echo esc_url( get_permalink( $job->ID ) ); ?>" class="btn btn--filled btn--sm">詳細を見る</a>
              <a href="#contact" class="btn btn--ghost btn--sm">Apply</a>
            </div>
          </article>
        <?php endforeach; ?>
      <?php else : ?>
        <!-- ダミー求人（DBに求人がない場合） -->
        <?php
        $dummy_jobs = [
          [ 'type' => 'Executive', 'title' => 'Chief Technology Officer', 'salary' => '年収 2,000万円〜', 'location' => '東京都港区', 'desc' => '技術戦略の立案から実行まで、会社の技術的ビジョンを牽引するCTOポジションです。' ],
          [ 'type' => 'Senior', 'title' => 'Senior Product Manager', 'salary' => '年収 1,200万円〜', 'location' => '東京都渋谷区', 'desc' => 'プロダクトの長期戦略を描き、世界水準のユーザー体験を実現するリーダーを募集しています。' ],
          [ 'type' => 'Engineer', 'title' => 'Principal Engineer', 'salary' => '年収 1,500万円〜', 'location' => 'Remote / 東京', 'desc' => 'アーキテクチャ設計から技術選定まで、エンジニアリング全体をリードするポジションです。' ],
          [ 'type' => 'Creative', 'title' => 'Head of Design', 'salary' => '年収 1,000万円〜', 'location' => '東京都港区', 'desc' => 'ブランドビジョンを体現するデザインシステムを構築し、デザイン組織を率いるリーダーを求めています。' ],
          [ 'type' => 'Business', 'title' => 'Business Development Director', 'salary' => '年収 1,300万円〜', 'location' => '東京都千代田区', 'desc' => '国内外のパートナーシップ戦略を立案・実行し、事業の持続的成長を担うポジションです。' ],
          [ 'type' => 'Finance', 'title' => 'Senior Finance Manager', 'salary' => '年収 1,100万円〜', 'location' => '東京都丸の内', 'desc' => '財務戦略の高度化と経営意思決定のサポートを担う、シニアファイナンスマネージャーを募集します。' ],
        ];
        foreach ( $dummy_jobs as $i => $job ) :
        ?>
          <article class="job-card reveal reveal-delay-<?php echo ( $i % 3 ) + 1; ?>">
            <div class="job-card__header">
              <span class="badge badge--primary"><?php echo esc_html( $job['type'] ); ?></span>
              <?php if ( $i < 2 ) : ?><span class="job-card__new">New</span><?php endif; ?>
            </div>
            <h3 class="job-card__title"><?php echo esc_html( $job['title'] ); ?></h3>
            <p class="job-card__desc"><?php echo esc_html( $job['desc'] ); ?></p>
            <p class="job-card__salary"><?php echo esc_html( $job['salary'] ); ?></p>
            <div class="job-card__meta">
              <span class="job-card__meta-item">
                <svg class="job-card__meta-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <?php echo esc_html( $job['location'] ); ?>
              </span>
            </div>
            <div class="job-card__footer">
              <a href="#contact" class="btn btn--filled btn--sm">詳細を見る</a>
              <a href="#contact" class="btn btn--ghost btn--sm">Apply</a>
            </div>
          </article>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </div>
</section>

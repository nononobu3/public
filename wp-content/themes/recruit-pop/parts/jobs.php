<?php
$jobs = recruit_pop_get_jobs( [ 'posts_per_page' => 6 ] );
?>
<section class="section jobs-section" id="jobs" aria-label="求人一覧">
  <div class="container">

    <div class="section-heading reveal">
      <span class="section-heading__label">Open Positions</span>
      <h2 class="section-heading__title">現在の<span>募集職種</span></h2>
      <p class="section-heading__desc">
        あなたのスキルと情熱を活かせるポジションがきっと見つかります。
        経験・未経験問わず、意欲のある方を歓迎します。
      </p>
    </div>

    <div class="jobs-filter reveal" role="group" aria-label="職種フィルター">
      <button class="tag is-active" data-filter="all">すべて</button>
      <button class="tag" data-filter="engineer">エンジニア</button>
      <button class="tag" data-filter="design">デザイン</button>
      <button class="tag" data-filter="bizdev">ビジネス</button>
      <button class="tag" data-filter="marketing">マーケティング</button>
      <button class="tag" data-filter="hr">コーポレート</button>
    </div>

    <?php if ( $jobs ) : ?>
    <div class="jobs-grid">

      <?php foreach ( $jobs as $job ) :
        $salary   = get_post_meta( $job->ID, 'job_salary', true );
        $location = get_post_meta( $job->ID, 'job_location', true );
        $hours    = get_post_meta( $job->ID, 'job_hours', true );
        $deadline = get_post_meta( $job->ID, 'job_deadline', true );
        $terms    = get_the_terms( $job->ID, 'job_type' );
        $is_new   = ( strtotime( $job->post_date ) > strtotime( '-30 days' ) );
      ?>
      <article class="job-card reveal" itemscope itemtype="https://schema.org/JobPosting">
        <div class="job-card__header">
          <div class="job-card__type">
            <?php if ( $terms ) : foreach ( $terms as $term ) : ?>
              <span class="badge badge--secondary"><?php echo esc_html( $term->name ); ?></span>
            <?php endforeach; endif; ?>
          </div>
          <?php if ( $is_new ) : ?>
            <span class="job-card__new" aria-label="新着">NEW</span>
          <?php endif; ?>
        </div>

        <h3 class="job-card__title" itemprop="title">
          <a href="<?php echo esc_url( get_permalink( $job->ID ) ); ?>">
            <?php echo esc_html( $job->post_title ); ?>
          </a>
        </h3>

        <p class="job-card__desc" itemprop="description">
          <?php echo esc_html( wp_trim_words( $job->post_excerpt ?: $job->post_content, 55 ) ); ?>
        </p>

        <?php if ( $salary ) : ?>
        <div class="job-card__salary" itemprop="baseSalary">
          <?php echo esc_html( $salary ); ?>
        </div>
        <?php endif; ?>

        <div class="job-card__meta">
          <?php if ( $location ) : ?>
          <div class="job-card__meta-item" itemprop="jobLocation">
            <svg class="job-card__meta-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <?php echo esc_html( $location ); ?>
          </div>
          <?php endif; ?>
          <?php if ( $hours ) : ?>
          <div class="job-card__meta-item">
            <svg class="job-card__meta-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <?php echo esc_html( $hours ); ?>
          </div>
          <?php endif; ?>
          <?php if ( $deadline ) : ?>
          <div class="job-card__meta-item">
            <svg class="job-card__meta-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            締切: <?php echo esc_html( $deadline ); ?>
          </div>
          <?php endif; ?>
        </div>

        <div class="job-card__footer">
          <div class="tag-list">
            <?php
            $dept_terms = get_the_terms( $job->ID, 'job_department' );
            if ( $dept_terms ) :
              foreach ( array_slice( $dept_terms, 0, 3 ) as $dept ) :
            ?>
              <span class="tag"><?php echo esc_html( $dept->name ); ?></span>
            <?php endforeach; endif; ?>
          </div>
          <a href="<?php echo esc_url( get_permalink( $job->ID ) ); ?>" class="btn btn--primary btn--sm">
            詳細を見る
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </article>
      <?php endforeach; ?>

    </div>
    <?php else : ?>
    <div class="jobs-empty" style="text-align:center; padding: var(--space-16) 0;">
      <p style="color: var(--color-text-muted); font-size: var(--font-size-md);">
        現在、求人情報を準備中です。お問い合わせください。
      </p>
    </div>
    <?php endif; ?>

    <div style="text-align:center; margin-top: var(--space-12);" class="reveal">
      <a href="<?php echo esc_url( get_post_type_archive_link( 'job' ) ); ?>" class="btn btn--outline btn--lg">
        すべての求人を見る
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

  </div>
</section>

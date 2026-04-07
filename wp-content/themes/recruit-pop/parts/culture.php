<section class="section culture-section" id="culture" aria-label="社内文化">
  <div class="container">

    <div class="section-heading reveal">
      <span class="section-heading__label">Our Culture</span>
      <h2 class="section-heading__title">私たちの<span>カルチャー</span></h2>
      <p class="section-heading__desc">
        多様性を尊重し、誰もが自分らしく働ける文化を大切にしています。
      </p>
    </div>

    <div class="culture-grid" style="display:grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); align-items:center;">

      <div class="culture-images" style="display:grid; grid-template-columns:1fr 1fr; grid-template-rows:auto auto; gap: var(--space-4);">
        <div style="border-radius: var(--radius-xl); overflow:hidden; aspect-ratio:4/3; grid-column:1/3;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/culture-1.jpg' ); ?>" alt="チームワークの様子" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <div style="border-radius: var(--radius-xl); overflow:hidden; aspect-ratio:1/1;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/culture-2.jpg' ); ?>" alt="社内イベント" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <div style="border-radius: var(--radius-xl); overflow:hidden; aspect-ratio:1/1;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/culture-3.jpg' ); ?>" alt="オフィスの様子" style="width:100%;height:100%;object-fit:cover;">
        </div>
      </div>

      <div class="culture-content reveal">
        <span class="section-heading__label" style="margin-bottom: var(--space-4); display:inline-block;">Our Values</span>
        <h2 class="text-h2" style="margin-bottom: var(--space-6);">
          私たちが大切にしている<br>
          <span style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent;">バリュー</span>
        </h2>

        <div class="culture-values" style="display:flex; flex-direction:column; gap: var(--space-5);">

          <div class="culture-value" style="display:flex; gap: var(--space-4); align-items:flex-start;">
            <div style="width:48px;height:48px;border-radius:var(--radius-md);background:linear-gradient(135deg,rgba(255,107,107,0.15),rgba(78,205,196,0.15));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <svg width="22" height="22" fill="none" stroke="var(--color-primary)" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
              <h3 style="font-size:var(--font-size-base);font-weight:var(--font-weight-bold);margin-bottom:var(--space-1);">Be Yourself</h3>
              <p style="font-size:var(--font-size-sm);color:var(--color-text-muted);line-height:var(--line-height-relaxed);">個性を活かし、ありのままの自分で仕事に挑戦できる環境を用意しています。</p>
            </div>
          </div>

          <div class="culture-value" style="display:flex; gap: var(--space-4); align-items:flex-start;">
            <div style="width:48px;height:48px;border-radius:var(--radius-md);background:linear-gradient(135deg,rgba(255,107,107,0.15),rgba(78,205,196,0.15));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <svg width="22" height="22" fill="none" stroke="var(--color-secondary)" stroke-width="2" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
            </div>
            <div>
              <h3 style="font-size:var(--font-size-base);font-weight:var(--font-weight-bold);margin-bottom:var(--space-1);">Move Fast</h3>
              <p style="font-size:var(--font-size-sm);color:var(--color-text-muted);line-height:var(--line-height-relaxed);">スピード感を持って行動し、失敗を恐れずチャレンジする文化が根付いています。</p>
            </div>
          </div>

          <div class="culture-value" style="display:flex; gap: var(--space-4); align-items:flex-start;">
            <div style="width:48px;height:48px;border-radius:var(--radius-md);background:linear-gradient(135deg,rgba(255,107,107,0.15),rgba(78,205,196,0.15));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
              <svg width="22" height="22" fill="none" stroke="var(--color-accent-dark)" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
              <h3 style="font-size:var(--font-size-base);font-weight:var(--font-weight-bold);margin-bottom:var(--space-1);">Grow Together</h3>
              <p style="font-size:var(--font-size-sm);color:var(--color-text-muted);line-height:var(--line-height-relaxed);">チームとして成長し、互いの成功を喜び合える仲間と働ける環境です。</p>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</section>

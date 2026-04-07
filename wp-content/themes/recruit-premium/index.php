<?php
/**
 * Fallback template
 *
 * @package recruit-premium
 */

get_header(); ?>

<main class="site-main">
  <div class="container section">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_excerpt(); ?>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p><?php esc_html_e( 'コンテンツが見つかりませんでした。', 'recruit-premium' ); ?></p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer();

<?php get_header(); ?>

<main id="main-content">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container section">
      <div class="prose">
        <?php the_content(); ?>
      </div>
    </div>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>

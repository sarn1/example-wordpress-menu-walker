<?php get_header(); ?>
<main role="main">
<?php if (have_posts()) :
  while (have_posts()) : the_post(); ?>
    <article>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </article>
    <aside>
      <?php get_sidebar(); ?>
    </aside>
  <?php endwhile;

  elseif (is_404()) : ?>

  <article>
    <h1>We're sorry...</h1>
    <p>Looks like we can't find the page you are looking for!</p>
  </article>

  <?php endif; ?>
</main>
<?php get_footer(); ?>
<?php get_header(); ?>
<div id="content_body">
<section>
<?php if (have_posts()) :
		while (have_posts()) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<article><?php the_content(); ?></article>

        <?php get_sidebar(); ?>

	<?php endwhile;
	elseif (is_404()) : ?>

		<article>
		<h1>We're sorry...</h1>
		<p>Looks like we can't find the page you are looking for!</p>
		</article>

	<?php endif; ?>
</section>
</div>
<?php get_footer(); ?>
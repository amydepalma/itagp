<?php

/**
 * ITAGP Singleton
 */

get_header();

?>

<main id="page">
	<?php while (have_posts()) : the_post(); ?>

		<h1><?php the_title(); ?> </h1>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
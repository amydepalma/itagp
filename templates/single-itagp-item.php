<?php

/**
 * ITAGP Singleton
 */

get_header();

?>

<main id="page">
	<?php while (have_posts()):
    the_post();
    // Item details
    $itagp_cat_id = get_field('category');
    $itagp_cat_obj = !empty($itagp_cat_id) ? get_term($itagp_cat_id) : null;
    $itagp_cat_name = !empty($itagp_cat_obj) ? $itagp_cat_obj->name : 'Uncategorized';
    $itagp_preferred_brand_ids = get_field('preferred_brands');
    $itagp_related_recipes = get_field('related_recipes');
    $itagp_notes = get_field('notes');
    ?>
			<h1><?php the_title();?></h1>
			<p><?=$itagp_cat_name?></p>

			<?php if ($itagp_preferred_brand_ids): ?>
		    <ul>
		    	<?php foreach ($itagp_preferred_brand_ids as $brand_id): $brand = get_term($brand_id);?>
				      <li><?=esc_html($brand->name);?></p></li>
				    <?php endforeach;?>
		    </ul>
			<?php endif;?>

		<?php if ($itagp_related_recipes): ?>
			<p><?=esc_html($itagp_related_recipes->name);?></p>
		<?php endif;?>

		<?php if ($itagp_notes): ?>
			<div><?=$itagp_notes?></div>
		<?php endif;?>

	<?php endwhile;?>
</main>

<?php get_footer();?>
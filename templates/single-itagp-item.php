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
		<article id="itagp-item-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="article-grid wrapper">
				<header class="article-grid__title pt-6">
					<div class="mw-sm">
						<h1><?php the_title();?></h1>
					</div>
				</header>

				<?php if (has_post_thumbnail()): //todo pass class and elment to wrapper for better resuability?>
					<div class="article-grid__image">
						<?php //ald_post_thumbnail(); ?>
					</div>
				<?php endif; ?>

				<div class="article-grid__content">
					<?php if ($itagp_notes): ?>
						<div><?=$itagp_notes?></div>
						<hr>
					<?php endif;?>

					<?php if(have_rows('price_log')): ?>
						<table class="sortable" style="width: 100%">
							<thead>
								<tr>
									<th>Date</th>
									<th>Store</th>
									<th>Brand</th>
									<th>Price</th>
									<th>Size</th>
									<th>Unit</th>
									<th>Discount</th>
								</tr>
							</thead>
							<tbody>
							<?php while(have_rows('price_log')) :
								the_row();
								$date = get_sub_field('log_date');
								$store_id = get_sub_field('store');
								$brand_id = get_sub_field('brand');
								$price = get_sub_field('price');
								$size = get_sub_field('size');
								$unit = get_sub_field('unit');
								$discounts = get_sub_field('discount');
							?>
								<tr>
									<td><time><?= $date ?></time></td>
									<td>
										<?php if ($store_id): $store = get_term($store_id); ?>
											<?=esc_html($store->name);?>
										<?php endif;?>
									</td>
									<td>
										<?php if ($brand_id): $brand = get_term($brand_id); ?>
											<?=esc_html($brand->name);?>
										<?php endif;?>
									</td>
									<td>$<?= $price ?></td>
									<td><?= $size ?></td>
									<td><?= $unit ?></td>
									<td>
										<?php if( $discounts ): ?>
											<?php echo implode( ', ', $discounts ); ?>
										<?php endif;?>
									</td>
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					<?php	endif; ?>
				</div>

				<aside class="article-grid__sidetop">
					<p class="mb-4">
						<span class="fs-xs fw-bold text-uppercase">Category: <br></span>
						<?=$itagp_cat_name?>
						<?php //get_template_part('templates/wp-block/post-terms', null, ['taxonomy' => 'category', 'post' => $post]); ?>
					</p>

					<?php if ($itagp_preferred_brand_ids): ?>
						<p class="fs-xs fw-bold text-uppercase">Preferred Brands</p>
						<ul class="list-unstyled">
							<?php foreach ($itagp_preferred_brand_ids as $brand_id): $brand = get_term($brand_id);?>
									<li><?=esc_html($brand->name);?></li>
								<?php endforeach;?>
						</ul>
					<?php endif;?>

					<?php if ($itagp_related_recipes): ?>
						<p><?=esc_html($itagp_related_recipes->name);?></p>
					<?php endif;?>
				</aside>
			</div>
	</article>
	<?php endwhile;?>
</main>

<?php get_footer();?>
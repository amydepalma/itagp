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
		<article id="itagp-item-<?php the_ID(); ?>" <?php post_class('wrapper'); ?>>
			<header class="mw-sm">
				<h1><?php the_title();?></h1>

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
			</header>

			<?php if(have_rows('price_log')):
				$price_totals = array();
				$size_all = array();
			?>
			<section>
				<?php

					while(have_rows('price_log')) :
						the_row();
						$price = get_sub_field('price');
						$size = get_sub_field('size');
						$unit = get_sub_field('unit');

						// Calculate the totals
						// TODO: More efficient way to do this so its nto always on load?
						array_push($price_totals, floatval($price));
						array_push($size_all, $size);

						// need to map the size with the price so we have average per each unit
						// dont need until i have different units
					endwhile;

					$price_total = array_sum($price_totals);
					$price_avg = $price_total / count($price_totals);
					$price_min = min($price_totals);
					$price_max = max($price_totals);
				?>
				<h2>Highlights</h2>
				<div class="columns columns-3 my-4">
						<div>
							<p>
								<strong>Average Price</strong><br>
								<span data-itagp="price-avg"><?= '$'. $price_avg ?></span>
							</p>
						</div>
						<div>
							<p>
								<strong>Lowest Price</strong><br>
								<span data-itagp="price-min"><?= '$'. $price_min ?></span>
							</p>
						</div>
						<div>
							<p>
								<strong>Highest Price</strong><br>
								<span data-itagp="price-max"><?= '$'. $price_max ?></span>
							</p>
						</div>
				</div>
			</section>

			<?php if ($itagp_notes): ?>
				<section>
					<hr>
					<h2>Notes</h2>
					<?=$itagp_notes?>
				</section>
			<?php endif;?>

			<section>
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
			</section>
			<?php	endif; ?>


	</article>
	<?php endwhile;?>
</main>

<?php get_footer();?>
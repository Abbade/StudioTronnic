<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     99.99
 */

get_header('shop'); ?>
<div class = "outerpagewrap">
	<div class="pagewrap">
		<div class="pagecontent">
			<div class="pagecontentContent">
				<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
				<p><?php the_breadcrumb(); ?></p>
			</div>
			<div class="homeIcon"><a href="<?php echo home_url(); ?>"></a></div>
		</div>

	</div>
</div>

	<div id="mainwrap" class="homewrap">

		<div id="main" class="clearfix">
			
			<div class="content fullwidth">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div>
	

		</div>
	</div>

<?php get_footer('shop'); ?>
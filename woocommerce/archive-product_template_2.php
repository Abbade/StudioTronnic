<?php


get_header('shop'); 
global $data,$wpdb;

?>
	<div class = "outerpagewrap">

		<div class="pagewrap">

			<div class="pagecontent">

				<div class="pagecontentContent">
				
					<h1>
						<?php if ( is_search() ) : ?>
							<?php
								printf( __( 'Search Results: &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() );
								if ( get_query_var( 'paged' ) )
									printf( __( '&nbsp;&ndash; Page %s', 'woocommerce' ), get_query_var( 'paged' ) );
							?>
						<?php elseif ( is_tax() ) : ?>
							<?php echo single_term_title( "", false ); ?>
						<?php else : ?>
							<?php
								$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );

								echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
							?>
						<?php endif; ?>
						
					</h1>
					<?php woocommerce_breadcrumb(); ?>
				</div>

				<div class="homeIcon"><a href="<?php echo home_url(); ?>"></a></div>

			</div>



		</div>

	</div>					
	<div id="mainwrap" class="homewrap">

		<div id="main" class="clearfix">
		
		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( is_tax() ) : ?>
			<?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>
		<?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>
			<?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>
		<?php endif; ?>
		
		<?php 


			


		?>

		<?php if ( have_posts() ) : ?>

			<?php
			/**
			* Sorting
			*/
			?>
			<div class="categorytopbarWraper">

			<?php get_template_part('woocommerce/loop/sorting'); ?>
			
			<div class="categorytopbar">

				<?php dynamic_sidebar( 'sidebar_category_top' ); ?>

			</div>
			</div>
			
			<div class="homeRacent">
			<div class="wocategoryFull">
				<div class="productR">
					<?php woocommerce_product_subcategories(); ?>
					<?php
					$currentindex = '';
					$countPost = 1;
					$countitem = 1;
					while ( have_posts() ) : the_post(); global $product;
					$postmeta = get_post_custom(get_the_id());
					$count = $wpdb->get_var("
						SELECT COUNT(meta_value) FROM $wpdb->commentmeta
						LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
						WHERE meta_key = 'rating'
						AND comment_post_ID = ".get_the_id()."
						AND comment_approved = '1'
						AND meta_value > 0
					");
					$rating = $wpdb->get_var("
						SELECT SUM(meta_value) FROM $wpdb->commentmeta
						LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
						WHERE meta_key = 'rating'
						AND comment_post_ID = ".get_the_id()."
						AND comment_approved = '1'
					");						
					if($countPost != 4){
						echo '<div class="one_fourth" >';
					}
					else{
						echo '<div class="one_fourth last" >';
						$countPost = 0;
					}?>
						<a href="<?php echo get_permalink( get_the_id() ) ?>" title="<?php the_title() ?>">
						<?php if(isset($postmeta["video_active"][0]) && $postmeta["video_active"][0] == 1) { ?>
							<div class="recentimage">
								<div class="image">
									<div class="loading"></div>
									<?php
									
										if ($postmeta["selectv"][0] == 'vimeo')  
										{  
											echo '<iframe class = "productIframe full" src="http://player.vimeo.com/video/'.$postmeta["video_post_url"][0].'" width="230" height="'. $data['catalog_img_height'] .'"  ></iframe>';  
										}  
										else if ($postmeta["selectv"][0] == 'youtube')  
										{  
											echo '<iframe class = "productIframe full youtube"  width="230" height="'. $data['catalog_img_height'] .'" src="http://www.youtube.com/embed/'.$postmeta["video_post_url"][0].'"  ></iframe>';  
										}  
										else  
										{  
											//echo 'Please select a Video Site via the WordPress Admin';  
										} 

									?>
								</div>
							</div>								
							
							<?php } else { ?>
							<div class="recentimage">
								<div class="overdefult">
									<?php if($postmeta["meta_hover_short"][0]){ ?>
									<div class="text"><?php echo shortcontent('[', ']', '', $post->post_content ,400);?> ...</div>
									<?php } else {?>
									<div class="text"><?php echo $postmeta["meta_post_hover"][0];?></div>
									<?php } ?>										
								</div>
								<div class="image">
									<div class="loading"></div>
									<?php if (has_post_thumbnail( get_the_id() )) echo get_image_pmc(230,$data['catalog_img_height'],get_the_id()); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_catalog_image_width').'px" height="'.$woocommerce->get_image_size('shop_catalog_image_height').'px" />'; ?>
								</div>
							</div>						
							<?php  }  ?>
						</a>
							<div class="recentdescription">
								<?php woocommerce_show_product_sale_flash( '', $product ); ?>
								<h3><a href="<?php echo get_permalink( get_the_id() ) ?>" title="<?php the_title() ?>"><?php echo substr(the_title(' ', ' ', false),0,40) ?></a></h3>
								<?php 
								if ( $count > 0 ) :
									$average = number_format($rating / $count, 2);
								endif;
									echo '<div class="star-rating" title="'.sprintf(__('Rated 0 out of 5', 'woocommerce'), $average).'"><span style="width:'.($average*16).'px"></span></div>';

								?>
								<div class="shortDescription"><?php echo shortcontent('[', ']', '', get_post_field('post_content', get_the_id() ) ,85);?> ...<?php closeTags(shortcontent('[', ']', '', get_post_field('post_content', get_the_id() ) ,95)) ?></div>
								<h3 class="category"><span class="price"><?php echo $product->get_price_html(); ?></span></h3>	
							</div>
							<div class="recentCart"><?php woocommerce_template_loop_add_to_cart( get_the_id(), $product ); ?></div>
						
						</div>
					<?php 
					$countPost++;
					
					$countitem++;

					 endwhile; // end of the loop. ?>

				</div>
				<?php
				
					include(TEMPLATEPATH .'/includes/wp-pagenavi.php');
					if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				?>
				<?php do_action('woocommerce_after_shop_loop'); ?>
			</div>
		<?php else : ?>

			<?php if ( ! woocommerce_product_subcategories( array( 'before' => '<ul class="products">', 'after' => '</ul>' ) ) ) : ?>

				<p><?php _e( 'No products found which match your selection.', 'woocommerce' ); ?></p>

			<?php endif; ?>
		
		<?php endif; ?>


		</div>
		</div>
	</div>

<?php get_footer('shop'); ?>
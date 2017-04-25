<?php
	if(isset($data['home_recent_productsF_number']))
		$showpost = $data['home_recent_productsF_number'];
	else
		$showpost = 8;
		
	if(isset($data['home_recent_number_display_fproduct']))
		$rows = $data['home_recent_number_display_fproduct'];
	else
		$rows = 4;
		
	if(isset($productShow)){
		$rows = $productShow;
	}
	$args = array( 'post_type' => 'product', 'orderby'=>'rand', 'posts_per_page' => $showpost ,'meta_query' => array(
            array(
                'key' => '_visibility',
                'value' => array('catalog', 'visible'),
                'compare' => 'IN'
            ),
            array(
                'key' => '_featured',
                'value' => 'yes'
            ) ) );


	$pc = new WP_Query( $args );
	
?>


	<script type="text/javascript">


		jQuery(document).ready(function(){	  
		
			// Slider
			var $slider = jQuery('#productF').bxSlider({
						controls: true,
						displaySlideQty: 1,
						default: 1000,
						easing : 'easeInOutQuint',
						prevText : '',
						nextText : '',
						pager :false,
						video: true,
						useCSS: false	
						
					});



		 });
	</script>




		

<div class="homeRacent">
	<div class="titleborder shop"></div>
	<h2><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_featured']); } else {  _e('Our Futured Products','wp-musica'); } ?></h2>
	<div class="homeRecent hProductR">
		<ul id ="productF" class="productR">
			<?php
			$currentindex = '';
			if ($pc->have_posts()) :
			$countPost = 1;
			$countitem = 1;
			?>
			<?php  while ($pc->have_posts()) : $pc->the_post(); 
			$postmeta = get_post_custom(get_the_ID());
			global $product;
			$count = $wpdb->get_var("
				SELECT COUNT(meta_value) FROM $wpdb->commentmeta
				LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
				WHERE meta_key = 'rating'
				AND comment_post_ID = ".get_the_ID()."
				AND comment_approved = '1'
				AND meta_value > 0
			");
			$rating = $wpdb->get_var("
				SELECT SUM(meta_value) FROM $wpdb->commentmeta
				LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
				WHERE meta_key = 'rating'
				AND comment_post_ID = ".get_the_ID()."
				AND comment_approved = '1'
			");
			if($countitem == 1){
				echo '<li>';}				
			if ( has_post_thumbnail() ){
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
				$image = $image[0];}
			else
				$image = get_template_directory_uri() .'/images/placeholder-580.png'; 
				if( has_post_format( 'link' , get_the_ID()))
				add_filter( 'the_excerpt', 'filter_content_link' );		
			if($countPost != 4){
				echo '<div class="one_fourth" >';
			}
			else{
				echo '<div class="one_fourth last" >';
				$countPost = 0;
			}?>
					<?php if(isset($postmeta["video_active"][0]) && $postmeta["video_active"][0] == 1) { ?>
						<div class="recentimage">
							<div class="image">
								<div class="loading"></div>
								<?php
								
									if ($postmeta["selectv"][0] == 'vimeo')  
									{  
										echo '<iframe class = "productIframe full" src="http://player.vimeo.com/video/'.$postmeta["video_post_url"][0].'" width="230" height="'. $data['catalog_img_height'] .'"></iframe>';  
									}  
									else if ($postmeta["selectv"][0] == 'youtube')  
									{  
										echo '<iframe class = "productIframe full youtube"  width="230" height="'. $data['catalog_img_height'] .'" src="http://www.youtube.com/embed/'.$postmeta["video_post_url"][0].'"></iframe>';  
									}  
									else  
									{  
										//echo 'Please select a Video Site via the WordPress Admin';  
									} 

								?>
							</div>
						</div>								
						
						<?php } else { ?>
						<a href="<?php echo get_permalink( get_the_ID() ) ?>" title="<?php the_title() ?>">
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
									<?php if (has_post_thumbnail( get_the_ID() )) echo get_image_pmc(230,230,get_the_ID()); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="230px" height="'.$data['catalog_img_height'].'px" />'; ?>
								</div>
							</div>
						</a>
						<?php  }  ?>
					<div class="recentdescription">
						<?php woocommerce_show_product_sale_flash( get_the_ID(), $product ); ?>
						<h3><a href="<?php echo get_permalink( get_the_ID() ) ?>" title=""><?php the_title() ?></a></h3>
						<?php 
						if ( $count > 0 ) :
							$average = number_format($rating / $count, 2);
						endif;
							echo '<div class="star-rating" title="'.sprintf(__('Rated 0 out of 5', 'woocommerce'), $average).'"><span style="width:'.($average*16).'px"></span></div>';

						?>
						<div class="shortDescription"><?php echo shortcontent('[', ']', '', $post->post_content ,70);?> ...<?php closeTags(shortcontent('[', ']', '', $post->post_content ,70));  ?></div>
						<h3 class="category"><span class="price"><?php echo $product->get_price_html(); ?></span></h3>	
					</div>
					<div class="recentCart"><?php woocommerce_template_loop_add_to_cart(get_the_ID(), $product ); ?></div>
				
				</div>
			<?php 
			$countPost++;
			
			 if($countitem == $rows){ 
				$countitem = 0; ?>
				</li>
			<?php } 
			$countitem++;
			endwhile; endif;
			wp_reset_query(); ?>
			</ul>
		</div>
	</div>

<div class="clear"></div>


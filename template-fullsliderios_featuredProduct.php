<?php
/*
Template Name: Full Width iosSlider Page with Feat. Product
*/
?>

<?php get_header(); ?>

<script type="text/javascript">

	jQuery(document).ready(function() {
		
		jQuery('.iosSlider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			infiniteSlider: true,
			snapSlideCenter: true,
			onSlideChange: slideChange,
			autoSlideTransTimer: '1250',
			autoSlide: false,
			autoSlideTimer: '7000',
			stageCSS: {
				overflow: 'visible'
			},

			navPrevSelector: jQuery('.prevButton'),
			navNextSelector: jQuery('.nextButton')	
		});
		
	});
	
	function slideChange(args) {
	
		
		jQuery('.item').removeClass('selected');
		jQuery('.item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
	
			}
	
</script>	
	
<?php $slides = $data['iosslider']; //get the slides array?>

<div id="slider-wrapper" class="ios">
<div class="loading"></div>	

<div id="slider">
		<div class = 'containerOuter'>
		
			<div class = 'container'>
				
				<div class = 'iosSliderContainer'>
					
					<div class = 'iosSlider'>
					
						<div class = 'slider'>
						<?php 
						$i = 0;
						if(!empty($slides)){
						foreach ($slides as $slide) {  ?>
								<?php 
								$hover = '';
								if(isset($slide['description']) ){ 
									if($slide['description'] !='' ){ 	
										$hover='hover';
									}
								}?>
								<?php if($i==0) { ?>
									<div class = 'item item-<?php echo $i ?> selected <?php echo $hover ?>'>  
								<?php } else { ?>
								<div class = 'item item-<?php echo $i ?> <?php echo $hover ?>'> 
								<?php }  ?>		
									<div class="sliderHolder">
										<?php if($slide['url'] != '') :
						   
											 if($slide['link'] != '') : ?>
											   <a href="<?php echo $slide['link']; ?>"><img src="<?php echo $slide['url']; ?>"  alt="<?php echo stripText($slide['title']); ?>"/></a>
											<?php else: ?>
												<img src="<?php echo $slide['url']; ?>" alt="<?php echo stripText($slide['title']); ?>" />
											<?php endif; ?>
													
										
										<div class = 'showtext textBottom'>
											<div class = 'bgBottom'></div>
											
											<div class = 'titleBottom'>
												<?php echo stripText($slide['title']); ?>
											</div>
										
										
										<?php if(isset($slide['description']) ){ ?>
											<?php if($slide['description'] !='' ){ ?>
											<div class = 'iosDescription'>
												<div class = 'desc'>
													<?php echo stripText($slide['description']); ?>
												</div>
											</div>
											<?php }}?>
										</div>
										<?php endif; ?>										
									</div>
								</div>
						<?php 
						$i++;
						}} ?>	
						</div>
						<div class = 'prevButton'></div>
		
						<div class = 'nextButton'></div>
					</div>
					
				</div>
			
			</div>
					
		</div>
		
</div>
		
</div>


<div id="mainwrap" >

	<div id="main" class="clearfix">
		<?php if(function_exists( 'is_woocommerce' )) { ?>
			
			<?php include(BOX_PATH .  'homeracentProductF.php'); ?>
			
		<?php }?>	
		<div class="content fullwidth">

				<div class="postcontent">
					<div class="posttext">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						
						<div class="usercontent"><?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?></div>
						
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						
						<?php endwhile; endif; ?>
					</div>

	
				</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

<?php
/*
Template Name: klasièna stran s iosSlider
*/
?>

<?php get_header(); ?>
<?php 
	wp_register_script('pmc_addthis', 'http://s7.addthis.com/js/250/addthis_widget.js?domready=1', array(
		'jquery'
	), true);  
	wp_enqueue_script('pmc_addthis');


?>

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
<div id="mainwrap" class="homewrap">

<div id="main" class="clearfix">

	<?php if(isset($data['infotext_status'])) { ?>
		<div class="infotextwrap">
			<div class="infotext">
				<div class="infotextBorder"></div>
				<h2><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['infotext']); } else {  _e('Welcome to <span>emporium</span> - A Minimal Business Theme','wp-emporium'); } ?></h2>
				<div class="infotextBorder"></div>
			</div>
		</div>
	<?php }?>
	
	<div class="clear"></div>
	
	
	<?php if($data['box_status']) { ?>

		<?php include('includes/boxes/homebox.php'); ?>
		
	<?php }?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	
	<div class="usercontent homeuser"><?php the_content(); ?></div>
	
	
	<?php endwhile; endif; ?>

	<div class="clear"></div>	
	
	

		<?php include('includes/boxes/homeracentPort.php'); ?>
	
		
	
	

		<?php include('includes/boxes/homeracentPostPortDesign.php'); ?>
	
	



		<?php include('includes/boxes/advertise.php'); ?>
		
		
	<div class="clear"> </div>	

</div>
</div>


<?php get_footer(); ?>
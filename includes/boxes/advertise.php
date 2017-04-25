	<script type="text/javascript">


		jQuery(document).ready(function(){	  


		<?php if(count($data['advertiseimage'])> 5) { ?>
		// Slider
		var $slider = jQuery('.sliderAdvertise').bxSlider({
			maxSlides:6,
			minSlides:1,
			moveSlides:1,
			prevText : '',
			nextText : '',
			auto : true,
			easing : 'easeInOutQuint',
			pause : 4000,
			pager :false

		});

		<?php } ?> 

		 });
	</script>
	
	<div class="advertise">
	<div class="title">
		<div class="titleborder"></div>
		<h2><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_advertise_title']); } else {  _e('Our major brands','wp-musica'); } ?></h2>
	</div>

		<?php 
		if(isset($data['advertiseimage'])){
			$slides = $data['advertiseimage']; ?>
			<ul class="sliderAdvertise">
			<?php foreach ($slides as $slide) {  ?>
				<li>
				<?php
				  if($slide['url'] != '') :
						   
					 if($slide['link'] != '') : ?>
					   <a href="<?php echo $slide['link']; ?>"><img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['title'] ?>" /></a>
					<?php else: ?>
						<img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['title'] ?>"/>
					<?php endif; ?>
							
				<?php endif; ?>
				</li>
			<?php } ?>
			</ul>
		<?php } ?>	
		
	</div>
<?php

	if(isset($data['home_recent_number']))
		$showpost = $data['home_recent_number'];
	else
		$showpost = 9;
		
	if(isset($data['home_recent_number_display']))
		$rows = $data['home_recent_number_display'];
	else
		$rows = 3;

	$pc = new WP_Query(array('orderby' => 'date', 'showposts' =>  $showpost, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'post_type' => array( 'portfolioentry'))); 
?>

	<script type="text/javascript">


		jQuery(document).ready(function(){	  


		// Slider
		var $slider = jQuery('#sliderAdvertisePort').bxSlider({
			controls: true,
			displaySlideQty: 1,
			default: 1000,
			easing : 'easeInOutQuint',
			prevText : '',
			nextText : '',
			pager :false
			
		});



		 });
	</script>
	
<?php 	if ($pc->have_posts()) : ?>
<div class="homeRacent portHome">
	<div class="titleborder"></div>
	<h2><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_port']); } else {  _e('Recent from Our portfolio','wp-musica'); } ?></h2>
	<div class="homeRecent">
	<ul id="sliderAdvertisePort" class="sliderAdvertisePort">
		<?php
		$currentindex = '';
		$count = 1;
		$countitem = 1;
		?>
		<?php  while ($pc->have_posts()) : $pc->the_post();
		if($countitem == 1){
			echo '<li>';}			
		$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);	
		$catType= 'portfoliocategory';
		
		//category
		$categoryIn = get_the_term_list( get_the_ID(), $catType, '', ', ', '' );	
		$category = explode(',',$categoryIn);	
		//end category			
		if ( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
			$image = $image[0];}
		else
			$image = get_template_directory_uri() .'/images/placeholder-580.png'; 
			if( has_post_format( 'link' , get_the_ID()))
			add_filter( 'the_excerpt', 'filter_content_link' );		
		if($count != 3){
			echo '<div class="one_third" >';
		}
		else{
			echo '<div class="one_third last" >';
			$count = 0;
		}
		?>
				<div class="recentimage">
					
					<div class="overdefult">
						<a class="overdefultlink" href="<?php the_permalink() ?>">
							<div class="portDate"><?php echo get_the_date(); ?></div>
							<div class="portIcon"></div>
						</a>
						<div class="portCategory"><?php echo $categoryIn; ?></div>
					</div>
					
					<div class="image">
						<div class="loading"></div>
						<img src="<?php echo get_template_directory_uri() ?>/js/timthumb.php?src=<?php echo $image ?>&amp;h=230&amp;w=310" alt="<?php the_title(); ?>">
					</div>
				</div>
				<div class="recentdescriptionPort">
					<h3><a class="overdefultlink" href="<?php the_permalink() ?>"><?php $title = the_title('','',FALSE);  echo substr($title, 0, 99);  ?></a></h3>
					
					<div class="descriptionHomePort">
						<div class="borderLine"><div class="borderLineLeft"></div><div class="borderLineRight"></div></div>
						<div class="descriptionHomePortText"><?php echo strip_tags(substr(($post->post_content) ,0,250),'<strong>'); ?>...<?php closeTags(strip_tags(substr($post->post_content ,0,250),'<strong>'));  ?></div>
					</div>
				</div>
			
			</div>
		<?php 
		$count++;
		
		 if($countitem == $rows){ 
			$countitem = 0; ?>
			</li>
		<?php } 
		$countitem++;
		endwhile; 
		wp_reset_query(); ?>
		</ul>
	</div>
</div>

<?php  endif; ?>

<div class="clear"></div>


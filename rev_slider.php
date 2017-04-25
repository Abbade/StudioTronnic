<?php
/*
Template Name: Home with Revolution slider
*/
?>

<?php get_header(); ?>


<? if(function_exists('putRevSlider')){ ?>
	<?php  $slider = get_post_custom($post->ID); ?>

	<?php if($slider['rev_slider'][0]){ ?>
	<div id="slider-wrapper" class="rev-slider">
		<div class="loading"></div>	
		<div id="slider">
			<?php putRevSlider($slider['rev_slider'][0]) ?>  
		</div>	
	</div>
	<?php } ?>
<?php } ?>

<div id="mainwrap" class="homewrap">

<div id="main" class="clearfix">

	<?php if(isset($data['infotext_status'])) { ?>
		<div class="infotextwrap">
			<div class="infotext">
				<div class="infotextBorder"></div>
				<h2><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['infotext']); } else {  _e('Welcome to <span>musica</span> - A Minimal Business Theme','wp-musica'); } ?></h2>
				<?php if(isset($data['quote_bottom_border'])) { ?>				
					<div class="infotextBorder"></div>
				<?php }?>	
			</div>
		</div>
	<?php }?>
	
	<div class="clear"></div>
	
	
	<?php if(isset($data['box_status'])) { ?>

		<?php include(BOX_PATH .  'homebox.php'); ?>
		
	<?php }?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	
	<div class="usercontent homeuser"><?php the_content(); ?></div>
	
	
	<?php endwhile; endif; ?>
	
	
	<div class="clear"></div>	
	
	<?php if(isset($data['racent_status_productF']) && function_exists( 'is_woocommerce' )) { ?>
		<?php include(BOX_PATH .  'homeracentProductF.php'); ?>
	
	<?php }?>	
	
	<?php if(isset($data['racent_status_product']) && function_exists( 'is_woocommerce' )) { ?>
		<?php include(BOX_PATH .  'homeracentProduct.php'); ?>
	
	<?php }?>
	
		
	<?php if(isset($data['racent_status_port'])) { ?>
		
		<?php include(BOX_PATH . 'homeracentPort.php'); ?>
	
	<?php }?>
	
	<?php if(isset($data['racent_status'])) { ?>
	
		<?php 
		if(isset($data['hoemrecentdesign'])) {
			if($data['hoemrecentdesign'] == 1) 
				include(BOX_PATH . 'homeracentPost.php'); 
			else
				include(BOX_PATH . 'homeracentPostPortDesign.php'); 
		}
		?>
	
	<?php }?>	

	<div class="clear"> </div>
		
	
	<?php if(isset($data['showadvertise'])) { ?>

		<?php include(BOX_PATH . 'advertise.php'); ?>
		
	<?php }?>		

	<div class="clear"> </div>	

</div>
</div>


<?php get_footer(); ?>
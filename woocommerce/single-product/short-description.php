<?php
global $post, $product, $data;
$postmeta = get_post_custom(get_the_id());
?>
	<?php if($postmeta["audio_show"][0]){ ?>
	<div class="descriptionSP short">
		<h2><?php echo translation('translation_sample', 'Live Sample') ?></h2>
		<div class="audioPlayer">
			<?php echo do_shortcode('[audio file="'. $postmeta["audio_product_url"][0] .'"]') ?>
		</div>	
	</div>
	<?php } else {} ?>
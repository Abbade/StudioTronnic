<?php get_header(); 

?>

<script type="text/javascript">
jQuery(document).ready(function($){
	    $('.slider').anythingSlider({
		hashTags : false,
		expand		: true,
		autoPlay	: true,
		resizeContents  : false,
		pauseOnHover    : true,
		buildArrows     : false,
		buildNavigation : false,
		delay		: 4000,
		resumeDelay	: 0,
		animationTime	: 800,
		delayBeforeAnimate:0,	
		easing : 'easeInOutQuint',
	    })


	});
	
</script>	
<div class = "outerpagewrap">
	<div class="pagewrap">
		<div class="pagecontent">
			<div class="pagecontentContent">
				<h1><?php echo  translation('translation_blog_page', 'Welcome to <span>our blog</span>, we will keep you informed'); ?></h1>
				<p><?php the_breadcrumb(); ?></p>
			</div>
			<div class="homeIcon"><a href="<?php echo home_url(); ?>"></a></div>
		</div>

	</div>
</div>   
<div id="mainwrap">

	<div id="main" class="clearfix">


		<div class="pad"></div>	
					
			<div class="content blog">
						
				<?php if (have_posts()) : ?>
				
				<?php while (have_posts()) : the_post();
				$postmeta = get_post_custom($post->ID); 
				if ( has_post_format( 'gallery' , $post->ID)) { 
				?>
				<div class="slider-category">
				
					<div class="blogpostcategory">
					<?php
						global $post;
						$post_subtitrare = get_post( $post->ID );
						$content = $post_subtitrare->post_content;
						$pattern = get_shortcode_regex();
						preg_match( "/$pattern/s", $content, $match );
						if( isset( $match[2] ) && ( "gallery" == $match[2] ) ) {
							$atts = shortcode_parse_atts( $match[3] );
							$attachments = isset( $atts['ids'] ) ? explode( ',', $atts['ids'] ) : get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID .'&order=ASC&orderby=menu_order ID' );
						}

						if ($attachments) {?>
						<div id="slider-category" class="slider-category">
						<div class="loading"></div>
							<ul id="slider" class="slider">
								<?php
									foreach ($attachments as $attachment) {
										$image =  wp_get_attachment_image_src( $attachment, 'blog' ); ?>	
											<li>
											<div class="slider-item">
												<img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>"/>					
													
											</div>			
											</li>
											<?php } ?>
							</ul>
							
						</div>
				  <?php } else { ?>
				  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="http://placehold.it/580x280" alt="<?php the_title(); ?>"></a>
				  <?php }?>
						<div class="entry">
							
							<div class="leftholder">
									<div class = "posted-date"><div class = "date-inside"><a href="<?php 
									$arc_year = get_the_time('Y'); 
									$arc_month = get_the_time('m'); 
									$arc_day = get_the_time('d');
									echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><div class="day"><?php the_time('j') ?></div><div class="month"><?php the_time('M') ?></div> </a></div></div>
								<div class="commentblog"><div class = "circleHolder"><div class = "comment-inside"><?php socialLinkCat(get_permalink(),get_the_title(),false) ?></div></div></div>
							</div>
							<div class = "meta">
									
									<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<div class="authorblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_by']); } else {  _e('By: ','wp-musica'); } ?></strong> <?php the_author_posts_link(); ?></div>
									<div class="categoryblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_categories']); } else {  _e('Categories: ','wp-musica'); } ?></strong>							
											<?php   if(get_query_var('portfoliocategory')){ 
												echo get_the_term_list( $post->ID, 'portfoliocategory', '', ', ', '' ); 
											} else {
												the_category(', '); 
											}?></div>
									<div class="blogcontent"><?php echo shortcontent('[', ']', '', $post->post_content ,300);?> ...</div>
									<a class="blogmore" href="<?php the_permalink() ?>"><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_morelink']); } else {  _e('Read more','wp-musica'); } ?> &rarr;</a>

							</div>
							
						</div>	
					</div>
				</div>
				<?php } 
				if ( has_post_format( 'video' , $post->ID)) { ?>
				<div class="slider-category">
				
					<div class="blogpostcategory">
					<div class="loading"></div>
					<?php
					
					if(!empty($postmeta["video_post_url"][0])) {?>
					<?php  
						if ($postmeta["selectv"][0] == 'vimeo')  
						{  
							echo '<iframe src="http://player.vimeo.com/video/'.$postmeta["video_post_url"][0].'" width="580" height="280"  ></iframe>';  
						}  
						else if ($postmeta["selectv"][0] == 'youtube')  
						{  
							echo '<iframe width="580" height="280" src="http://www.youtube.com/embed/'.$postmeta["video_post_url"][0].'"  ></iframe>';  
						}  
						else  
						{  
							echo 'Please select a Video Site via the WordPress Admin';  
							}  
					}
					else{ ?>
						  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="http://placehold.it/580x280" alt="<?php the_title(); ?>"></a>
						
					<?php } ?>					
						<div class="entry">
							
							<div class="leftholder">
								<div class = "posted-date"><div class = "date-inside"><a href="<?php 
									$arc_year = get_the_time('Y'); 
									$arc_month = get_the_time('m'); 
									$arc_day = get_the_time('d');
									echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><div class="day"><?php the_time('j') ?></div><div class="month"><?php the_time('M') ?></div> </a></div></div>
								<div class="commentblog"><div class = "circleHolder"><div class = "comment-inside"><?php socialLinkCat(get_permalink(),get_the_title(),false) ?></div></div></div>
							</div>
							<div class = "meta">
									
									<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<div class="authorblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_by']); } else {  _e('By: ','wp-musica'); } ?></strong> <?php the_author_posts_link(); ?></div>
									<div class="categoryblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_categories']); } else {  _e('Categories: ','wp-musica'); } ?></strong>						
											<?php   if(get_query_var('portfoliocategory')){ 
												echo get_the_term_list( $post->ID, 'portfoliocategory', '', ', ', '' ); 
											} else {
												the_category(', '); 
											}?></div>
									<div class="blogcontent"><?php echo shortcontent('[', ']', '', $post->post_content ,300);?> ...</div>
									<a class="blogmore" href="<?php the_permalink() ?>"><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_morelink']); } else {  _e('Read more','wp-musica'); } ?> &rarr;</a>

							</div>
							
						</div>	
					</div>
				</div>
				<?php } 
				if ( has_post_format( 'link' , $post->ID)) {?>
				<div class="link-category">
					<div class="blogpostcategory">
					<span><?php echo the_content(); ?> </span>


					<div class="entry">
						
						<div class="leftholder">
								<div class = "posted-date link"><div class = "date-inside"><a href="<?php 
									$arc_year = get_the_time('Y'); 
									$arc_month = get_the_time('m'); 
									$arc_day = get_the_time('d');
									echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><div class="day"><?php the_time('j') ?></div><div class="month"><?php the_time('M') ?></div> </a></div></div>
							<div class="commentblog"></div>
						</div>
						<div class = "meta">
								
								<h2 class="title"><a href="<?php if(isset($postmeta["link_post_url"][0] )) echo $postmeta["link_post_url"][0] ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<div class="authorblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_by']); } else {  _e('By: ','wp-musica'); } ?></strong> <?php the_author_posts_link(); ?></div>
									<div class="categoryblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_categories']); } else {  _e('Categories: ','wp-musica'); } ?></strong>							
										<?php   if(get_query_var('portfoliocategory')){ 
											echo get_the_term_list( $post->ID, 'portfoliocategory', '', ', ', '' ); 
										} else {
											the_category(', '); 
										}?></div>
										<a class="blogmore" href="<?php if(isset($postmeta["link_post_url"][0] )) echo $postmeta["link_post_url"][0]  ?>"><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_morelink']); } else {  _e('Read more','wp-musica'); } ?> &rarr;</a>

						</div>
						
					</div>	
						
					</div>
				</div>
				
				<?php 
				} 	
				?>
				<?php if ( has_post_format( 'audio' , $post->ID)) {?>
				<div class="blogpostcategory">
					<div class="audioPlayerWrap">
						<div class="loading"></div>
						<div class="audioPlayer">
							<?php echo do_shortcode('[audio file="'. $postmeta["audio_post_url"][0] .'"]') ?>
						</div>
					</div>
					<div class="entry">
						
						<div class="leftholder">
							<div class = "posted-date"><div class = "date-inside"><a href="<?php 
								$arc_year = get_the_time('Y'); 
								$arc_month = get_the_time('m'); 
								$arc_day = get_the_time('d');
								echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><div class="day"><?php the_time('j') ?></div><div class="month"><?php the_time('M') ?></div> </a></div></div>
							<div class="commentblog"><div class = "circleHolder"><div class = "comment-inside"><?php socialLinkCat(get_permalink(),get_the_title(),false) ?></div></div></div>
						</div>
						<div class = "meta">
								
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<div class="authorblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_by']); } else {  _e('By: ','wp-musica'); } ?></strong> <?php the_author_posts_link(); ?></div>
								<div class="categoryblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_categories']); } else {  _e('Categories: ','wp-musica'); } ?></strong>							
										<?php   if(get_query_var('portfoliocategory')){ 
											echo get_the_term_list( $post->ID, 'portfoliocategory', '', ', ', '' ); 
										} else {
											the_category(', '); 
										}?></div>
								<div class="blogcontent"><?php echo shortcontent('[', ']', '', $post->post_content ,300);?> ...</div>
								<a class="blogmore" href="<?php the_permalink() ?>"><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_morelink']); } else {  _e('Read more','wp-musica'); } ?> &rarr;</a>

						</div>
						
					</div>		
				</div>	
				<?php
				}
				?>					
				
				
				<?php
				if ( !get_post_format() ) {?>
						
				<div class="blogpostcategory">
																
						<a class="overdefultlink" href="<?php the_permalink() ?>">
						<div class="overdefult">
						</div>
						</a>
						
						<div class="blogimage">	
							<div class="loading"></div>		
							<?php	
								if ( has_post_thumbnail() ){
									$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
									$image = $image[0];
									}
								else
									$image = 'http://placehold.it/580x280'; 
							?>
							
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>"></a>
						</div>
						
						<div class="entry">
							
							<div class="leftholder">
								<div class = "posted-date"><div class = "date-inside"><a href="<?php 
									$arc_year = get_the_time('Y'); 
									$arc_month = get_the_time('m'); 
									$arc_day = get_the_time('d');
									echo get_day_link($arc_year, $arc_month, $arc_day); ?>"><div class="day"><?php the_time('j') ?></div><div class="month"><?php the_time('M') ?></div> </a></div></div>
								<div class="commentblog"><div class = "circleHolder"><div class = "comment-inside"><?php socialLinkCat(get_permalink(),get_the_title(),false) ?></div></div></div>
							</div>
							<div class = "meta">
									
									<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<div class="authorblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_by']); } else {  _e('By: ','wp-musica'); } ?></strong> <?php the_author_posts_link(); ?></div>
									<div class="categoryblog"><strong><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_categories']); } else {  _e('Categories: ','wp-musica'); } ?></strong>							
											<?php   if(get_query_var('portfoliocategory')){ 
												echo get_the_term_list( $post->ID, 'portfoliocategory', '', ', ', '' ); 
											} else {
												the_category(', '); 
											}?></div>
									<div class="blogcontent"><?php echo shortcontent('[', ']', '', $post->post_content ,300);?> ...</div>
									<a class="blogmore" href="<?php the_permalink() ?>"><?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['translation_morelink']); } else {  _e('Read more','wp-musica'); } ?> &rarr;</a>

							</div>
							
						</div>		
				</div>	
				<?php } ?>		
					<?php endwhile; ?>
					
						<?php
						
							include('includes/wp-pagenavi.php');
							if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
						?>
						
						<?php else : ?>
						
							<div class="postcontent">
								<h1><?php echo $data['errorpagetitle'] ?></h1>
								<div class="posttext">
									<?php echo $data['errorpage'] ?>
								</div>
							</div>
							
						<?php endif; ?>
					
			</div>
		
					<div class="sidebar">	
		
						<?php dynamic_sidebar( 'sidebar' ); ?>

			
					</div>

	</div>
	
</div>				
							
<?php get_footer(); ?>

<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>
<div class = "outerpagewrap">	<div class="pagewrap">		<div class="pagecontent">			<div class="pagecontentContent">				<h1><?php the_title();?></h1>				<p><?php the_breadcrumb(); ?></p>			</div>			<div class="homeIcon"><a href="<?php echo home_url(); ?>"></a></div>		</div>	</div></div>

			
<div id="mainwrap">

	<div id="main" class="clearfix">
			<div class="content fullwidth">
					<div class="postcontent">
						<div class="posttext">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							
							<div class="usercontent"><?php the_content(); ?></div>
							
							<?php endwhile; endif; ?>
						</div>
					</div>
			</div>
	</div>
</div>
<?php get_footer(); ?>

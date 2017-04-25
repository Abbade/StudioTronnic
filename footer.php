<?php
footer();
global $data, $sitepress;
?>
<footer>
		
<div id="footer">
	<div class="totop"><div class="gototop"><div class="arrowgototop"></div></div></div>
	<div class="fshadow"></div>
	
	<div id="footerinside">
	


		<div class="footer_widget">
			
				<div class="footer_widget1">
				<?php dynamic_sidebar( 'footer1' ); ?>
				<?php if($data['showsocialfooter']){ ?>
				<div class="socialfooter">
				<h3><?php _e('SOCIALIZE WITH US','wp-musica'); ?></h3>
				<div class="socialcategory"><?php socialLinkTop() ?></div>
				</div>	
				<?php } ?>				
				</div>	
				
				<div class="footer_widget2">	
				<?php dynamic_sidebar( 'footer2' ); ?>
				</div>	
				
				<div class="footer_widget3">	
				<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
				
				<div class="footer_widget4 last">	
				<?php dynamic_sidebar( 'footer4' ); ?>
				</div>
				
		</div>



	</div>
	
	
	
		<div id="footerbwrap">
			<div id="footerb">
			<div class="footernav">
					<?php if ( has_nav_menu( 'footer-menu' ) ) { wp_nav_menu( array( 'menu_class' => 'footernav','theme_location' => 'footer-menu' ) );} ?>
			</div>
			<div class="copyright">							<?php if (!function_exists('icl_object_id') or (ICL_LANGUAGE_CODE == $sitepress->get_default_language()) ) { echo stripText($data['copyright']); } else {  _e('&copy; 2011 All rights reserved. ','wp-musica'); } ?>

			</div>
		</div>
	</div>
</div>
	

</footer>	<?php wp_footer();  ?><script type="text/javascript" charset="utf-8"> jQuery(document).ready(function(){    jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme:'light_rounded',show_title: false,deeplinking:false});  });</script>
</body>
</html>

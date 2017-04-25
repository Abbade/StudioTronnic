<?php
function js_inc_function()
{
    if (!is_admin()) {
    
         wp_register_script('pmc_customjs', get_template_directory_uri() . '/js/custom.js', array(
            'jquery'
        ), true);  
		wp_enqueue_script('pmc_customjs');		      

		
        wp_register_script('pmc_prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(
            'jquery'
        ), true);
		wp_enqueue_script('pmc_prettyphoto');
		
        wp_register_script('pmc_jtools', get_template_directory_uri() . '/js/jquery.tools.min.js', array(
            'jquery'
        ), true);
		wp_enqueue_script('pmc_jtools');
		
        wp_register_script('pmc_easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(
            'jquery'
        ), true);
		wp_enqueue_script('pmc_easing');
		

		
        wp_register_script('pmc_cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array(
            'jquery'
        ), true);
		wp_enqueue_script('pmc_cycle');
		
        wp_register_script('pmc_nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.pack.js', array(
            'jquery'
        ), true);
		wp_enqueue_script('pmc_nivo');
		
        wp_register_script('pmc_any', get_template_directory_uri() . '/js/jquery.anythingslider.js', array(
            'jquery'
        ), true);
		wp_enqueue_script('pmc_any');
		
        wp_register_script('pmc_any_fx', get_template_directory_uri() . '/js/jquery.anythingslider.fx.js', array(
            'jquery'
        ), true);		
		wp_enqueue_script('pmc_any_fx');
		
        wp_register_script('pmc_any_video', get_template_directory_uri() . '/js/jquery.anythingslider.video.min.js', array(
            'jquery'
        ), true);		
		wp_enqueue_script('pmc_any_video');		


        wp_register_script('pmc_isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(
            'jquery'
        ), true);  
		wp_enqueue_script('pmc_isotope');				
        wp_register_script('pmc_ba-bbq', get_template_directory_uri() . '/js/jquery.ba-bbq.js', array(
            'jquery'
        ), true);  
		wp_enqueue_script('pmc_ba-bbq');	
        wp_register_script('pmc_contact', get_template_directory_uri() . '/js/contact.js', array(
            'jquery'
        ), true);  
		wp_enqueue_script('pmc_contact');		
       wp_register_script('pmc_news', get_template_directory_uri() . '/js/jquery.li-scroller.1.0.js', array(
            'jquery'
        ), true);  
		wp_enqueue_script('pmc_news');	
		
        wp_register_script('pmc_gistfile', get_template_directory_uri() . '/js/gistfile_pmc.js', array(
            'jquery'
        ) ,'',true);  
		wp_enqueue_script('pmc_gistfile');

        wp_register_script('pmc_progress', get_template_directory_uri() . '/js/jquery-ui-1.9.2.custom.min.js', array(
            'jquery'
        ) ,true);  
		wp_enqueue_script('pmc_progress');		

        wp_register_script('pmc_bxSlider', get_template_directory_uri() . '/js/jquery.bxslider.js', array(
            'jquery'
        ) ,true);  
		wp_enqueue_script('pmc_bxSlider');					
			
		wp_register_script('pmc_iosslider', get_template_directory_uri() . '/js/jquery.iosslider.min.js', array(            'jquery'        ) ,true,true);  		
		
		wp_enqueue_script('pmc_iosslider');						

		wp_register_script('pmc_zoom', get_template_directory_uri() . '/js/jquery.elevateZoom-3.0.8.min.js', array(            'jquery'        ) ,true,true);  		
		
		wp_enqueue_script('pmc_zoom');			

		wp_register_script('pmc_fid', get_template_directory_uri() . '/js/jquery.fitvids.js', array(            'jquery'        ) ,true,true);  		
		
		wp_enqueue_script('pmc_fid');					
    }
}
add_action('init', 'js_inc_function');

//css
function enqueue_css() {
	global $data; 
    if( !is_admin()){
		wp_register_style('main', get_stylesheet_uri(), 'style');
		wp_enqueue_style( 'main');
		wp_register_style('options',  get_stylesheet_directory_uri() . '/css/options.css', 'style');
		wp_enqueue_style( 'options');		
		wp_register_style('prettyp', get_template_directory_uri() . '/prettyPhoto.css', 'style');
		wp_enqueue_style( 'prettyp');		if(isset($data['heading_font'])){			if($data['heading_font']['face'] != 'verdana' and $data['heading_font']['face'] != 'trebuchet' and $data['heading_font']['face'] != 'georgia' and $data['heading_font']['face'] != 'Helvetica Neue' and $data['heading_font']['face'] != 'times,tahoma') {				wp_register_style('googleFont', 'http://fonts.googleapis.com/css?family='.$data['heading_font']['face'] ,'',NULL);				wp_enqueue_style( 'googleFont');				}				}		if(isset($data['body_font'])){			if(($data['body_font']['face'] != 'verdana') and ($data['body_font']['face'] != 'trebuchet') and ($data['body_font']['face'] != 'georgia') and ($data['body_font']['face'] != 'Helvetica Neue') and ($data['body_font']['face'] != 'times,tahoma')) {				wp_register_style('googleFontbody', 'http://fonts.googleapis.com/css?family='.$data['body_font']['face'] ,'',NULL);				wp_enqueue_style( 'googleFontbody');			}						}
		wp_register_style('progresive_pms', get_template_directory_uri() . '/js/jquery-ui-1.8.css' ,'',NULL);
		wp_enqueue_style( 'progresive_pms');
		
	}
}
add_action('init', 'enqueue_css');


?>
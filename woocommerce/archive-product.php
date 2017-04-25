<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     99.99
 */
 
  global $data;
  
	if($data['catwootype'] == 1 && !isset($_GET['shop'])){
		include('archive-product_template_2.php');
	}
	if($data['catwootype'] == 2 && !isset($_GET['shop'])){
		include('archive-product_template_1.php');
	}
	if(isset($_GET['shop']) == 'sidebar'){
		include('archive-product_template_1.php');
	}	
?>
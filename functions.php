<?php

	add_theme_support('post-formats');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');

	add_filter('get_twig', 'add_to_twig');
	add_filter('timber_context', 'add_to_context');

	add_action('wp_enqueue_scripts', 'load_scripts');
	add_action('wp_enqueue_scripts', 'load_styles');

	register_nav_menu( 'primary', 'Primary Navigation' );

	function add_to_context($data){
		/* this is where you can add your own data to Timber's context object */
		$data['menu'] = wp_nav_menu(array('menu' => 175, 'echo' => false));
		$data['sidebar'] = Timber::get_sidebar();
		return $data;
	}

	function add_to_twig($twig){
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension(new Twig_Extension_StringLoader());
		return $twig;
	}

	function load_scripts(){
		wp_enqueue_script('jquery');
	}

	function load_styles(){
		wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}






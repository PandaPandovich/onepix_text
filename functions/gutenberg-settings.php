<?php


    add_action( 'enqueue_block_editor_assets', 'misha_custom_block' );
function misha_custom_block(){
	// wp_enqueue_script() with your block JS goes first...
    wp_enqueue_script('js-block',get_stylesheet_directory_uri() . '/dist/js/bundle.min.js', array( 'jquery'), time());
	// block css
	wp_enqueue_style(
		'gutenberg-blocks-css',
		get_stylesheet_directory_uri() . '/dist/css/bundle.min.css',
		array( 'wp-edit-blocks' ),
		time()
	);

}

?>
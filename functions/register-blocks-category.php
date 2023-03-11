<?php
 // Регистрируем категорию блоков в Gutenberg
 function custom_block_categories( $categories ) {
	$category_slugs = wp_list_pluck( $categories, 'slug' );
	return in_array( 'custom-blocks', $category_slugs, true ) ? $categories : array_merge(
		$categories,
		array(
			array(
				'slug'  => 'custom-blocks',
				'title' => __( 'Site Custom Blocks', 'custom-blocks' ),
				'icon'  => null,
			),
		)
	);
}
add_filter( 'block_categories', 'custom_block_categories' );
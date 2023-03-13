<?php
add_action('acf/init', 'my_acf_block_menu');
function my_acf_block_menu()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'Menu-block',
            'title'             => __('Блок меню'),
            'description'       => __('Блок меню'),
            'render_callback'   => 'render_menu',
            'category'          => 'custom-blocks',
            'mode'              => 'preview',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'example'          => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'is_preview'    => true
                    )
                )
            )
        ));
    }
}

function render_menu($block, $content = '', $is_preview = false, $post_id = 0)
{
    // Create id attribute allowing for custom "anchor" value.
    $id = 'text-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'guten-customblock-';
    if (!empty($block['className'])) {
        $className .= ' ' . $block['className'];
    }

    $hero_bg = get_field('hero_bg');
    $hero_image = get_field('hero_img');
?>
    <section id="menu" class="menu">
       <div class="container menu__wrapper">
            <div class="menu__header">
                <div class="menu__logo">
                <?php the_custom_logo(); ?>
                </div>
            </div>
            <div class="menu__nav">
                <?php

wp_nav_menu( [
	'theme_location'  => 'primary',
	'container'       => 'ul',
	'menu_class'      => 'menu__list',
] );
                ?>
            </div>
       </div>
    </section>
<?php
}
<?php
add_action('acf/init', 'my_acf_block_hero');
function my_acf_block_hero()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'Hero-block',
            'title'             => __('Главный блок'),
            'description'       => __('Главный блок'),
            'render_callback'   => 'render_hero',
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

function render_hero($block, $content = '', $is_preview = false, $post_id = 0)
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
    <section id="hero" class="hero">
        <div class="hero-inner container">
            <div class="hero__bg">
                <?php echo wp_get_attachment_image($hero_bg, 'full') ?>
            </div>
            <div class="hero__mask"></div>
            <div class="hero__content">
                <?php echo wp_get_attachment_image($hero_image, 'full') ?>
            </div>
        </div>  
        <div class="hero__downScroll">
            <a href="#menu" class="hero__downScroll-link">Листайте вниз</a>
        </div>
    </section>
<?php

if($is_preview) {
    ?>
    <style>
        .hero__bg {
            z-index: 1;
            position:absolute;
        }

        .hero__bg img{
            height:100%;
        }
        </style>
    <?php
}
}
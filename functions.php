<?php


add_theme_support('custom-logo');


// автообновление версии файлов
function my_theme_load_resources() {

    $theme_uri = get_template_directory_uri();
    $theme_styles = $theme_uri.'/dist/css/bundle.min.css';
    $theme_scripts = $theme_uri.'/dist/js/bundle.min.js';

    // global style connected

    wp_register_style('my-theme-style', $theme_styles , false, filemtime(get_stylesheet_directory() .'/dist/css/bundle.min.css'));
    wp_enqueue_style('my-theme-style');
        
    // scripts connected
        
    wp_register_script('my_theme_functions', $theme_scripts , array('jquery'), filemtime(get_stylesheet_directory() .'/dist/css/bundle.min.css'), true);
    wp_enqueue_script('my_theme_functions'); 
}
add_action('wp_enqueue_scripts', 'my_theme_load_resources');


// guten blocks
foreach(glob(get_template_directory() . '/templates/blocks/*.php') as $file){
    require $file;
}

// Подключение категории для кастомных блоков
include 'functions/register-blocks-category.php';

// Подключение меню
include 'functions/register-nav.php';

// Подключение меню
include 'functions/gutenberg-settings.php';
<?php

function my_wp_scripts(){
   wp_enqueue_style('bootstrap',
       sprintf('%s/assets/css/bootstrap.min.css',get_template_directory_uri()));
   wp_enqueue_style('style', get_stylesheet_uri());
   wp_enqueue_script('bootstrap',
       sprintf('%s/assets/js/bootstrap.min.js',get_template_directory_uri()),
       ['jquery'],null, true);
}

add_action('wp_enqueue_scripts', 'my_wp_scripts');

add_theme_support('post-thumbnails');
set_post_thumbnail_size(300,300);

// Registrar um custom post type
function post_type_obras() {

	$labels = array(
        'name' => "Obras",
        'singular_name' => "Obra",
        'add_new' => "Adicionar Nova Obra",
        'add_new_label' => "Adicionar Nova Obra",
        'all_item' => "Todas as Obras",
        'all_new_item' => "Adicionar Nova Obra",
        'edit_item' => "Editar Obra",
        'new_item' => "Nova Obra",
        'view_item' => "Visualizar Obra",
        'search_item' => "Procurar Obra",
        'not_found' => "Nenhuma Obra Encontrada",
        'not_found_in_trash' => "Nenhuma Obra na Lixeira"
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'supports' => array(
            'title', 'editor', 'thumbnail', 'excerpt'
        ),
        'menu_position' => 5,
        'exclude_from_search' => false,
        'taxonomies'          => array( 'category' )
    );

    register_post_type('obras',$args);
}

add_action('init','post_type_obras');
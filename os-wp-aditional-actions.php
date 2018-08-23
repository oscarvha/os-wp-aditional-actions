<?php
/*
 * Plugin Name: OS funcionalidades adicionales
 * Plugin URI: bibliotecadeterminus.xyz
 * Description: Añade funcionalidades para pods y shortcodes adicionales
 * Version: 1.0.0
 * Author: Oscar Sanchez
 * Author URI: bibliotecadeterminus.xyz
 * Requires at least: 4.0
 * Tested up to: 4.3
 *
 * Text Domain: wpos-additional
 * Domain Path: /languages/
 */

include 'Model/PodsRepository.php';
include "Model/RenderView.php";

function shortcode_pods($attrs) {
    $var = $attrs;

    $podRepository = new PodsRepository($attrs['pod']);
    $quotes = $podRepository->getQuotes();

    if($quotes){
        $renderView = new RenderView();
        return $renderView->renderQuotes($quotes);

    }

    return false;
}

add_shortcode('podsview', 'shortcode_pods');


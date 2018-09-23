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


/**
 * @param $attrs
 * @return bool|string
 */
function shortcode_pods($attrs) {
    if($attrs['pod'] =='quotes_andrea' || $attrs['pod'] == 'quotes_robert')
        return getPodsQuotes($attrs['pod']);
    else if($attrs['pod'] =='box_galery' )
       return getPodsBoxsGaleries($attrs['pod']);

    return false;
}


/**
 * @param $podRepository
 * @return bool|string
 */
function getPodsQuotes($podRepository){
    $podRepository = new PodsRepository($podRepository);
    $quotes = $podRepository->getQuotes();

    if(!$quotes)
        return false;

    $renderView = new RenderView();
    return $renderView->renderQuotes($quotes);
}

function getPodsBoxsGaleries($podRepository){
    $podRepository = new PodsRepository($podRepository);
    $boxes = $podRepository->getBoxes();
    if(!$boxes)
        return false;

    $renderView = new RenderView();
    return $renderView->renderBoxes($boxes);

}
add_shortcode('podsview', 'shortcode_pods');


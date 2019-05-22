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

include 'Model/PodRepository.php';
include "Model/RenderView.php";
include 'Tools/Tools.php';

/**
 * @param $podRepository
 * @return bool|string
 */
function getPodsQuotes($podRepository)
{
    $podRepository = new PodRepository($podRepository);
    $quotes = $podRepository->getQuotes();

    if(!$quotes) {

        return false;
    }

    $renderView = new RenderView();
    return $renderView->renderQuotes($quotes);
}

function getPodsBoxesGalleries($podRepository)
{
    $podRepository = new PodRepository($podRepository);
    $boxes = $podRepository->getBoxes();
    if(!$boxes) {

        return false;
    }

    $renderView = new RenderView();
    return $renderView->renderBoxes($boxes);

}

/**
 * @param $optionsGroup string
 * @param $option string
 * @return mixed|null
 */
function getPodOptions($optionsGroup , $option)
{
    $podRepository = new PodRepository($optionsGroup);
    return $podRepository->getOptionByName($option);
}

/**
 * @param string $optionsGroup
 * @param string $option
 * @param string $size
 * @param int $default
 * @param bool $force
 * @return string
 */
function getPodsMediaOption($optionsGroup, $option,  $size = 'thumbnail', $default = 0, $force = false)
{
    $media = getPodOptions($optionsGroup,$option);
    return Tools::getMediaUrl($media,$size,$default,$force);


}

function getLastEvents($limit = 3)
{
    $podRepository = new PodRepository('event');
    return $podRepository->getEvents($limit);
}

function getExtendMediaURL($media, $size = 'thumbnail')
{
    return Tools::getMediaUrl($media,$size);

}


function getFirstNameCategoryAndLink($postId)
{
    $categories = get_the_category($postId);

    if ( ! empty( $categories ) ) {

        return [
            'name' =>  esc_html( $categories[0]->name ),
            'link' =>   esc_url( get_category_link( $categories[0]->term_id ) )
        ];
    }
}
add_shortcode('podsview', 'shortcut_pods');


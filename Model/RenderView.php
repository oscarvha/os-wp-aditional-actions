<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 23/08/18
 * Time: 21:20
 */

class RenderView
{
    public function renderQuotes($quotes){
        $html = '';
        $html .= '<div class="container"><div class="quotes-wrapper">';
        foreach($quotes as $quote){

            $html .= '<div class="quote-item">'.
                  ' <p class="quote-item__autor">'.$quote['name_quote'].'</p>'.
                    '<div class="quote-item__body">'.$quote['text_quote'].'</div>';

        }
        $html .='</div></div>';

        return $html;
    }


    public function renderBoxes($boxes){
        $html = '';
        $html .= '<div class="galeries-wrapper">';
        foreach($boxes as $box){

            $html .= '<div class="galeries__galery-content">'.
                '<figure class="galeries__galery-figure">'.
                '<img class="galeries__galery-image"src="'.$box['image_box'].'" alt="">'.
                '</figure> '.
                '<div class="galeries__galery-link">'.
                '<a href="'.$box['link_box'].'" class="galeries__galery-button" tabindex="0">'.
                $box['name_link_box'].
                '</a> </div> </div>';

        }
        $html .='</div>';

        return $html;
    }

}
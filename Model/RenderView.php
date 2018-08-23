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

}
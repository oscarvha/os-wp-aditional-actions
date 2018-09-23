<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 23/08/18
 * Time: 21:08
 */

class PodsRepository{

    private $podObject;

    public function __construct($podName){

        $this->podObject = pods( $podName );
    }

    public function findPods($params = null){

       return  $this->podObject->find($params);
    }

    public function getQuotes($params = null){
        $result = [];

        $podsResult = $this->podObject->find($params);
        if ( 0 < $podsResult->total() ) {
            while ( $podsResult->fetch() ) {
                $pod = array('name_quote' => $podsResult->display('name_quote'),
                    'text_quote' => $podsResult->display('text_quote'));
                $result[] = $pod;

            }
            return $result;
        }
        return false;
    }



    public function getBoxes($params = null){
        $result = [];

        $podsResult = $this->podObject->find($params);
        if ( 0 < $podsResult->total() ) {
            while ( $podsResult->fetch() ) {
                $pod = array('name_link_box' => $podsResult->display('name_link'),
                    'link_box' => $podsResult->display('link_galery'),
                    'image_box' => $podsResult->display('pick_galery'));
                $result[] = $pod;

            }
            return $result;
        }
        return false;
    }

}
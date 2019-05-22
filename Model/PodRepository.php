<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 23/08/18
 * Time: 21:08
 */

class PodRepository
{

    private $podObject;

    public function __construct($podName){

        $this->podObject = pods( $podName );
    }

    public function findPods($params = null)
    {

       return  $this->podObject->find($params);
    }

    public function getQuotes($params = null)
    {
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

    public function getBoxes($params = null)
    {
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

    public function getOptionByName($option)
    {
        return $this->podObject->field( $option );
    }

    public function getEvents($limit = 3, $params = null)
    {
        $result = [];

        $podsResult = $this->podObject->find($params);
        if ( 0 < $podsResult->total() ) {
            while ( $podsResult->fetch() ) {
                $pod = ['title' => $podsResult->display('post_title'),
                        'url' => get_permalink($podsResult->display('id')),
                        'date' => $podsResult->display('date_text'),
                        'description' => $podsResult->display('event_description'),
                        'featured_image' =>  Tools::getMediaUrl($podsResult->display('event_featured_image'),'event_home size'),
                        'past_event'=> Tools::pastDate($podsResult->display('event_date'))
                    ];
                $result[] = $pod;

            }
            return $result;
        }
        return false;
    }

}
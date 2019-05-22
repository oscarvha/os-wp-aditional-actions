<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 10/05/19
 * Time: 21:12
 */

class Tools
{
    /**
     * @param string $media
     * @param string $size
     * @param int $default
     * @param bool $force
     * @return string
     */
    public static function getMediaUrl($media, $size = 'thumbnail', $default = 0, $force = false)
    {
        return pods_image_url($media,$size,$default,$force);
    }


    public static function getCurrentDate($time = 'now' , $timezone = 'Europe/Madrid')
    {
        return new DateTime($time, new DateTimeZone($timezone));
    }

    public static function pastDate($date)
    {
        $date = new DateTime($date);

        if($date < self::getCurrentDate()) {
           return true;
        }

        return false;
    }
}
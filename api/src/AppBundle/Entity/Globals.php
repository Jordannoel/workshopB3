<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 03/10/2017
 * Time: 15:53
 */

namespace AppBundle\Entity;


use Symfony\Component\BrowserKit\Response;

class Globals
{
    public static function errIncorrectPassword($message){
        return \FOS\RestBundle\View\View::create(['error' => $message], 430);
    }
}
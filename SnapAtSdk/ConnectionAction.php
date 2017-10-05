<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 04/10/2017
 * Time: 23:07
 */

namespace SnapAtSdk;


use SnapAtSdk\ClassesMetiers\Commercials;

class ConnectionAction extends Actions
{

    public function __construct($url, $api_key, $modeProduction)
    {
        parent::__construct($url, $api_key, $modeProduction);
        $this->objet = new Commercials();
    }

    public function Post($obj) {
        return parent::Creer($obj);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 04/10/2017
 * Time: 23:56
 */

namespace SnapAtSdk;

use SnapAtSdk\ClassesMetiers\Status;

class StatusAction extends Actions
{
    public function __construct($url, $api_key, $modeProduction)
    {
        parent::__construct($url, $api_key, $modeProduction);
        $this->objet = new Status();
    }

    public function GetAll()
    {
        return parent::GetAll(); // TODO: Change the autogenerated stub
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Loïc Sicaire
 * Date: 29/08/2017
 * Time: 15:17
 */

namespace SnapAtSdk;

use Doctrine\DBAL\Connection;
use Symfony\Component\Routing\Route;

class SnapAt extends Requetes
{

    public $ConnectionAction;
    public $StatusAction;
    public $RequirementsAction;
    public $CustomersAction;

    private $modeProduction;

    const MODE_PROD = true;
    const MODE_TEST = false;
    const MODE_LOCAL = null;

    const URL_PROD = "https://snap-at.000webhostapp.com/api";
    const URL_TEST = "http://localhost/workshopb3/api/web/app_dev.php";
    const URL_LOCAL = "http://localhost/workshopb3/api/web/app_dev.php";

    public function __construct($mode_prod, $api_key)
    {
        $this->modeProduction = $mode_prod;
        if ($this->modeProduction === true)
            $url = SnapAt::URL_PROD;
        elseif ($this->modeProduction === false)
            $url = SnapAt::URL_TEST;
        else
            $url = SnapAt::URL_LOCAL;
        parent::__construct($url, $api_key);
        $this->ConnectionAction = new ConnectionAction($url . Routes::URL_CONNEXION, $api_key, $mode_prod);
        $this->StatusAction = new StatusAction($url . Routes::URL_STATUS, $api_key, $mode_prod);
        $this->RequirementsAction = new RequirementsAction($url . Routes::URL_REQUIREMENTS, $api_key, $mode_prod);
        $this->CustomersAction = new CustomersAction($url . Routes::URL_CUSTOMERS, $api_key, $mode_prod);
    }

    /**
     * @return bool
     */
    public function isModeProduction()
    {
        return $this->modeProduction;
    }
    /**
     * @param bool $modeProduction
     */
    public function setModeProduction($modeProduction)
    {
        $this->modeProduction = $modeProduction;
    }

}


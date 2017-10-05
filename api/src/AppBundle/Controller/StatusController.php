<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Globals;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class StatusController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"status"})
     * @Rest\Get("/status")
     */
    public function getStatusAction(Request $request)
    {
        return $this->getDoctrine()->getRepository("AppBundle:Status")->findAll();
    }

}

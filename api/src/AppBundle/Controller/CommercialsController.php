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

class CommercialsController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"commercials"})
     * @Rest\Post("/connection")
     */
    public function connectAction(Request $request)
    {
        $mail = $request->get("email_adress");
        $password = $request->get("password");
        $user = $this->getDoctrine()->getRepository("AppBundle:Commercials")->findOneBy(array("emailAdress" => $mail));
        if (!$user || empty($user))
            return Globals::errIncorrectPassword("Ces identifiants ne sont pas valide");
        if (password_verify($password, $user->getPassword()))
            return $user;
        else
            return Globals::errIncorrectPassword("Ces identifiants ne sont pas valide");
    }

}

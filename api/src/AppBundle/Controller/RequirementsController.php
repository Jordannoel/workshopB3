<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commercials;
use AppBundle\Entity\Consultants;
use AppBundle\Entity\Globals;
use AppBundle\Entity\KeySuccessFactors;
use AppBundle\Entity\Requirements;
use AppBundle\Form\RequirementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RequirementsController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"requirements"})
     * @Rest\Get("/requirements")
     */
    public function getRequirementsAction(Request $request)
    {
        return $this->getDoctrine()->getRepository("AppBundle:Requirements")->findAll();
    }

    /**
     * @Rest\View(serializerGroups={"requirements"})
     * @Rest\Post("/requirements")
     */
    public function postRequirementsAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $requirement = new Requirements();

        $form = $this->createForm(RequirementsType::class, $requirement);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        // COMMERCIAL
        $commercial = $em->getRepository("AppBundle:Commercials")->find($request->get("commercial"));
        $requirement->setCommercial($commercial);

        // STATUS
        $status = $em->getRepository("AppBundle:Status")->find($request->get("status"));
        $requirement->setStatus($status);

        // CUSTOMER
        $customer = $em->getRepository("AppBundle:Customers")->find($request->get("customer"));
        $requirement->setCustomer($customer);

        /// KEY SUCCESS FACTORS
        $keySuccessFactor1 = new KeySuccessFactors();
        $keySuccessFactor1->setText($request->get("keySuccessFactor1"));
        $em->persist($keySuccessFactor1);
        $em->flush();
        $requirement->addKeySuccessFactorsList($keySuccessFactor1);
        if (!empty($request->get("keySuccessFactor2"))) {
            $keySuccessFactor2 = new KeySuccessFactors();
            $keySuccessFactor2->setText($request->get("keySuccessFactor2"));
            $em->persist($keySuccessFactor2);
            $em->flush();
            $requirement->addKeySuccessFactorsList($keySuccessFactor2);
        }
        if (!empty($request->get("keySuccessFactor3"))) {
            $keySuccessFactor3 = new KeySuccessFactors();
            $keySuccessFactor3->setText($request->get("keySuccessFactor3"));
            $em->persist($keySuccessFactor3);
            $em->flush();
            $requirement->addKeySuccessFactorsList($keySuccessFactor3);
        }

        // CONSULTANTS
        $consultant1 = new Consultants();
        $consultant1->setName($request->get("consultant1"));
        $em->persist($consultant1);
        $em->flush();
        $requirement->addConsultantsList($consultant1);
        if (!empty($request->get("consultant2"))){
            $consultant2 = new Consultants();
            $consultant2->setName($request->get("consultant2"));
            $em->persist($consultant2);
            $em->flush();
            $requirement->addConsultantsList($consultant2);
        }
        if (!empty($request->get("consultant3"))){
            $consultant3 = new Consultants();
            $consultant3->setName($request->get("consultant3"));
            $em->persist($consultant3);
            $em->flush();
            $requirement->addConsultantsList($consultant3);
        }
        if (!empty($request->get("consultant4"))){
            $consultant4 = new Consultants();
            $consultant4->setName($request->get("consultant4"));
            $em->persist($consultant4);
            $em->flush();
            $requirement->addConsultantsList($consultant4);
        }
        if (!empty($request->get("consultant5"))){
            $consultant5 = new Consultants();
            $consultant5->setName($request->get("consultant5"));
            $em->persist($consultant5);
            $em->flush();
            $requirement->addConsultantsList($consultant5);
        }

        $requirement->setPostDate(new \DateTime());
        $requirement->setStartDate(new \DateTime($request->get("startDate")));
        $requirement->setContactName($request->get("contactName"));
        $requirement->setTitle($request->get("title"));
        $requirement->setFullDescription($request->get("fullDescription"));
        $requirement->setDayByWeek($request->get("dayByWeek"));
        $requirement->setNbOfMonth($request->get("nbOfMonth"));
        $requirement->setLocation($request->get("location"));
        $requirement->setRate($request->get("rate"));
        if (!empty($request->get("shareTo")))
            $requirement->setShareTo($request->get("shareTo"));

        $em->persist($requirement);
        $em->flush();

        //$file = new File($request->files->get);
        //$file = ;
        
        return $requirement;

    }

    /**
     * @Rest\View()
     * @Rest\Delete("/requirements/{id}")
     */
    public function deleteRequirementsAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $requirement = $em->getRepository("AppBundle:Requirements")->find($request->get("id"));
        if ($requirement) {
            $em->remove($requirement);
            $em->flush();
        }
    }

}

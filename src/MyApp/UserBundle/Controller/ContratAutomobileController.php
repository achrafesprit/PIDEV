<?php
/**
 * Created by PhpStorm.
 * User: Chourouk
 * Date: 2/22/2019
 * Time: 10:26 PM
 */

namespace MyApp\UserBundle\Controller;

use MyApp\UserBundle\Entity\User;
use MyApp\UserBundle\Entity\ContratAutomobile;
use MyApp\UserBundle\Form\ContratAutomobileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContratAutomobileController extends Controller
{
    public function AjoutCAAction(Request $request)
    {
        $ContratAutomobile = new ContratAutomobile();
        $ContratAutomobile->setEtat(0);
        $form = $this->createForm(ContratAutomobileType::class, $ContratAutomobile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $ContratAutomobile->setUser($user);
            $ContratAutomobile->uploadProfilePicture();
            $em = $this->getDoctrine()->getManager();
            $em->persist($ContratAutomobile);
            $em->flush();

            return $this->redirectToRoute("lister_ContratAuto");
        }

        return $this->render("MyAppUserBundle:ContratAutomobile:AjoutCA.html.twig", array("Form" => $form->createView()));
    }
    public function listCAAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $ContratAutomobile = $em->getRepository("MyAppUserBundle:ContratAutomobile")->findBy(array('user'=>$user));


        return $this->render("MyAppUserBundle:ContratAutomobile:listCA.html.twig", ["ContratAutomobile" => $ContratAutomobile]);
    }
    public function supprimerCAAction(Request $request)
    {
        $idcontratautomobile = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $ContratAutomobile = $em->getRepository("MyAppUserBundle:ContratAutomobile")->find($idcontratautomobile);
        $em->remove($ContratAutomobile);
        $em->flush();

        return $this->redirectToRoute("lister_ContratAuto");
    }


    public function modifierCAAction(Request $request)
    {
        $idcontratautomobile = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $ContratAutomobile = $em->getRepository("MyAppUserBundle:ContratAutomobile")->find($idcontratautomobile);
        $form = $this->createForm(ContratAutomobileType::class, $ContratAutomobile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $ContratAutomobile->setUser($user);
            $em->persist($ContratAutomobile);
            $em->flush();
            return $this->redirectToRoute("lister_ContratAuto");
        }

        return $this->render("MyAppUserBundle:ContratAutomobile:modifierCA.html.twig", array("Form" => $form->createView()));
    }
    public function modifierCAdAction(Request $request)
    {
        $idcontratautomobile = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $ContratAutomobile = $em->getRepository("MyAppUserBundle:ContratAutomobile")->find($idcontratautomobile);
        $form = $this->createForm(ContratAutomobileType::class, $ContratAutomobile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $ContratAutomobile->setUser($user);
            $em->persist($ContratAutomobile);
            $em->flush();
            return $this->redirectToRoute("lister_ContratAuto");
        }

        return $this->render("MyAppUserBundle:ContratAutomobile:modifierCA.html.twig", array("Form" => $form->createView()));
    }
    public function afficherIAction(Request $request)
    {
        $id = $request->get("id");


        return $this->render("MyAppUserBundle:ContratAutomobile:afficherI.html.twig", ["id" => $id]);
    }
    public function listTCAAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ContratAutomobile = $em->getRepository("MyAppUserBundle:ContratAutomobile")->findAll();


        return $this->render("MyAppUserBundle:ContratAutomobile:listTCA.html.twig", ["ContratAutomobile" => $ContratAutomobile]);
    }
}
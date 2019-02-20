<?php
/**
 * Created by PhpStorm.
 * User: rami
 * Date: 15/02/2019
 * Time: 11:20
 */

namespace MyApp\UserBundle\Controller;


use MyApp\UserBundle\Entity\SinistreAutomobile;
use MyApp\UserBundle\Form\SinistreAutomobileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SinistreAutomobileController  extends Controller
{
    public function ajouterSAAction(Request $request)
    {
        $SinistreAutomobile = new SinistreAutomobile();


        $form = $this->createForm(SinistreAutomobileType::class, $SinistreAutomobile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $SinistreAutomobile->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $SinistreAutomobile->uploadProfilePicture();
            $em->persist($SinistreAutomobile);
            $em->flush();

            return $this->redirectToRoute("Afficher_sinistreautomobile");
        }

        return $this->render("MyAppUserBundle:SinistreAutomobile:ajouterSA.html.twig", array("Form" => $form->createView()));
    }

    public function listSAAction()
    {
        $em = $this->getDoctrine()->getManager();
        $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->findAll();


        return $this->render("MyAppUserBundle:SinistreAutomobile:listSA.html.twig", ["SinistreAutomobile" => $SinistreAutomobile]);
    }

    public function supprimerSAAction(Request $request)
    {
        $idautomobile = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->find($idautomobile);
        $em->remove($SinistreAutomobile);
        $em->flush();

        return $this->redirectToRoute("Afficher_sinistreautomobile");
    }

    public function modifierSAAction(Request $request)
    {
        $idautomobile = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->find($idautomobile);
        $form = $this->createForm(SinistreAutomobileType::class, $SinistreAutomobile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $SinistreAutomobile->setUser($user);
            $em->persist($SinistreAutomobile);
            $em->flush();
            return $this->redirectToRoute("Afficher_sinistreautomobile");
        }

        return $this->render("MyAppUserBundle:SinistreAutomobile:modifierSA.html.twig", array("Form" => $form->createView()));
    }

    public function rechercherSAAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->findAll();

        if ($request->isMethod("POST")) {
            $cout = $request->get("cout");



            $em = $this->getDoctrine()->getManager();
            $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->findBy(array("cout " => $cout));
            return $this->render("MyAppUserBundle:SinistreAutomobile:rechercherSA.html.twig", ["SinistreAutomobile" => $SinistreAutomobile]);
        }

        return $this->render("MyAppUserBundle:SinistreAutomobile:rechercherSA.html.twig", ["SinistreAutomobile" => $SinistreAutomobile]);

    }
    public function afficherCAction(Request $request)
    {
        $id = $request->get("id");


        return $this->render("MyAppUserBundle:SinistreAutomobile:afficherC.html.twig", ["id" => $id]);
    }

}

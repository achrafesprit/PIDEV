<?php
/**
 * Created by PhpStorm.
 * User: rami
 * Date: 16/02/2019
 * Time: 22:12
 */

namespace MyApp\UserBundle\Controller;

use MyApp\UserBundle\Entity\DossierSinistreAutomobile;
use MyApp\UserBundle\Form\DossierSinistreAutomobileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DossierSinistreAutomobileController extends Controller
{
    public function ajouterDSAAction(Request $request)
    {
        $DossierSinistreAutomobile = new DossierSinistreAutomobile();


        $form = $this->createForm(DossierSinistreAutomobileType::class, $DossierSinistreAutomobile);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $DossierSinistreAutomobile->setUser($user);

/*
            $em1 = $this->getDoctrine()->getManager();
            $contrat = $em1->getRepository("MyAppUserBundle:ContratAutomobile")->findBy($user->id);
            $DossierSinistreAutomobile->setContratAutomobile($contrat);
*/
            $em= $this->getDoctrine()->getManager();
            $em->persist($DossierSinistreAutomobile);
            $em->flush();

            return $this->redirectToRoute("Afficher_Dossiersinistreautomobile");
        }

        return $this->render("MyAppUserBundle:DossierSinistreAutomobile:ajouterDSA.html.twig",array("Form"=>$form->createView()));
    }
    public function listDSAAction()
    {
        $em = $this->getDoctrine()->getManager();
        $DossierSinistreAutomobile = $em->getRepository("MyAppUserBundle:DossierSinistreAutomobile")->findAll();


        return $this->render("MyAppUserBundle:DossierSinistreAutomobile:listDSA.html.twig",["DossierSinistreAutomobile"=> $DossierSinistreAutomobile]);
    }

    public function supprimerDSAAction(Request $request)
    {
        $idDossierSinistreAutomobile = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $DossierSinistreAutomobile = $em->getRepository("MyAppUserBundle:DossierSinistreAutomobile")->find($idDossierSinistreAutomobile);
        $em->remove($DossierSinistreAutomobile);
        $em->flush();

        return $this->redirectToRoute("Afficher_Dossiersinistreautomobile");
    }
    public function modifierDSAAction(Request $request)
    {
        $idDossierSinistreAutomobile = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $DossierSinistreAutomobile = $em->getRepository("MyAppUserBundle:DossierSinistreAutomobile")->find($idDossierSinistreAutomobile    );
        $form = $this->createForm(DossierSinistreAutomobileType::class,$DossierSinistreAutomobile);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $DossierSinistreAutomobile->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($DossierSinistreAutomobile);
            $em->flush();
            return $this->redirectToRoute("Afficher_Dossiersinistreautomobile");
        }

        return $this->render("MyAppUserBundle:DossierSinistreAutomobile:modifierDSA.html.twig",array("Form"=>$form->createView()));
    }
    public function rechercherDSAAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $DossierSinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->findAll();

        if($request->isMethod("post")) {
            $moteur = $request->get("moteur");
            $remarquage = $request->get("remarquage");
            $em = $this->getDoctrine()->getManager();
            $DossierSinistreAutomobile = $em->getRepository("ParcBundle:Voiture")->findBy(array("moteur"=>$moteur , "remarquage"=>$remarquage));
            return $this->render("MyAppUserBundle:DossierSinistreAutomobile:rechercherDSA.html.twig", ["DossierSinistreAutomobile" => $DossierSinistreAutomobile]);
        }

        return $this->render("MyAppUserBundle:DossierSinistreAutomobile:rechercherDSA.html.twig", ["DossierSinistreAutomobile" => $DossierSinistreAutomobile]);

    }
}
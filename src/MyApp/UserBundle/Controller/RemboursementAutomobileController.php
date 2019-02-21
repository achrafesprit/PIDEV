<?php
/**
 * Created by PhpStorm.
 * User: rami
 * Date: 17/02/2019
 * Time: 11:04
 */

namespace MyApp\UserBundle\Controller;


use MyApp\UserBundle\Entity\ArchiveTresorerie;
use MyApp\UserBundle\Entity\RemboursementAutomobile;
use MyApp\UserBundle\Entity\Tresorerie;
use MyApp\UserBundle\Form\RemboursementAutomobileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RemboursementAutomobileController extends Controller
{

    function ajouterRAAction(Request $request)
    {
        $RemboursementAutomobile = new RemboursementAutomobile();
        $em = $this->getDoctrine()->getManager();
        $idautomobile = $request->get("id");
        $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->find($idautomobile);
        $RemboursementAutomobile->setSinistreautomobile($SinistreAutomobile);
        $RemboursementAutomobile->setUser($SinistreAutomobile->getUser());
        $RemboursementAutomobile->setEtat("Non Remboursé");
        $RemboursementAutomobile->setRemboursementfinal(0);
        $form = $this->createForm(RemboursementAutomobileType::class, $RemboursementAutomobile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em1 = $this->getDoctrine()->getManager();
            $em1->persist($RemboursementAutomobile);
            $em1->flush();

            return $this->redirectToRoute("homea");
        }

        return $this->render("MyAppUserBundle:RemboursementAutomobile:ajouterRA.html.twig", array("Form" => $form->createView()));
    }
        public function listRAAction()
        {
            $em = $this->getDoctrine()->getManager();
            $RemboursementAutomobile = $em->getRepository("MyAppUserBundle:RemboursementAutomobile")->findAll();


            return $this->render("MyAppUserBundle:RemboursementAutomobile:listRA.html.twig", ["RemboursementAutomobile" => $RemboursementAutomobile]);
        }
    public function modifierRAAction(Request $request)
    {
        $idremboursment = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $RemboursementAutomobile = $em->getRepository("MyAppUserBundle:RemboursementAutomobile")->find($idremboursment);
        $form = $this->createForm(RemboursementAutomobileType::class,$RemboursementAutomobile);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($RemboursementAutomobile);
            $em->flush();
            return $this->redirectToRoute("Afficher_Remboursement");
        }

        return $this->render("MyAppUserBundle:RemboursementAutomobile:modifierRA.html.twig",array("Form"=>$form->createView()));
    }
    public function supprimerRAAction(Request $request)
    {
        $idremboursment = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $RemboursementAutomobile = $em->getRepository("MyAppUserBundle:RemboursementAutomobile")->find($idremboursment);
        $em->remove($RemboursementAutomobile);
        $em->flush();

        return $this->redirectToRoute("Afficher_Remboursement");
    }
    public function listRAAAction()
    {
        $em = $this->getDoctrine()->getManager();
        $RemboursementAutomobile = $em->getRepository("MyAppUserBundle:RemboursementAutomobile")->findBy(array('etat'=>"Non Remboursé"));
        return $this->render("MyAppUserBundle:RemboursementAutomobile:listRAA.html.twig", ["RemboursementAutomobile" => $RemboursementAutomobile]);
    }
    public function  rembourserRAAction(Request $request){
        $idremboursment = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $RemboursementAutomobile = $em->getRepository("MyAppUserBundle:RemboursementAutomobile")->find($idremboursment);
        $RemboursementAutomobile->setEtat("Remboursé");
        $em = $this->getDoctrine()->getManager();
        $em->persist($RemboursementAutomobile);
        $em->flush();


        $ArchiveTresorerie=new ArchiveTresorerie();
        $ArchiveTresorerie->setMontant($RemboursementAutomobile-> getRemboursementfinal());
        $ArchiveTresorerie->setUser($RemboursementAutomobile-> getUser());
        $ArchiveTresorerie->setType("Remboursement");
        $em = $this->getDoctrine()->getManager();
        $em->persist($ArchiveTresorerie);
        $em->flush();

        $Tresorerie= $em->getRepository("MyAppUserBundle:Tresorerie")->find(1);
        $Tresorerie->setMontant($Tresorerie->getMontant()-$RemboursementAutomobile-> getRemboursementfinal());
        $em = $this->getDoctrine()->getManager();
        $em->persist($Tresorerie);
        $em->flush();

        $em = $this->getDoctrine()->getManager();
        $RemboursementAutomobile = $em->getRepository("MyAppUserBundle:RemboursementAutomobile")->findBy(array('etat'=>"Remboursé"));
        return $this->render("MyAppUserBundle:RemboursementAutomobile:listRE.html.twig",["RemboursementAutomobile" => $RemboursementAutomobile]);
    }
    public function listREAction()
    {
        $em = $this->getDoctrine()->getManager();
        $RemboursementAutomobile = $em->getRepository("MyAppUserBundle:RemboursementAutomobile")->findBy(array('etat'=>"Remboursé"));
        return $this->render("MyAppUserBundle:RemboursementAutomobile:listRE.html.twig", ["RemboursementAutomobile" => $RemboursementAutomobile]);
    }




    }








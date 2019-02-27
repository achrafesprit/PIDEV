<?php

namespace MyApp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use MyApp\UserBundle\Entity\User;
use MyApp\UserBundle\Entity\Tresorerie;


class SecurityController extends Controller
{
    public function redirectAction()
    {
        return $this->render('MyAppUserBundle:Security:index.html.twig');
    }
    // achraf
    public function NotifierAlMin(){

        $notifmin=0;
        $em = $this->getDoctrine()->getManager();
        $Tresorerie= $em->getRepository("MyAppUserBundle:Tresorerie")->find(1);
        if($Tresorerie->getMontant()<=2000){
            $notifmin=1;
        }
        return $notifmin;
    }
    public function NotiferRmb(){

        $em=$this->getDoctrine()->getManager();
        $nbr=$em->getRepository("MyAppUserBundle:RemboursementAutomobile")->findBy
        (array('etat'=>"Non Remboursé"
        ));
        $nbr1=0;
        foreach ($nbr as $nbr2){
            $nbr1=$nbr1+1;
        }
        return $nbr1;

    }
    public function NotiferRmbImp(){

        $em=$this->getDoctrine()->getManager();
        $RA=$em->getRepository("MyAppUserBundle:RemboursementAutomobile")->findBy
        (array('etat'=>"Non Remboursé"
        ));
        $em = $this->getDoctrine()->getManager();
        $Tresorerie= $em->getRepository("MyAppUserBundle:Tresorerie")->find(1);
        $montant=$Tresorerie->getMontant();

        $somme=0;
        foreach ($RA as $RA1){
            $somme=$somme+$RA1->getRemboursementfinal();

        }
        return $montant-$somme;

    }

    //

    public function agentAction()
    {
        $notifier=0;
        $NotiferRmb=$this->NotiferRmb();


        $notifierRmbImp=$this->NotiferRmbImp();
        $notifAlerte=0;
        $notifMin=$this->NotifierAlMin();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $nom=$user->getNom();
        $prenom=$user->getPrenom();
        $notifAlerte=$notifAlerte+$notifMin;
        if  ($notifierRmbImp<0){
            $notifAlerte=$notifAlerte+1;
            //$notifierRmbImp=-$notifierRmbImp;
        }
        $notifier=$notifier+$NotiferRmb;
        return $this->render('MyAppUserBundle:Security:indexadmin.html.twig', array(
            "nom" => $nom ,"prenom" => $prenom,"notifmin"=>$notifMin,"notifalerte"=>$notifAlerte,"notifierRmbImp"=>$notifierRmbImp,"NotiferRmb"=>$NotiferRmb
        ,"notifier"=>$notifier));
    }





}
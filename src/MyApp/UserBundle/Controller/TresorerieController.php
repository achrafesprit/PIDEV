<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18/02/2019
 * Time: 23:41
 */

namespace MyApp\UserBundle\Controller;


use MyApp\UserBundle\Entity\ContratAutomobile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MyApp\UserBundle\Entity\Tresorerie;
use MyApp\UserBundle\Entity\TresorerieRepository;

class TresorerieController extends Controller
{

    public function listARAction(){

        $em = $this->getDoctrine()->getManager();
        $ArchiveTresorerie = $em->getRepository("MyAppUserBundle:ArchiveTresorerie")->findAll();


        return $this->render("MyAppUserBundle:Tresorerie:listAR.html.twig", ["ArchiveTresorerie" => $ArchiveTresorerie]);
    }
    public function listTRAction(){

        $em = $this->getDoctrine()->getManager();
        $Tresorerie = $em->getRepository("MyAppUserBundle:Tresorerie")->findAll();


        return $this->render("MyAppUserBundle:Tresorerie:listTR.html.twig", ["Tresorerie" => $Tresorerie]);
    }




    public function NotifierMin(Request $request){

        $notifmin=0;
        $em = $this->getDoctrine()->getManager();
        $Tresorerie= $em->getRepository("MyAppUserBundle:Tresorerie")->find(1);
        if($Tresorerie->getMontant()<=2000){
            $notifmin=1;
        }
        return $notifmin;
    }

    public function NotifierContrats(Request $request){

        $notif=0;
        $em = $this->getDoctrine()->getManager();
        $Contrats= $em->getRepository("MyAppUserBundle:ContratAutomobile")->findContratPrevus();
        foreach($Contrats as $Contrat){

                if ($Contrat->getTypecontratAuto()=="Standard"){
                    $notif=$notif+1000;
                }
            if ($Contrat->getTypecontratAuto()=="Tout Risque"){
                $notif=$notif+2000;
            }
        }

        return $notif;
    }
    public function listPPAction()
    {

        $em = $this->getDoctrine()->getManager();
        $Contrats= $em->getRepository("MyAppUserBundle:ContratAutomobile")->findContratPrevus();
        return $this->render("MyAppUserBundle:Tresorerie:listPP.html.twig", ["Contrats" => $Contrats]);

    }





}
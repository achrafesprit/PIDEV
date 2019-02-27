<?php
/**
 * Created by PhpStorm.
 * User: Chourouk
 * Date: 2/21/2019
 * Time: 9:31 PM
 */

namespace MyApp\UserBundle\Controller;



use MyApp\UserBundle\Entity\User;

use MyApp\UserBundle\Entity\ContratSante;
use MyApp\UserBundle\Form\ContratSanteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContratSanteController extends Controller
{
    public function AjoutCSAction(Request $request)
    {
        $ContratSante = new ContratSante();
        $ContratSante->setEtat(1);

        $form = $this->createForm(ContratSanteType::class, $ContratSante);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $ContratSante->setUser($user);
            $ContratSante->uploadProfilePicture();
            $em = $this->getDoctrine()->getManager();
            $em->persist($ContratSante);
            $em->flush();

            return $this->redirectToRoute("lister_ContratSante");
        }

        return $this->render("MyAppUserBundle:ContratSante:AjoutCS.html.twig", array("form" => $form->createView()));
    }
    public function listCSAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->findBy(array('user'=>$user,'etat'=>1));


        return $this->render("MyAppUserBundle:ContratSante:listCS.html.twig", ["ContratSante" => $ContratSante]);
    }

   public function listTCSAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->findAll();


        return $this->render("MyAppUserBundle:ContratSante:listTCS.html.twig", ["ContratSante" => $ContratSante]);
    }





    public function supprimerCSAction(Request $request)
    {
        $idContratSante = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->find($idContratSante);
        $em->remove($ContratSante);
        $em->flush();

        return $this->redirectToRoute("lister_ContratSante");
    }

    public function modifierCSAction(Request $request)
    {
        $idContratS = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->find($idContratS);
        $form = $this->createForm(ContratSanteType::class, $ContratSante);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $ContratSante->setUser($user);
            $em->persist($ContratSante);
            $em->flush();
            return $this->redirectToRoute("lister_ContratSante");
        }

        return $this->render("MyAppUserBundle:ContratSante:modifierCS.html.twig", array("Form" => $form->createView()));
    }

    public function modifierCSAdAction(Request $request)
    {
        $idContratS = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->find($idContratS);
        $form = $this->createForm(ContratSanteType::class, $ContratSante);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $ContratSante->setUser($user);
            $em->persist($ContratSante);
            $em->flush();
            return $this->redirectToRoute("lister_ContratSante");
        }

        return $this->render("MyAppUserBundle:ContratSante:modifierCSAd.html.twig", array("Form" => $form->createView()));
    }
    public function afficherIAction(Request $request)
    {
        $id = $request->get("id");


        return $this->render("MyAppUserBundle:ContratSante:afficherI.html.twig", ["id" => $id]);
    }
    public function  refuserAction(Request $request){


        $id = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->find($id);
        $ContratSante->setEtat(0);
        $em->persist($ContratSante);
        $em->flush();


        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->findAll();


        return $this->render("MyAppUserBundle:ContratSante:listTCS.html.twig", ["ContratSante" => $ContratSante]);

    }

    public function approuverAction(Request $request){
        $id = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->find($id);
        $ContratSante->setEtat(1);
        $em->persist($ContratSante);
        $em->flush();




        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->findAll();


        return $this->render("MyAppUserBundle:ContratSante:listTCS.html.twig", ["ContratSante" => $ContratSante]);

    }

    public function listResilSAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->findBy(array('etat'=>0));

        return $this->render("MyAppUserBundle:ContratSante:listResilS.html.twig", ["ContratSante" => $ContratSante]);


    }
    public function supprimerRCSAction(Request $request)
    {
        $idContratSante = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->find($idContratSante);
        $em->remove($ContratSante);
        $em->flush();

        return $this->redirectToRoute('listertoutContratSanteResil');
    }


    public function GenererCAction(Request $request)
    {              $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $snappy = $this->get('knp_snappy.pdf');
        $idContratSante = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $ContratSante = $em->getRepository("MyAppUserBundle:ContratSante")->find($idContratSante);
        $type=$ContratSante->getTypeA();
        $Couverture=$ContratSante->getCouvertureAssurance();

//$sante=$this->getDoctrine()->getRepository(MyAppUserBundle::ContratSante)->findAll()
        $html = $this->renderView('MyAppUserBundle:ContratSante:GenererC.html.twig', array(
            'user'=>$user->getUsername(),'type'=>$type,'idContratSante'=>$idContratSante,'Couverture'=>$Couverture,

          //  'ContratSante'=>$sante,
            'title' => 'Assurance Maladie'

        ));

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(

                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }

    public  function rechercheAction(Request $request){


        $type=$request->get('type');

        $em = $this->getDoctrine()->getManager();
        $ContratSante=$em->getRepository('MyappUserBundle:ContratSante')->rechercheAvance($type);
        $result = array();
        foreach($ContratSante as $ContratSante){


            $result[]=array(
                'id'=>$ContratSante->getId(),
                'titre'=> $ContratSante->getTitre(),
                'prix'=> $ContratSante->getPrix(),
                'date'=> $ContratSante->getDispoAPartir()->format('Y-m-d'),

            );
        }

        $json = json_encode($result);
        $response = new Response($json, 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }




}
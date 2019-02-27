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
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;


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
            $SinistreAutomobile->uploadProfilePicture();
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
            $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->findBy(array('cout' => $cout));
            return $this->render("MyAppUserBundle:SinistreAutomobile:rechercherSA.html.twig", ["SinistreAutomobile" => $SinistreAutomobile]);
        }

        return $this->render("MyAppUserBundle:SinistreAutomobile:rechercherSA.html.twig", ["SinistreAutomobile" => $SinistreAutomobile]);

    }
    public function afficherCAction(Request $request)
    {
        $id = $request->get("id");


        return $this->render("MyAppUserBundle:SinistreAutomobile:afficherC.html.twig", ["id" => $id]);
    }

    public function localiserAction(Request $request){
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $em = $this->getDoctrine()->getManager();
        $id = $request->get("id");
        $latLng = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->findByidautomobile($id);
        $response = $serializer->serialize($latLng, 'json');

        return $this->render('MyAppUserBundle:SinistreAutomobile:localiser.html.twig', array("locations" => $response));
    }





    public function MailACtion(request $request)
    {
        $form = $this->createFormBuilder()

            ->add('subject',TextareaType::class)
            ->add('to',EmailType::class)

            ->add('send',SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){

            $data=$form->getData();


            dump($data);
            $message=\Swift_Message::newInstance()
                ->setSubject('de la part de assurance rami')
                ->setFrom('rami.cherif@esprit.com')
                ->setTo($data['to'])
                ->setBody(
                    $form->getData()['subject'],'text/plain'
                );
            $this->get('mailer')->send($message);
        }

        return $this->render('MyAppUserBundle:SinistreAutomobile:Mail.html.twig',['form'=>$form->createView()]);

    }


    public function AjaxAmesterdamAction($cout)
    {
        $em = $this->getDoctrine()->getManager();
        $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->FindByLetters($cout);
        $s = new Serializer(array(new ObjectNormalizer()));
        $SinistreAutomobile = $s->normalize($SinistreAutomobile, 'json');
        $response = new JsonResponse();
        return $response->setData(array('p' => $SinistreAutomobile));
    }

    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestString = $request->get('q');
        $entities =  $em->getRepository("MyAppUserBundle:SinistreAutomobile")->findByNom($requestString);
        if(!$entities) {
            $result['entities']['error'] = "there is no challenge with this name";
        } else {
            $result['entities'] = $this->getRealEntities($entities);
        }
        return new Response(json_encode($result));

    }



    public function getRealEntities($entities){
        foreach ($entities as $entity){
            $realEntities[$entity->getId()] = [$entity->getNom(), $entity->getDescription(), $entity->getDate(), $entity->getImageFile(),$entity->getEmail(),$entity->getPhone(),$entity->getSpecialite()];
        }
        return $realEntities;
    }
    public function listSAUAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $SinistreAutomobile = $em->getRepository("MyAppUserBundle:SinistreAutomobile")->findBy(array('user'=>$user));



        return $this->render("MyAppUserBundle:SinistreAutomobile:listSAU.html.twig", ["SinistreAutomobile" => $SinistreAutomobile]);
    }


}

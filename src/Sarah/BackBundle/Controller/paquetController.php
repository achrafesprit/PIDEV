<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 2/22/2019
 * Time: 12:40 PM
 */

namespace Sarah\BackBundle\Controller;



use Sarah\BackBundle\Entity\paquet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class paquetController extends Controller
{
    /**
     * Lists all paquet entities.
     *
     */
    public function viewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paquets = $em->getRepository('SarahBackBundle:paquet')->findAll();

        return $this->render('SarahBackBundle:paquet:view.html.twig', array(
            'paquets' => $paquets,
        ));
    }
    public function viewwAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paquets = $em->getRepository('SarahBackBundle:paquet')->findAll();

        return $this->render('SarahBackBundle:paquet:vieww.html.twig', array(
            'paquets' => $paquets,
        ));
    }

    public function chooseAction()
    {

        return $this->render('SarahBackBundle:paquet:choosetypes.html.twig');
    }

    public function newAction(Request $request)
    {
        $inputValue = $request->get("typevie");

        $paquet = new Paquet();
        $form = $this->createForm('Sarah\BackBundle\Form\paquetType', $paquet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paquet);
            $em->flush();

            return $this->redirectToRoute('sarah_back_paquet_view');
        }

        return $this->render('SarahBackBundle:paquet:ajout.html.twig', array(
            'paquet' => $paquet,
            'input' =>$inputValue,
            'form' => $form->createView(),

        ));
    }


    public function showAction(paquet $paquet)
    {
        $deleteForm = $this->createDeleteForm($paquet);

        return $this->render('SarahBackBundle:paquet:show.html.twig', array(
            'paquet' => $paquet,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function editAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $paquet=$em->getRepository("SarahBackBundle:paquet")->find($id);
        $editForm = $this->createForm('Sarah\BackBundle\Form\paquetType', $paquet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sarah_back_promotion_view');
        }

        return $this->render('SarahBackBundle:paquet:modifier.html.twig', array(
            'paquet' => $paquet,
            'edit_form' => $editForm->createView(),
        ));
    }


    public function deleteAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $paquet=$em->getRepository("SarahBackBundle:paquet")->find($id);
        $em->remove($paquet);
        $em->flush();

        return $this->redirectToRoute('sarah_back_paquet_view');
    }
    public function choisirAction(Request $request)
    {
        $id = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $paquet = $em->getRepository("SarahBackBundle:paquet")->find($id);
        $paquet->setNombre($paquet->getNombre() + 1);
        $em->persist($paquet);
        $em->flush();
        return $this->render('SarahBackBundle:paquet:choisir.html.twig', array('paquet' => $paquet));
    }


    }
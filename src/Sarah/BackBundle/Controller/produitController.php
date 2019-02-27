<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 2/22/2019
 * Time: 12:40 PM
 */

namespace Sarah\BackBundle\Controller;


use Sarah\BackBundle\Entity\produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class produitController extends Controller
{

    public function viewAction()
    {

        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('SarahBackBundle:produit')->findAll();

        return $this->render('SarahBackBundle:produit:view.html.twig', array(
            'produits' => $produits,
        ));
    }


    public function newAction(Request $request)
    {
        $produit = new Produit();
        $form = $this->createForm('Sarah\BackBundle\Form\produitType', $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);

            $em->flush();
            $em->clear();

            return $this->redirectToRoute('sarah_back_produit_view');
        }

        return $this->render('SarahBackBundle:produit:ajout.html.twig', array(
            'produit' => $produit,
            'form' => $form->createView(),
        ));
    }


    public function showAction(produit $produit)
    {
        $deleteForm = $this->createDeleteForm($produit);

        return $this->render('produit:show.html.twig', array(
            'produit' => $produit,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function deleteAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository("SarahBackBundle:produit")->find($id);
        $promotion = $em->getRepository('SarahBackBundle:promotion')->findOneBy(array('produit'=>$produit));
        if ($promotion==null)
        {
        $em->remove($produit);
        $em->flush();
        return $this->redirectToRoute('sarah_back_produit_view');}
        return $this->redirectToRoute('sarah_back_produit_view');}



}
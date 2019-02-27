<?php
/**
 * Created by PhpStorm.
 * User: sarra
 * Date: 2/22/2019
 * Time: 12:40 PM
 */

namespace Sarah\BackBundle\Controller;


use Sarah\BackBundle\Entity\promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class promotionController extends Controller
{

    public function viewAction()
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SarahBackBundle:promotion');
        $listePromotions=$repository->FindPromotionsExpirired();
        foreach ($listePromotions as $promotion)
        {
            $produit=$em->getRepository("SarahBackBundle:produit")->find($promotion->getProduit()->getId());
            $promotion->setEtat("fini");
            $produit->setPromotion(0);
            $em->flush();
        }
        $Updatedpromotions = $em->getRepository('SarahBackBundle:promotion')->findAll();

        return $this->render('SarahBackBundle:promotion:view.html.twig', array(
            'promotions' => $Updatedpromotions,
        ));
    }
    public function afficherAction()
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SarahBackBundle:promotion');
        $listePromotions=$repository->FindPromotionsExpirired();
        foreach ($listePromotions as $promotion)
        {
            $produit=$em->getRepository("SarahBackBundle:produit")->find($promotion->getProduit()->getId());
            $promotion->setEtat("fini");
            $produit->setPromotion(0);
            $em->flush();
        }
        $Updatedpromotions = $em->getRepository('SarahBackBundle:promotion')->findAll();

        return $this->render('SarahBackBundle:promotion:afficher.html.twig', array(
            'promotions' => $Updatedpromotions,
        ));
    }



    public function newAction(Request $request)
    {
        $promotion = new Promotion();
        $promotion->setEtat("en cours");
        $form = $this->createForm('Sarah\BackBundle\Form\promotionType', $promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $promotion->uploadProfilePicture();

            $em->persist($promotion);

            $em->flush();
            $em->clear();
            $produit=$em->getRepository("SarahBackBundle:produit")->find($promotion->getProduit()->getId());
            $produit->setPromotion(1);
            $em->flush();
            return $this->redirectToRoute('sarah_back_promotion_view');
        }

        return $this->render('SarahBackBundle:promotion:ajout.html.twig', array(
            'promotion' => $promotion,
            'form' => $form->createView(),
        ));
    }


    public function showAction(promotion $promotion)
    {
        $deleteForm = $this->createDeleteForm($promotion);

        return $this->render('promotion:show.html.twig', array(
            'promotion' => $promotion,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function editAction(\Symfony\Component\HttpFoundation\Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $promotion=$em->getRepository("SarahBackBundle:promotion")->find($id);
        $editForm = $this->createForm('Sarah\BackBundle\Form\promotionType', $promotion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sarah_back_promotion_view');
        }

        return $this->render('SarahBackBundle:promotion:modifier.html.twig', array(
            'promotion' => $promotion,
            'edit_form' => $editForm->createView(),
        ));
    }


    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $promotion=$em->getRepository("SarahBackBundle:promotion")->find($id);
        $produit=$em->getRepository("SarahBackBundle:produit")->find($promotion->getProduit()->getId());
        $produit->setPromotion(0);
        $em->remove($promotion);
        $em->flush();
        return $this->redirectToRoute('sarah_back_promotion_view');
    }

    public function choisirAction(Request $request){
        $id = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $promotion = $em->getRepository("SarahBackBundle:promotion")->find($id);
        $promotion->setNombre($promotion->getNombre()+1);
        $em->persist($promotion);
        $em->flush();
        return $this->render('SarahBackBundle:promotion:choisir.html.twig',array('promotion'=>$promotion));


    }
}
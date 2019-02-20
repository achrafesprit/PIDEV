<?php

namespace MyApp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use MyApp\UserBundle\Entity\User;

class SecurityController extends Controller
{
    public function redirectAction()
    {
        return $this->render('MyAppUserBundle:Security:index.html.twig');
    }
    public function agentAction()
    {
        $id=$this->getUser();
        return $this->render('MyAppUserBundle:Security:indexadmin.html.twig', array(
            "id" => $id));
    }





}
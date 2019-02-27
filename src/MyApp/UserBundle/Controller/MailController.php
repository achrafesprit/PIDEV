<?php
/**
 * Created by PhpStorm.
 * User: Slim sl
 * Date: 18/02/2018
 * Time: 23:23
 */

namespace MyApp\UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class MailController extends Controller
{



    public function MaileACtion(request $request)
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
                ->setSubject('de la part de vini vidi vici')
                ->setFrom('rami.cherif@esprit.com')
                ->setTo($data['to'])
                ->setBody(
                    $form->getData()['subject'],'text/plain'
                );
            $this->get('mailer')->send($message);
        }

return $this->render('MyAppUserBundle:SinistreAutomobile:Mail.html.twig',['form'=>$form->createView()]);

        }

}
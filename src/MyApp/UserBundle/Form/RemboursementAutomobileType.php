<?php

namespace MyApp\UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Knp\Bundle\PaginatorBundle;
class RemboursementAutomobileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('estimation')->
        add('dateremboursement',HiddenType::class)->
        add('remboursementfinal',HiddenType::class)->
        add('etat',HiddenType::class)->
        add('Sinistreautomobile',EntityType::class,array(
            'class'=>'MyAppUserBundle:Sinistreautomobile',
            'choice_label'=>'idautomobile',
            'multiple'=>false,
            'disabled'=>true
        ))->
        add('user',EntityType::class,array(
            'class'=>'MyAppUserBundle:User',
            'choice_label'=>'prenom',
            'multiple'=>false,
            'disabled'=>true))
            ->add('Valider',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\UserBundle\Entity\RemboursementAutomobile'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_userbundle_remboursementautomobile';
    }


}

<?php

namespace Sarah\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class produitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', ChoiceType::class, [
            'choices' => [
                'sante' => 'sante',
                'voiture' => 'voiture',

            ],
            'preferred_choices' => ['muppets', 'arr'],
        ])
           ->add('nom', ChoiceType::class, [
                'choices' => [
                    'partiel' => 'partiel',
                    'totale' => 'totale',

                ],
                'preferred_choices' => ['muppets', 'arr'],
            ])
      ->add('promotion',HiddenType::class)->add('submit',SubmitType::Class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sarah\BackBundle\Entity\produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sarah_backbundle_produit';
    }


}

<?php

namespace MyApp\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
class ContratSanteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    const AWING = 'Des frais d hospitalisation';
    const BWING = 'Des frais medicaux';
    const XWING = 'Des frais de radiologie';
    const YWING = 'Des frais de maternite ';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut', HiddenType::class)
            ->add('dateFin', HiddenType::class)
            ->add('etat' , HiddenType::class)
            ->add('couvertureAssurance' , ChoiceType::class, [
        'choices' => [
            'Des frais d hospitalisation' => self::AWING,
            'Des frais medicaux' => self::BWING,
            'Des frais de radiologie' => self::XWING,
            'Des frais de maternite' => self::YWING,
        ],
        'expanded'  => true,
        'multiple'  => true,
    ])

            ->add('typeA' , ChoiceType::class , array('choices'=>array('Total' => 'Total',
                'Partiel' => 'Partiel'),))
            ->add('nomImage' , HiddenType::class)
            ->add('file')
            ->add('DateNaissance')
            ->add('imageFile' ,  VichImageType::class)
            ->add('user',HiddenType::class)
            ->add('Valider',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\UserBundle\Entity\ContratSante'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_userbundle_contratsante';
    }


}

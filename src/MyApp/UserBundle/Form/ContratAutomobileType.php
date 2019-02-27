<?php

namespace MyApp\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
class ContratAutomobileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    const AWING = 'Le Vol';
    const BWING = 'L Incendie';
    const XWING = 'Les Bris de Glaces';
    const YWING = 'Les dommages collision ';




    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('datedebut', HiddenType::class)
                 ->add('datefin' ,HiddenType::class)
                 ->add('typecontratAuto' , ChoiceType::class , array('choices'=>array('Total' => 'Total',
                     'Partiel' => 'Partiel'),))
                 ->add('couvertureAssurance' ,ChoiceType::class, [
        'choices' => [
            'Le Vol' => self::AWING,
            'L’Incendie' => self::BWING,
            'Les Bris de Glaces' => self::XWING,
            'Les dommages collision' => self::YWING,
        ],
        'expanded'  => true,
        'multiple'  => true,
    ])
                 ->add('etat' , HiddenType::class)
                 ->add('dateMiseCirculation')
                 ->add('marque')
                 ->add('carteGrise', HiddenType::class)
                 ->add('file1')
                 ->add('imageFile' ,  VichImageType::class)
                 ->add('user',HiddenType::class)
                 ->add('Valider',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\UserBundle\Entity\ContratAutomobile'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_userbundle_contratautomobile';
    }


}

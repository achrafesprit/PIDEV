<?php

namespace MyApp\UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DossierSinistreAutomobileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('toutrsique',ChoiceType::class,array(
        'choices'=>array(
            ''=>'',
            'Non'=>'Non',
            'Oui'=>'Oui'

        )
    ))
->
        add('standard',ChoiceType::class,array(
    'choices'=>array(
        ''=>'',
        'Non'=>'Non',
        'Oui'=>'Oui'
    )
))->
        add('entreeinterdit',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('depassefeuoustop',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('depassevitessemaximale',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('moteur',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('carcase',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('remarquage',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('fracture',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('accidentmortelle',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('hemoragie',ChoiceType::class,array(
                'choices'=>array(
                    ''=>'',
                    'Non'=>'Non',
                    'Oui'=>'Oui'
                )
            ))->
        add('SinistreAutomobile',EntityType::class,array(
                'class'=>'MyAppUserBundle:SinistreAutomobile',
                'choice_label'=>'idautomobile',
                'multiple'=>false
            ))->
        add('ContratAutomobile',EntityType::class,array(
                'class'=>'MyAppUserBundle:ContratAutomobile',
                'choice_label'=>'idcontratautomobile',
                'multiple'=>false
            ))


            ->add('Valider',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\UserBundle\Entity\DossierSinistreAutomobile'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_userbundle_dossiersinistreautomobile';
    }


}

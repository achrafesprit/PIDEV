<?php

namespace Sarah\BackBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class paquetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder->add('ProduitTypeSante', EntityType::class, array('class'=>'SarahBackBundle:produit',
        'query_builder' => function (EntityRepository $er) {
            return $er->createQueryBuilder('u')
                ->where('u.type= :sante')
                ->setParameter('sante',"sante");
        },
        'choice_label'  => 'nom',
    ))
        ->add('ProduitTypeVoiture', EntityType::class, array('class'=>'SarahBackBundle:produit',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->where('u.type= :voiture')
                    ->setParameter('voiture',"voiture");
            },
            'choice_label'  => 'nom',
        ))
            ->add('dateDebutOffre')->add('dateFinOffre')->add('prixOffre')->add('Nombre',HiddenType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sarah\BackBundle\Entity\paquet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sarah_backbundle_paquet';
    }


}

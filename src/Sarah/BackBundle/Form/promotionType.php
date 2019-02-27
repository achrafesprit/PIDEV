<?php

namespace Sarah\BackBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class promotionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('produit', EntityType::class, array('class'=>'SarahBackBundle:produit',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->where('u.promotion=0')
                    ->orderBy('u.nom', 'ASC');
            },
            'choice_label'  => 'nom',
            'group_by' => function($choiceValue, $key, $value) {
                if ($choiceValue->getType() == "voiture") {
                    return 'voiture';
                } elseif($choiceValue->getType() == "sante") {
                    return 'sante';
                }
            },
        ))
            ->add('file') ->add('nomImage')->add('dateDebutPromotion')->add('DateFinPromotion')->add('pourcentageRemise')->add('Nombre',HiddenType::class)->add('etat',HiddenType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sarah\BackBundle\Entity\promotion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sarah_backbundle_promotion';
    }


}

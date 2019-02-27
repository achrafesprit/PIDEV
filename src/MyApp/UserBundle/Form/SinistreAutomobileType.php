<?php

namespace MyApp\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SinistreAutomobileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('datesinistre',DateType::class, [
            'widget' => 'single_text',
            // prevents rendering it as type="date", to avoid HTML5 date pickers
            // adds a class that can be selected in JavaScript
            'attr' => ['class' => 'js-datepicker'],
        ])



            ->add('dateajout',DateType::class, [
                'widget' => 'single_text',
                // prevents rendering it as type="date", to avoid HTML5 date pickers
                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ])

            ->add('localisation', ChoiceType::class, [
                'choices' => [
                    '' => '',
                    'ariana' => 'ariana',
                    'beja' => 'beja',
                    'ben arous' => 'ben arous',
                    'bizerte' => 'bizerte',
                    'gabes' => 'gabes',
                    'ariana' => 'ariana',
                    'gafsa' => 'gafsa',
                    'jendouba' => 'jendouba',
                    'kairoun' => 'kairoun',
                    'kasrine' => 'kasrine',
                    'gbeli' => 'gbeli',
                    'kef' => 'kef',
                    'mahdia' => 'mahdia',
                    'manouba' => 'manouba',
                    'mednine' => 'mednine',
                    'monastir' => 'monastir',
                    'nabeul' => 'nabeul',
                    'sfax' => 'sfax',
                    'sidi bou zid' => 'sidi bou zid',
                    'siliana' => 'siliana',
                    'sousse' => 'sousse',
                    'tatawine' => 'tatawine',
                    'touzeur' => 'touzeur',
                    'tunis' => 'tunis',
                    'zaghoun' => 'zagoun',



                ],
                'preferred_choices' => ['muppets', 'arr'],
            ])

                ->add('description')
            ->add('degat_humaine')
            ->add('bienendommage')
            ->add('constat')
            ->add('file')
            ->add('cout')
            ->add('user',HiddenType::class)
            ->add('address')
        ->add('Valider',SubmitType::class);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\UserBundle\Entity\SinistreAutomobile'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_userbundle_sinistreautomobile';
    }


}

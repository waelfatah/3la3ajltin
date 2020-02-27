<?php

namespace EntretienBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\FosUser;

class EntretienType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('typeVelo',ChoiceType::class, array('choices' => array('Velo de Vile'=>'Velo de Vile',
                'Velo de Route'=> 'Velo de Route',
                'VTT'=> 'VTT',
                'VAE'=> 'VAE',
                'Other'=> 'Other')))
            ->add('typeClient', ChoiceType::class, array('choices' => array(
                'Particulier'=>'Particulier',
                'prefessionnel'=>  'prefessionnel',
                'Other'=> 'Other')))
            ->add('ageVelo')
            ->add('marque')
            ->add('description')
            ->add('Ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Entretien'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'Appbundle_entretien';
    }


}

<?php

namespace LivraisonBundle\Form;

use AppBundle\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null,array('attr' => ['placeholder' => '' ,'pattern' => '[a-zA-Z- ]*','class'=>'form-control']))
            ->add('prenom', null,array('attr' => ['placeholder' => '' ,'pattern' => '[a-zA-Z- ]*']))
            ->add('sujet', null,array('attr' => ['placeholder' => '' ,'pattern' => '[a-zA-Z- ]*']))
            ->add('description', null,array('attr' => ['placeholder' => '' ,'pattern' => '[a-zA-Z- ]*']));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reclamation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'livraisonbundle_reclamation';
    }


}

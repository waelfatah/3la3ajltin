<?php

namespace LivraisonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LivraisonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('localisation',null,array('attr' => ['placeholder' => '' ,'class' => 'form-control']))
            ->add('etat',null,array('attr' =>['placeholder' => '' ,'class' => 'form-control','pattern' => '[a-zA-Z- ]*']))
            ->add('idLivreur',null,array('attr' => ['placeholder' => '' ,'class' => 'form-control']))
            ->add('idVelo',null,array('attr' => ['placeholder' => '' ,'class' => 'form-control']))
            ->add('Valider', SubmitType::class, [
                'attr' => ['class' => 'cy_button next']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Livraison'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_livraison';
    }


}

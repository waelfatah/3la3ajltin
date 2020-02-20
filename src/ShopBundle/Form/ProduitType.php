<?php

namespace ShopBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',null,array('attr' => ['placeholder' => 'Ceci doit etre string' ,'class' => 'form-group','pattern' => '[a-zA-Z- ]*']))
            ->add('marque',null,array('attr' => ['placeholder' => '' ,'class' => 'form-group','pattern' => '[a-zA-Z- ]*']))
            ->add('prixProd')
            ->add('quantite',null,array('attr' => ['placeholder' => 'Ceci doit etre int' ,'class' => 'form-group','pattern' => '[1-99999999]*']))
            ->add('urlImage')

            ->add('typeProd', ChoiceType::class, [
                'choices' =>[
                    'Accessoire' => 'Accessoire',
                    'Velo' => 'Velo'
                ]
            ])
            ->add('Ajouter',SubmitType::class);
    }
/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'shopbundle_produit';
    }


}

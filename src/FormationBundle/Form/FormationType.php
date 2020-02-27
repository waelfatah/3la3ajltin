<?php

namespace FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class FormationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titleF', TextType::class)
            ->add('dateDebutFormation')
            ->add('dateFinFormation')
            ->add('nbrDePlaceF')
            ->add('lieuFormation', TextType::class, array(
                'attr' => ['pattern' => '[a-zA-Z- ]*']))
            ->add('descriptionFormation', TextType::class)
            ->add('imageFile', VichFileType::class, [
                'required'=>false,
                'allow_delete'=> true,
                'download_link'=> true

            ])
            ->add('Valider', SubmitType::class, [
        'attr' => ['class' => 'btn btn-primary']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Formation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'AppBundle_formation';
    }


}

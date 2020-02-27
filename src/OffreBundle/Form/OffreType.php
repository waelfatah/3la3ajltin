<?php

namespace OffreBundle\Form;

use AppBundle\Entity\Offre;
use AppBundle\Entity\FosUser;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',null,array('attr' => ['placeholder' => 'Saisissez le Titre de l offre' ,'class' => 'form-control','pattern' => '[a-zA-Z-1-99999 ]*']))
            ->add('description',null,array('attr' => ['placeholder' => 'Saisissez une Description' ,'class' => 'form-control','pattern' => '[a-zA-Z-1-99999 ]*']))
            ->add('emplacement',null,array('attr' => ['placeholder' => 'précisez lemplacement' ,'class' => 'form-control','pattern' => '[a-zA-Z-1-99999 ]*']))
            ->add('prix',null,array('attr' => ['placeholder' => 'précisez le Prix' ,'class' => 'form-control']))
            ->add('imageFile', VichFileType::class, [
                'required'=>false,
                'allow_delete'=> true,
                'download_link'=> true

            ]);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Offre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'Appbundle_offre';
    }


}

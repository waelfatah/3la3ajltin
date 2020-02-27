<?php

namespace EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')->add('dateDebutEvent')->add('dateFinEvent')->add('nbrDePlace')->add('lieuEvent')->add('descriptionEvent') ->add('imageFile', VichFileType::class, [
            'required'=>false,
            'allow_delete'=> true,
            'download_link'=> true

        ])->add('Valider', SubmitType::class, [
            'attr' => ['class' => 'btn btn-primary']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'AppBundle_event';
    }


}

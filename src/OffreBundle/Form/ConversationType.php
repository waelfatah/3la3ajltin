<?php


namespace OffreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConversationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message',null,array('attr' => ['placeholder' => '' ,'class' => 'form-control','pattern' => '[a-zA-Z-1-999999 ]*']))
            ->add('titre',null,array('attr' => ['placeholder' => '' ,'class' => 'form-control','pattern' => '[a-zA-Z-1-999999 ]*']));
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Conversation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_conversation';
    }


}

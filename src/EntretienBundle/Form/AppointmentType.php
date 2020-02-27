<?php

namespace EntretienBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Gregwar\CaptchaBundle\Type\CaptchaType;
class AppointmentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quand')
            ->add('prestation',ChoiceType::class, array('choices' => array(
                'Entretien Courant'=>'Entretien Courant',
                'Freinage'=>'Freinage',
                'Transmission'=>'Transmission',
                'Suspension'=>  'Suspension',
                'Amortisseurs'=>  'Amortisseurs',
                'Roues'=>  'Roues',
                'Other'=> 'Other')))
            ->add('captcha', CaptchaType::class , array(
                'width' => 400,
                'height' => 50,
                'length' => 8,
            ))

            ->add('Ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Appointment'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_appointment';
    }


}

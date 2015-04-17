<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FCdType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artiste')
            ->add('titre')
            ->add('label')
            ->add('maison')
            ->add('distrib')
            ->add('annee')
            ->add('type')
            ->add('support')
            ->add('genre')
            ->add('langue')
            ->add('rotation')
            ->add('userProgra')
            ->add('dprogra')
            ->add('comment')
            ->add('jsaisie')
            ->add('noteMoy')
            ->add('retourMail')
            ->add('nbPiste')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FCd'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_fcd';
    }
}

<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LabelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('email')
            ->add('telephone','text', array('required' => false))
            ->add('adresse','text', array('required' => false))
            ->add('adresse2','text', array('required' => false))
            ->add('cp','text', array('required' => false))
            ->add('ville','text', array('required' => false))
            ->add('mailProgra')
            ->add('contact1','text', array('required' => false))
            ->add('siteweb','text', array('required' => false))
            ->add('info','textarea', array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Label'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_label';
    }
}

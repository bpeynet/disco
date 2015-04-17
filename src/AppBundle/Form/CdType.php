<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CdType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artiste', 'entity', array(
                    'class' => 'AppBundle:Artiste',
                    'property' => 'artiste'
                ))
            ->add('titre')
            ->add('label', 'entity', array(
                    'class' => 'AppBundle:Label',
                    'property' => 'label'
                ))
            ->add('maison', 'entity', array(
                    'class' => 'AppBundle:Label',
                    'property' => 'label'
                ))
            ->add('distrib', 'entity', array(
                    'class' => 'AppBundle:Label',
                    'property' => 'label'
                ))
            ->add('annee')
            ->add('type', 'entity', array(
                    'class' => 'AppBundle:Type',
                    'property' => 'libelle'
                ))
            ->add('support', 'entity', array(
                    'class' => 'AppBundle:Support',
                    'property' => 'libelle'
                ))
            ->add('genre', 'entity', array(
                    'class' => 'AppBundle:Genre',
                    'property' => 'libelle'
                ))
            ->add('langue', 'entity', array(
                    'class' => 'AppBundle:Langue',
                    'property' => 'libelle'
                ))
            ->add('rotation', 'entity', array(
                    'class' => 'AppBundle:Rotation',
                    'property' => 'libelle'
                ))
            ->add('userProgra', 'entity', array(
                    'class' => 'AppBundle:User',
                    'property' => 'user'
                ))
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
            'data_class' => 'AppBundle\Entity\Cd'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_cd';
    }
}

<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CdType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artiste', 'text', array('mapped' => false))
            ->add('titre')
            ->add('dsortie','date', array(
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'required' => false))
            ->add('annee','text', array('required' => true, 'data' => date('Y')))
            ->add('label', 'text', array('required' => false, 'mapped' => false))
            ->add('maison', 'text', array('required' => false,'mapped' => false))
            ->add('distrib', 'text', array('required' => false, 'mapped' => false))
            ->add('refLabel','text', array('required' => false))
            ->add('dvd','checkbox', array('required' => false))
            ->add('etiquette','checkbox', array('required' => false))
            ->add('paulo','checkbox', array('required' => false))
            ->add('support', 'entity', array(
                    'class' => 'AppBundle:Support',
                    'property' => 'libelle',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.libelle', 'ASC');
                        },
                    'empty_data' => null, 'required' => false
                ))
            ->add('type', 'entity', array(
                    'class' => 'AppBundle:Type',
                    'property' => 'libelle',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('t')
                            ->orderBy('t.libelle', 'ASC');
                        },
                    'empty_data' => null, 'required' => false
                ))
            ->add('langue', 'entity', array(
                    'class' => 'AppBundle:Langue',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('l')
                            ->orderBy('l.libelle', 'ASC');
                        },
                    'property' => 'libelle',
                    'empty_data' => null, 'required' => false
                ))
            ->add('genre', 'entity', array(
                    'class' => 'AppBundle:Genre',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('g')
                        ->where('g.principal = :principal')
                        ->setParameter('principal',true)
                        ->orderBy('g.libelle', 'ASC');
                    },
                    'property' => 'libelle',
                    'empty_data' => null
                ))
            ->add('styles', 'entity', array(
                    'class' => 'AppBundle:Genre',
                    'property' => 'libelle',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('g')
                            ->orderBy('g.libelle', 'ASC');
                        },
                    'expanded'=>false,
                    'multiple'=>true,
                    'required'=>false
                ))




            ->add('nbPiste','integer', array(
                    'attr' => array(
                            'min' => 0,
                            'max' => 50
                        )
                ))
            ->add('various','checkbox', array('required' => false))

            ->add('userProgra', 'entity', array(
                    'class' => 'AppBundle:User',
                    'property' => 'libelle',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.libelle', 'ASC');
                        },
                    'empty_value' => '',
                    'required' => false
                ))
            ->add('rotation', 'entity', array(
                    'class' => 'AppBundle:Rotation',
                    'property' => 'libelle',
                    'empty_value' => '',
                    'required' => false
                ))
            ->add('comment', 'textarea', array('required' => false))
            ->add('ecoute','url',array(
                'required' => false,
                'attr' => array (
                    'placeholder'=>'Lien d\'écoute du CD : http://...'
                    )
                ))
            ->add('file')
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

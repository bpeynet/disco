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
            ->add('artiste', 'entity', array(
                    'class' => 'AppBundle:Artiste',
                    'property' => 'artiste',
                    'attr'=>array('style'=>'display:none;')
                ))
            ->add('titre')
            ->add('dsortie','date', array('required' => false))
            ->add('annee','text', array('required' => false))
            ->add('label', 'entity', array(
                    'class' => 'AppBundle:Label',
                    'property' => 'label',
                    'attr'=>array('style'=>'display:none;')
                ))
            ->add('maison', 'entity', array(
                    'class' => 'AppBundle:Label',
                    'property' => 'label',
                    'attr'=>array('style'=>'display:none;')
                ))
            ->add('distrib', 'entity', array(
                    'class' => 'AppBundle:Label',
                    'property' => 'label',
                    'attr'=>array('style'=>'display:none;')
                ))
            ->add('refLabel','text', array('required' => false))
            ->add('dvd','checkbox', array('required' => false))
            ->add('etiquette','checkbox', array('required' => false))
            ->add('paulo','checkbox', array('required' => false))
            ->add('support', 'entity', array(
                    'class' => 'AppBundle:Support',
                    'property' => 'libelle'
                ))
            ->add('type', 'entity', array(
                    'class' => 'AppBundle:Type',
                    'property' => 'libelle'
                ))
            ->add('langue', 'entity', array(
                    'class' => 'AppBundle:Langue',
                    'property' => 'libelle'
                ))
            ->add('genre', 'entity', array(
                    'class' => 'AppBundle:Genre',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('g')
                            ->where('g.primaire = 1')
                            ->orderBy('g.genre', 'ASC');
                    },
                    'property' => 'libelle'
                ))
            ->add('styles', 'entity', array(
                    'class' => 'AppBundle:Genre',
                    'property' => 'libelle',
                    'expanded'=>false,
                    'multiple'=>true,
                    'required'=>false
                ))




            ->add('nbPiste')
            ->add('various','checkbox', array('required' => false))
            /*->add('pistes','entity', array(
                    'class' => 'AppBundle:Piste',
                    'property' => 'titre'
                ))*/
            ->add('userProgra', 'entity', array(
                    'class' => 'AppBundle:User',
                    'property' => 'libelle'
                ))
            ->add('rotation', 'entity', array(
                    'class' => 'AppBundle:Rotation',
                    'property' => 'libelle'
                ))
            ->add('comment', 'textarea', array('required' => false))
            ->add('noteMoy', 'text', array('read_only' => true))
            /*->add('note','entity',  array(
                    'class' => 'AppBundle:CdNote',
                    'property' => 'note'
                ))*/


            //->add('commentaire','textarea', array('required' => false))



            ->add('retourLabel', 'text', array('required' => false))





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

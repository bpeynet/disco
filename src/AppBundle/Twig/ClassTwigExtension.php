<?php
/** from http://stackoverflow.com/questions/22550368/how-can-we-get-class-name-of-the-entity-object-in-twig-view **/

namespace AppBundle\Twig;

class ClassTwigExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            'class' => new \Twig_SimpleFunction('class', array($this, 'getClass'))
        );
    }

    public function getName()
    {
        return 'class_twig_extension';
    }

    public function getClass($object)
    {
        return (new \ReflectionClass($object))->getShortName();
    }
}

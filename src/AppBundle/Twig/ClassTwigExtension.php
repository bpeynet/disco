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

    public function getFilters()
    {
        return array(
            'music_length' => new \Twig_Filter_Method($this, 'lengthFilter')
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

    public function lengthFilter($ms) {
        $h = floor($ms/3600/1000);
        $m = floor($ms/60/1000) % 60;
        $s = floor($ms/1000) % 60;
        return "{$h}h {$m}min {$s}s";
    }


}

<?php

namespace Pfz\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array('required' => true,
        'attr' => array(
            'placeholder' => 'Uw titel',
        )));
        $builder->add('content', 'textarea', array(
            'constraints' => array(
                new Constraints\Length(array('min' => 10)),
            )
        ));
        $builder->add('author', 'text');
        $builder->add('submit', 'submit');
    }

    public function getName()
    {
        return 'blog';
    }
}

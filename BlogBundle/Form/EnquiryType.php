<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php
/**
 * Created by PhpStorm.
 * User: martynas
 * Date: 2015.08.04
 * Time: 15:25
 */

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email', 'email');
        $builder->add('subject');
        $builder->add('body', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}
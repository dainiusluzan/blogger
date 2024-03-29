<?php
// src/Blogger/BlogBundle/Entity/Enquiry.php
/**
 * Created by PhpStorm.
 * User: martynas
 * Date: 2015.08.04
 * Time: 15:21
 */

namespace Blogger\BlogBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class Enquiry
{
    protected $name;

    protected $email;

    protected $subject;

    protected $body;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());

//        $metadata->addPropertyConstraint('email', new Email());
        $metadata->addPropertyConstraint('email', new Email(array(
            'message' => 'symblog does not like invalid emails. Give me a real one!'
        )));

        $metadata->addPropertyConstraint('subject', new NotBlank());
        $metadata->addPropertyConstraint('subject', new Length(['max' =>50]));

        $metadata->addPropertyConstraint('body', new Length(['min' => 50]));

    }
}
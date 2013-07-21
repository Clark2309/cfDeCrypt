<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chu
 * Date: 21.07.13
 * Time: 19:48
 * To change this template use File | Settings | File Templates.
 */

namespace cf\cfDeCryptBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SimpleDecodingType extends AbstractDecodingType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('encodedText', 'textarea');
        $builder->add('decodedText', 'textarea');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'DecodingForm';
    }

}
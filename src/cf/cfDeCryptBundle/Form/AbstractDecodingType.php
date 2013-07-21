<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chu
 * Date: 21.07.13
 * Time: 19:37
 * To change this template use File | Settings | File Templates.
 */

namespace cf\cfDeCryptBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

abstract class AbstractDecodingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    }
}
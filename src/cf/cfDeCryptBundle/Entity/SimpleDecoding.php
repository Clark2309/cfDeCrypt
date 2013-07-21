<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chu
 * Date: 21.07.13
 * Time: 19:51
 * To change this template use File | Settings | File Templates.
 */

namespace cf\cfDeCryptBundle\Entity;


class SimpleDecoding {

    protected $encodedText;
    protected $decodedText;

    /**
     * @return mixed
     */
    public function getDecodedText()
    {
        return $this->decodedText;
    }

    /**
     * @param mixed $decodedText
     */
    public function setDecodedText($decodedText)
    {
        $this->decodedText = $decodedText;
    }

    /**
     * @return mixed
     */
    public function getEncodedText()
    {
        return $this->encodedText;
    }

    /**
     * @param mixed $encodedText
     */
    public function setEncodedText($encodedText)
    {
        $this->encodedText = $encodedText;
    }
}
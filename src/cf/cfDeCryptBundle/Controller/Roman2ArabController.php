<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chu
 * Date: 21.07.13
 * Time: 19:50
 * To change this template use File | Settings | File Templates.
 */

namespace cf\cfDeCryptBundle\Controller;


use cf\cfDeCryptBundle\Entity\SimpleDecoding;
use cf\cfDeCryptBundle\Form\SimpleDecodingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Roman2ArabController extends Controller
{
    public function showAction()
    {
        $decoding = new SimpleDecoding();
        $form = $this->createForm(new SimpleDecodingType(), $decoding);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $decoding->setDecodedText($this->rom2arab($decoding->getEncodedText()));
            }
        }

        return $this->render('cfDeCryptBundle:Decoders:roman2arab.html.twig', array(
            'form' => $form->createView(),
            'decoding' => $decoding
        ));
    }

    private function ara2rom($nArab)
    {
        $values = array('IV' => 4, 'XL' => 40, 'CD' => 400, 'IX' => 9, 'XC' => 90, 'CM' => 900, 'I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000);
        $data1 = $values;
        arsort($data1);
        $sRoman = '';
        while ($nArab > 0) {
            foreach ($data1 as $key => $val) {
                while ($nArab / $val >= 1) {
                    $nArab = $nArab - $val;
                    $sRoman .= $key;
                }
            }
        }
        return $sRoman;
    }

    private function rom2arab($sRoman)
    {
        $values = array('IV' => 4, 'XL' => 40, 'CD' => 400, 'IX' => 9, 'XC' => 90, 'CM' => 900, 'I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000);
        $nArab = 0;
        foreach ($values as $key => $val) {
            $nArab += substr_count($sRoman, $key) * $val;
            $sRoman = str_replace($key, "", $sRoman);
        }
        return $nArab;
    }
}
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

class Rot13Controller extends Controller {
    public function showAction()
    {
        $decoding = new SimpleDecoding();
        $form = $this->createForm(new SimpleDecodingType(), $decoding);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $decoding->setDecodedText(str_rot13($decoding->getEncodedText()));
            }
        }

        return $this->render('cfDeCryptBundle:Decoders:rot13.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
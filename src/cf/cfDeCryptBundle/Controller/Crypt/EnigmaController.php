<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chu
 * Date: 21.07.13
 * Time: 19:50
 * To change this template use File | Settings | File Templates.
 */

namespace cf\cfDeCryptBundle\Controller\Crypt;

use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaConstants;
use cf\cfDeCryptBundle\Entity\EnigmaDecoding;
use cf\cfDeCryptBundle\Form\EnigmaDecodingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\Enigma;

class EnigmaController extends Controller {
    public function showAction()
    {
        $decoding = new EnigmaDecoding();
        $form = $this->createForm(new EnigmaDecodingType(), $decoding);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
				$enigma = new Enigma($decoding->getEnigmaModel(), $decoding->getRotors(), $decoding->getEnigmaReflector());

//                $decoding->setDecodedText(str_rot13($decoding->getEncodedText()));
            }
        }

		// TODO: Test Enigma
		$rotors = array(EnigmaConstants::ENIGMA_ROTOR_I, EnigmaConstants::ENIGMA_ROTOR_II, EnigmaConstants::ENIGMA_ROTOR_III);
		$enigma = new Enigma(EnigmaConstants::ENIGMA_WM, $rotors, EnigmaConstants::ENIGMA_REFLECTOR_B);
		$enigma->setPosition(EnigmaConstants::ENIGMA_ROTOR_1, "A");
		$enigma->setRingstellung(EnigmaConstants::ENIGMA_ROTOR_1, "A");
//		$enigma->plugLetters("A", "C");
//		$enigma->plugLetters("B", "Z");
//		$enigma->unplugLetters("A");

		$l = "A";
		$decoding->setDecodedText( "before: ".$enigma->getPosition(EnigmaConstants::ENIGMA_ROTOR_3)." ".$enigma->getPosition(EnigmaConstants::ENIGMA_ROTOR_2)." ".$enigma->getPosition(EnigmaConstants::ENIGMA_ROTOR_1)."<br>".
		$l." -> ".$enigma->encodeLetter($l)."<br>".
		"after: ".$enigma->getPosition(EnigmaConstants::ENIGMA_ROTOR_3)." ".$enigma->getPosition(EnigmaConstants::ENIGMA_ROTOR_2)." ".$enigma->getPosition(EnigmaConstants::ENIGMA_ROTOR_1)."<br>");
		// Ende Test Enigma

        return $this->render('cfDeCryptBundle:Decoders:enigma.html.twig', array(
            'form'      => $form->createView(),
            'decoding'  => $decoding
        ));
    }

}
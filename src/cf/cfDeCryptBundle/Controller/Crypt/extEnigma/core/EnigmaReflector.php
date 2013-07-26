<?php
/**
 * This class represents a Reflector of an Enigma.
 *
 * After its way through plugboard and all rotors, the reflector leads the signal all the way back.
 * Because no letter must connect to itself, its provided that the signal takes a different route.
 * This enables the Enigma to work both for encryption and decryption without any further setup
 *
 * @author David Kargl <davidkargl@yahoo.de>
 * @version 1.0
 */

namespace cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core;

use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaWiring;

class EnigmaReflector
{

	/**
	 * The wiring of the reflector.
	 * Pins are connected in pairs, that means, if 'D' on side A connects to 'H'
	 * on side B, 'H' on side A connects to 'D' on side B. No letter must connect to itself!
	 * @var EnigmaWiring
	 */
	private $wiring = null;

	/**
	 * Constructor creates a new Wiring with the setup from $wiring.
	 * @uses EnigmaWiring
	 * @param string $wiring setup for the wiring
	 */
	public function __construct($wiring)
	{
		$this->wiring = new EnigmaWiring($wiring);
	}

	/**
	 * Send a letter through the wiring.
	 * Because pins are connected in pairs, there is no difference if
	 * processLetter1stPass() or processLetter2ndPass() is used.
	 * @param integer
	 * @return integer resulting letter
	 */
	public function processLetter($letter)
	{
		return $this->wiring->processLetter1stPass($letter);
	}
}

?>
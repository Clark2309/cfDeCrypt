<?php
/**
 * This class represents an Enigma.
 *
 * 3 different models can be emulated with this class, each one has its own set of rotors and reflectors to be used with.
 * Depending on the model, 3 or 4 rotors are mounted, only the first three of them can be triggered by the advance mechanism.
 * A letter is encoded by sending its corresponding signal through the plugboard, rotor 1..3(4), the reflector,
 * rotor 3(4)..1 and the plugboard again.
 * After each encoded letter, the advance mechanism changes the internal setup by rotating the rotors.
 *
 * @author David Kargl <davidkargl@yahoo.de>
 * @version 1.0
 */

namespace cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core;

use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaPlugboard;
use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaRotor;
use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaReflector;
use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaConstants;

class Enigma
{

	/**
	 * The plugboard that connects input and output to the 1st rotor.
	 * @var EnigmaPlugboard
	 */
	private $plugboard = null;

	/**
	 * The rotors used by the Enigma.
	 * @var array EnigmaRotor
	 */
	private $rotors = null;

	/**
	 * The reflector used by the Enigma.
	 * @var array EnigmaReflector
	 */
	private $reflector = null;

	/**
	 * The rotors available for this model of the Enigma.
	 * @var array EnigmaRotor
	 */
	private $availablerotors = null;

	/**
	 * The reflectors available for this model of the Enigma.
	 * @var array EnigmaReflector
	 */
	private $availablereflectors = null;

	private $ec;

	/**
	 * Constructor sets up the plugboard and creates the rotors and reflectros available for the given model.
	 * The initital rotors and reflectros are mounted.
	 * @param integer
	 * @param array integer IDs for the rotors for the initial setup
	 * @param integer
	 */
	public function __construct($model, $rotors, $reflector)
	{
		$this->ec = new EnigmaConstants();

		$this->rotors = array();
		$this->availablerotors = array();
		$this->availablereflectors = array();
		$this->plugboard = new EnigmaPlugboard();

		foreach ( $this->ec->ENIGMA_ROTORS as $r ) {
			if ( in_array($model, $r["used"]) ) {
				$this->availablerotors[$r["key"]] = new EnigmaRotor($r["wiring"], $r["notches"]);
			}
		}
		foreach ( $this->ec->ENIGMA_REFLECTORS as $r ) {
			if ( in_array($model, $r["used"]) ) {
				$this->availablereflectors[$r["key"]] = new EnigmaReflector($r["wiring"]);
			}
		}
		foreach ( $rotors as $key => $value ) {
			$this->mountRotor($key, $value);
		}

		$this->mountReflector($reflector);
	}

	/**
	 * Advance the rotors.s
	 * Rotor 1 advances every time, rotor 2 when a notch on rotor 1 is open and when rotor 3 advances, rotor 3 when a notch on rotor 2 is open
	 * @return void
	 */
	private function advance()
	{
		if ( $this->rotors[1]->isNotchOpen() ) {
			$this->rotors[2]->advance();
			$this->rotors[1]->advance();
		}
		if ( $this->rotors[0]->isNotchOpen() ) {
			$this->rotors[1]->advance();
		}
		$this->rotors[0]->advance();
	}

	/**
	 * Encode a single letter.
	 * The letter passes the plugboard, the rotors, the reflector, the rotors in the opposite direction and again the plugboard.
	 * Every encoding triggers the advancemechanism.
	 * @see advance
	 * @param string
	 * @return string
	 */
	public function encodeLetter($letter)
	{
		$this->advance();
		// TODO: Test Enigma
		echo $letter;
		$letter = $this->ec->enigma_l2p($letter);
		$letter = $this->plugboard->processLetter($letter);
		for ( $idx = 0; $idx < sizeof($this->rotors); $idx++ ) {
			$letter = $this->rotors[$idx]->processLetter1stPass($letter);
		}
		$letter = $this->reflector->processLetter($letter);
		for ( $idx = (sizeof($this->rotors) - 1); $idx > -1; $idx-- ) {
			$letter = $this->rotors[$idx]->processLetter2ndPass($letter);
		}
		// TODO: Test Enigma
		echo $letter;
		$letter = $this->plugboard->processLetter($letter);
		$letter = $this->ec->enigma_p2l($letter);
		return $letter;
	}

	/**
	 * Mount a rotor into the enigma.
	 * A rotor may only be used in one position at a time, so if an rotor is already in use nothing is changed.
	 * The previously used rotor will be replaced.
	 * @param integer
	 * @param integer
	 * @return void
	 */
	public function mountRotor($position, $rotor)
	{
		if ( $this->availablerotors[$rotor]->inUse ) {
			return;
		}
		if ( array_key_exists($position, $this->rotors) ) {
			$this->rotors[$position]->inUse = false;
		}
		$this->rotors[$position] = $this->availablerotors[$rotor];
		$this->rotors[$position]->inUse = true;
	}

	/**
	 * Mount a reflector into the enigma.
	 * The previously used reflector will be replaced.
	 * @param integer
	 * @return void
	 */
	public function mountReflector($reflector)
	{
		$this->reflector = $this->availablereflectors[$reflector];
	}

	/**
	 * Turn a rotor to a new position.
	 * @param integer
	 * @param string
	 * @return void
	 * @uses enigma_l2p
	 */
	public function setPosition($position, $letter)
	{
		$this->rotors[$position]->setPosition($this->ec->enigma_l2p($letter));
	}

	/**
	 * Get the current position of a rotor.
	 * @param integer
	 * @return string current position
	 * @uses enigma_p2l
	 */
	public function getPosition($position)
	{
		return $this->ec->enigma_p2l($this->rotors[$position]->getPosition());
	}

	/**
	 * Turn the ringstellung of a rotor to a new position.
	 * @param integer
	 * @param string
	 * @return void
	 * @uses enigma_l2p
	 */
	public function setRingstellung($position, $letter)
	{
		$this->rotors[$position]->setRingstellung($this->ec->enigma_l2p($letter));
	}

	/**
	 * Connect 2 letters on the plugboard.
	 * The letter are transformed to integer first
	 * @param string
	 * @param string
	 * @return void
	 * @uses enigma_l2p
	 */
	public function plugLetters($letter1, $letter2)
	{
		$this->plugboard->plugLetters($this->ec->enigma_l2p($letter1), $this->ec->enigma_l2p($letter2));
	}

	/**
	 * Disconnects 2 letters on the plugboard.
	 * Because letters are connected in pairs, we only need to know one of them.
	 * @param string 1 of the 2 letters to disconnect
	 * @return void
	 * @uses enigma_l2p
	 */
	public function unplugLetters($letter)
	{
		$this->plugboard->unplugLetters($this->ec->enigma_l2p($letter));
	}
}

?>
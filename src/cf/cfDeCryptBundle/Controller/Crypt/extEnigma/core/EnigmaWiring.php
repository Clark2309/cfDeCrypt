<?php
/**
 * This class represents the wiring of rotors, reflectors and the plugboard.
 *
 * Each wiring provides a monoalphabetical substitution e.g.:
 * <pre>
 * ABCDEFGHIJKLMNOPQRSTUVWXYZ
 * ||||||||||||||||||||||||||
 * EKMFLGDQVZNTOWYHXUSPAIBRCJ
 * </pre>
 * @author David Kargl <davidkargl@yahoo.de>
 * @version 1.0
 */

namespace cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core;

use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaConstants;

class EnigmaWiring
{

	/**
	 * The connections of the pins.
	 *
	 * [0]=4 means pin 0 on side A leads to pin 4 on side B, [1]=10 means pin 1 on side A leads to pin 10 on side B, ...<br>
	 * Size is ENIGMA_ALPHABET_SIZE.
	 * @var array integer
	 */
	private $wiring = null;

	/**
	 * Constructor connects the pins according to the list in $wiring.
	 *
	 * example string EKMFLGDQVZNTOWYHXUSPAIBRCJ leads to [0]=4, [1]=10, [2]=12, ...
	 * @param string
	 * @uses enigma_l2p
	 */
	public function __construct($wiring)
	{

		$func = function ($val) {
			$ec = new EnigmaConstants();
			array_search(strtoupper($val), $ec->ENIGMA_ALPHABET);
		};
		$this->wiring = array_map($func, str_split($wiring));
	}

	/**
	 * Manually connect 2 pins.
	 * @param integer
	 * @param integer
	 * @return void
	 */
	public function connect($pin1, $pin2)
	{
		$this->wiring[$pin1] = $pin2;
	}

	/**
	 * Get the connected pin.
	 * @param integer
	 * @return integer the connected pin
	 */
	public function connectsTo($pin)
	{
		return $this->wiring[$pin];
	}

	/**
	 * Pass the given letter form side A to side B by following the connection of the pins.
	 * @param integer
	 * @return integer pin that gets activated
	 */
	public function processLetter1stPass($pin)
	{
		return $this->wiring[$pin];
	}

	/**
	 * Pass the given letter form side B to side A by following the connection of the pins.
	 * @param integer
	 * @return integer pin that gets activated
	 */
	public function processLetter2ndPass($pin)
	{
		return array_search($pin, $this->wiring);
	}

	public function __toString()
	{
		$ret = "Wiring: ";
		foreach ( $this->wiring as $key => $val ) {
			$ret .= $key . "=>" . $val . ";";
		}
		return $ret;
	}
}

?>
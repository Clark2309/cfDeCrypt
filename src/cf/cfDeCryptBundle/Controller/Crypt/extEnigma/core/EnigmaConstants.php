<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chu
 * Date: 26.07.13
 * Time: 12:00
 * To change this template use File | Settings | File Templates.
 */

namespace cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core;

class EnigmaConstants
{

	/**
	 * Wehrmacht/Luftwaffe (3-rotor model)
	 */
	const ENIGMA_WM = 0;

	/**
	 * Kriegsmarine M3 (3-rotor model)
	 */
	const ENIGMA_KM_M3 = 1;

	/**
	 * Kriegsmarine M4 (4-rotor model)
	 */
	const ENIGMA_KM_M4 = 2;

	/**
	 * ID Rotorposition 1
	 */
	const ENIGMA_ROTOR_1 = 0;
	/**
	 * ID Rotorposition 2
	 */
	const ENIGMA_ROTOR_2 = 1;
	/**
	 * ID Rotorposition 3
	 */
	const ENIGMA_ROTOR_3 = 2;
	/**
	 * ID Rotorposition 4
	 * only available in model Kriegsmarine M4, also call 'Greek rotor'
	 * this rotor never turns
	 */
	const ENIGMA_ROTOR_GREEK = 3;

	/**
	 * ID Rotor I
	 */
	const ENIGMA_ROTOR_I = 0;
	/**
	 * ID Rotor II
	 */
	const ENIGMA_ROTOR_II = 1;
	/**
	 * ID Rotor III
	 */
	const ENIGMA_ROTOR_III = 2;
	/**
	 * ID Rotor IV
	 */
	const ENIGMA_ROTOR_IV = 3;
	/**
	 * ID Rotor V
	 */
	const ENIGMA_ROTOR_V = 4;
	/**
	 * ID Rotor VI
	 * only available in model Kriegsmarine M3 and M4
	 */
	const ENIGMA_ROTOR_VI = 5;
	/**
	 * ID Rotor VII
	 * only available in model Kriegsmarine M3 and M4
	 */
	const ENIGMA_ROTOR_VII = 6;
	/**
	 * ID Rotor VII
	 * only available in model Kriegsmarine M3 and M4
	 */
	const ENIGMA_ROTOR_VIII = 7;
	/**
	 * ID Rotor BETA
	 * only available in model Kriegsmarine M4 as 'Greek rotor'
	 */
	const ENIGMA_ROTOR_BETA = 8;
	/**
	 * ID Rotor GAMMA
	 * only available in model Kriegsmarine M4 as 'Greek rotor'
	 */
	const ENIGMA_ROTOR_GAMMA = 9;

	/**
	 * ID Reflector B
	 */
	const ENIGMA_REFLECTOR_B = 0;
	/**
	 * ID Reflector C
	 */
	const ENIGMA_REFLECTOR_C = 1;
	/**
	 * ID Reflector B Thin
	 * only available in model Kriegsmarine M4
	 */
	const ENIGMA_REFLECTOR_BTHIN = 2;
	/**
	 * ID Reflector C Tthin
	 * only available in model Kriegsmarine M4
	 */
	const ENIGMA_REFLECTOR_CTHIN = 3;

	const ENIGMA_KEY_A = 0;
	const ENIGMA_KEY_B = 1;
	const ENIGMA_KEY_C = 2;
	const ENIGMA_KEY_D = 3;
	const ENIGMA_KEY_E = 4;
	const ENIGMA_KEY_F = 5;
	const ENIGMA_KEY_G = 6;
	const ENIGMA_KEY_H = 7;
	const ENIGMA_KEY_I = 8;
	const ENIGMA_KEY_J = 9;
	const ENIGMA_KEY_K = 10;
	const ENIGMA_KEY_L = 11;
	const ENIGMA_KEY_M = 12;
	const ENIGMA_KEY_N = 13;
	const ENIGMA_KEY_O = 14;
	const ENIGMA_KEY_P = 15;
	const ENIGMA_KEY_Q = 16;
	const ENIGMA_KEY_R = 17;
	const ENIGMA_KEY_S = 18;
	const ENIGMA_KEY_T = 19;
	const ENIGMA_KEY_U = 20;
	const ENIGMA_KEY_V = 21;
	const ENIGMA_KEY_W = 22;
	const ENIGMA_KEY_X = 23;
	const ENIGMA_KEY_Y = 24;
	const ENIGMA_KEY_Z = 25;

	/**
	 * Size of the Enigma alphabet
	 */
	const ENIGMA_ALPHABET_SIZE = 26;

	/**
	 * encoding table
	 * eg.: ENIGMA_KEY_A=>"A = ENIGMA_KEY_B=>"B = ...
	 */
	public $ENIGMA_ALPHABET;

	/**
	 * stores the setup for all available rotors
	 * fields are
	 * key: ID of the rotor
	 * wiring: the setup for the wiring of a rotor
	 * used: IDs of models, this rotos can be used in
	 * notches: the turnover positions of a rotor
	 */
	public $ENIGMA_ROTORS;

	/**
	 * stores the setup for all available reflectors
	 * fields are
	 * key: ID of the reflector
	 * wiring: the setup for the wiring of a reflector
	 * used: IDs of models, this rotos can be used in
	 */
	public $ENIGMA_REFLECTORS;

	public function __construct()
	{
		$this->ENIGMA_ALPHABET = array( self::ENIGMA_KEY_A => "A",
										self::ENIGMA_KEY_B => "B",
										self::ENIGMA_KEY_C => "C",
										self::ENIGMA_KEY_D => "D",
										self::ENIGMA_KEY_E => "E",
										self::ENIGMA_KEY_F => "F",
										self::ENIGMA_KEY_G => "G",
										self::ENIGMA_KEY_H => "H",
										self::ENIGMA_KEY_I => "I",
										self::ENIGMA_KEY_J => "J",
										self::ENIGMA_KEY_K => "K",
										self::ENIGMA_KEY_L => "L",
										self::ENIGMA_KEY_M => "M",
										self::ENIGMA_KEY_N => "N",
										self::ENIGMA_KEY_O => "O",
										self::ENIGMA_KEY_P => "P",
										self::ENIGMA_KEY_Q => "Q",
										self::ENIGMA_KEY_R => "R",
										self::ENIGMA_KEY_S => "S",
										self::ENIGMA_KEY_T => "T",
										self::ENIGMA_KEY_U => "U",
										self::ENIGMA_KEY_V => "V",
										self::ENIGMA_KEY_W => "W",
										self::ENIGMA_KEY_X => "X",
										self::ENIGMA_KEY_Y => "Y",
										self::ENIGMA_KEY_Z => "Z" );

		$this->ENIGMA_ROTORS = array( array( "key" => self::ENIGMA_ROTOR_I, "wiring" => "EKMFLGDQVZNTOWYHXUSPAIBRCJ", "used" => array( self::ENIGMA_WM, self::ENIGMA_KM_M3, self::ENIGMA_KM_M4 ), "notches" => array( self::ENIGMA_KEY_Q ) ),
									  array( "key" => self::ENIGMA_ROTOR_II, "wiring" => "AJDKSIRUXBLHWTMCQGZNPYFVOE", "used" => array( self::ENIGMA_WM, self::ENIGMA_KM_M3, self::ENIGMA_KM_M4 ), "notches" => array( self::ENIGMA_KEY_E ) ),
									  array( "key" => self::ENIGMA_ROTOR_III, "wiring" => "BDFHJLCPRTXVZNYEIWGAKMUSQO", "used" => array( self::ENIGMA_WM, self::ENIGMA_KM_M3, self::ENIGMA_KM_M4 ), "notches" => array( self::ENIGMA_KEY_V ) ),
									  array( "key" => self::ENIGMA_ROTOR_IV, "wiring" => "ESOVPZJAYQUIRHXLNFTGKDCMWB", "used" => array( self::ENIGMA_WM, self::ENIGMA_KM_M3, self::ENIGMA_KM_M4 ), "notches" => array( self::ENIGMA_KEY_J ) ),
									  array( "key" => self::ENIGMA_ROTOR_V, "wiring" => "VZBRGITYUPSDNHLXAWMJQOFECK", "used" => array( self::ENIGMA_WM, self::ENIGMA_KM_M3, self::ENIGMA_KM_M4 ), "notches" => array( self::ENIGMA_KEY_Z ) ),
									  array( "key" => self::ENIGMA_ROTOR_VI, "wiring" => "JPGVOUMFYQBENHZRDKASXLICTW", "used" => array( self::ENIGMA_KM_M3, self::ENIGMA_KM_M4 ), "notches" => array( self::ENIGMA_KEY_M, self::ENIGMA_KEY_Z ) ),
									  array( "key" => self::ENIGMA_ROTOR_VII, "wiring" => "NZJHGRCXMYSWBOUFAIVLPEKQDT", "used" => array( self::ENIGMA_KM_M3, self::ENIGMA_KM_M4 ), "notches" => array( self::ENIGMA_KEY_M, self::ENIGMA_KEY_Z ) ),
									  array( "key" => self::ENIGMA_ROTOR_VIII, "wiring" => "FKQHTLXOCBJSPDZRAMEWNIUYGV", "used" => array( self::ENIGMA_KM_M3, self::ENIGMA_KM_M4 ), "notches" => array( self::ENIGMA_KEY_M, self::ENIGMA_KEY_Z ) ),
									  array( "key" => self::ENIGMA_ROTOR_BETA, "wiring" => "LEYJVCNIXWPBQMDRTAKZGFUHOS", "used" => array( self::ENIGMA_KM_M4 ), "notches" => array() ),
									  array( "key" => self::ENIGMA_ROTOR_GAMMA, "wiring" => "FSOKANUERHMBTIYCWLQPZXVGJD", "used" => array( self::ENIGMA_KM_M4 ), "notches" => array() ) );

		$this->ENIGMA_REFLECTORS = array( array( "key" => self::ENIGMA_REFLECTOR_B, "wiring" => "YRUHQSLDPXNGOKMIEBFZCWVJAT", "used" => array( self::ENIGMA_WM, self::ENIGMA_KM_M3 ) ),
										  array( "key" => self::ENIGMA_REFLECTOR_C, "wiring" => "FVPJIAOYEDRZXWGCTKUQSBNMHL", "used" => array( self::ENIGMA_WM, self::ENIGMA_KM_M3 ) ),
										  array( "key" => self::ENIGMA_REFLECTOR_BTHIN, "wiring" => "ENKQAUYWJICOPBLMDXZVFTHRGS", "used" => array( self::ENIGMA_KM_M4 ) ),
										  array( "key" => self::ENIGMA_REFLECTOR_CTHIN, "wiring" => "RDOBJNTKVEHMLFCWZAXGYIPSUQ", "used" => array( self::ENIGMA_KM_M4 ) )
		);
	}

	/**
	 * converts a character into its pendant in the Enigma alphabet
	 * @param string character to convert
	 * @return integer represention of a character in the Enigma alphabet
	 */
	function enigma_l2p($l)
	{
		return array_search(strtoupper($l), $this->ENIGMA_ALPHABET);
	}

	/**
	 * converts an element of the Enigma alphabet to 'our' alphabet
	 * @param integer element to be converted
	 * @return string resulting character
	 */
	function enigma_p2l($p)
	{
		return $this->ENIGMA_ALPHABET[$p];
	}
}
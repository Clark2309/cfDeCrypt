<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chu
 * Date: 21.07.13
 * Time: 19:51
 * To change this template use File | Settings | File Templates.
 */

namespace cf\cfDeCryptBundle\Entity;

use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaConstants;

class EnigmaDecoding
{
	protected $encodedText;
	protected $decodedText;
	protected $enigmaModel;
	protected $enigmaRotor1;
	protected $enigmaRotor2;
	protected $enigmaRotor3;
	protected $enigmaRotor4;
	protected $enigmaReflector;

	public function getRotors()
	{
		$ret = array();

		switch ( $this->getEnigmaModel() ) {
			case EnigmaConstants::ENIGMA_WM:
				$ret = array( EnigmaConstants::ENIGMA_ROTOR_1 => $this->getEnigmaRotor1(),
							  EnigmaConstants::ENIGMA_ROTOR_2 => $this->getEnigmaRotor2(),
							  EnigmaConstants::ENIGMA_ROTOR_3 => $this->getEnigmaRotor3() );
				break;
			case EnigmaConstants::ENIGMA_KM_M3:
				// TODO: Return other Rotors.
				break;
			case EnigmaConstants::ENIGMA_KM_M4:
				// TODO: Return other Rotors.
				break;
		};
		return $ret;
	}

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

	/**
	 * @return mixed
	 */
	public function getEnigmaModel()
	{
		return $this->enigmaModel;
	}

	/**
	 * @param mixed $enigmaModel
	 */
	public function setEnigmaModel($enigmaModel)
	{
		$this->enigmaModel = $enigmaModel;
	}

	/**
	 * @return mixed
	 */
	public function getEnigmaRotor1()
	{
		return $this->enigmaRotor1;
	}

	/**
	 * @param mixed $enigmaRotor1
	 */
	public function setEnigmaRotor1($enigmaRotor1)
	{
		$this->enigmaRotor1 = $enigmaRotor1;
	}

	/**
	 * @return mixed
	 */
	public function getEnigmaRotor2()
	{
		return $this->enigmaRotor2;
	}

	/**
	 * @param mixed $enigmaRotor2
	 */
	public function setEnigmaRotor2($enigmaRotor2)
	{
		$this->enigmaRotor2 = $enigmaRotor2;
	}

	/**
	 * @return mixed
	 */
	public function getEnigmaRotor3()
	{
		return $this->enigmaRotor3;
	}

	/**
	 * @param mixed $enigmaRotor3
	 */
	public function setEnigmaRotor3($enigmaRotor3)
	{
		$this->enigmaRotor3 = $enigmaRotor3;
	}

	/**
	 * @return mixed
	 */
	public function getEnigmaReflector()
	{
		return $this->enigmaReflector;
	}

	/**
	 * @param mixed $enigmaReflector
	 */
	public function setEnigmaReflector($enigmaReflector)
	{
		$this->enigmaReflector = $enigmaReflector;
	}

	/**
	 * @return mixed
	 */
	public function getEnigmaRotor4()
	{
		return $this->enigmaRotor4;
	}

	/**
	 * @param mixed $enigmaRotor4
	 */
	public function setEnigmaRotor4($enigmaRotor4)
	{
		$this->enigmaRotor4 = $enigmaRotor4;
	}
}
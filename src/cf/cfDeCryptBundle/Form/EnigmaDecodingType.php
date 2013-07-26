<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chu
 * Date: 21.07.13
 * Time: 19:48
 * To change this template use File | Settings | File Templates.
 */

namespace cf\cfDeCryptBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use cf\cfDeCryptBundle\Controller\Crypt\extEnigma\core\EnigmaConstants;

class EnigmaDecodingType extends AbstractDecodingType
{

	private $arModel = array( EnigmaConstants::ENIGMA_WM => "Wehrmacht/Luftwaffe (3 Rotoren)",
//                              EnigmaConstants::ENIGMA_KM_M3 => "Kriegsmarine M3 (3 Rotoren)",
//                              EnigmaConstants::ENIGMA_KM_M4 EnigmaConstants::=> "Kriegsmarine M4 (4 Rotoren)"
	);

	private $arRotors = array( EnigmaConstants::ENIGMA_ROTOR_I => "Rotor I",
							   EnigmaConstants::ENIGMA_ROTOR_II => "Rotor II",
							   EnigmaConstants::ENIGMA_ROTOR_III => "Rotor III",
							   EnigmaConstants::ENIGMA_ROTOR_IV => "Rotor IV",
							   EnigmaConstants::ENIGMA_ROTOR_V => "Rotor V",
//                                EnigmaConstants::ENIGMA_ROTOR_VI => "Rotor VI (nur in Model Kriegsmarine M3 und M4)",
//                                EnigmaConstants::ENIGMA_ROTOR_VII => "Rotor VII (nur in Model Kriegsmarine M3 und M4)",
//                                EnigmaConstants::ENIGMA_ROTOR_VIII => "Rotor VIII (nur in Model Kriegsmarine M3 und M4)",
//                                EnigmaConstants::ENIGMA_ROTOR_BETA => "Rotor BETA (nur in Model Kriegsmarine M4 als Greek Rotor)",
//                                EnigmaConstants::ENIGMA_ROTOR_GAMMA => "Rotor GAMMA (nur in Model Kriegsmarine M4 als Greek Rotor)"
	);

	private $arReflectors = array( EnigmaConstants::ENIGMA_REFLECTOR_B => "Reflektor B",
								   EnigmaConstants::ENIGMA_REFLECTOR_C => "Reflektor C",
//								   EnigmaConstants::ENIGMA_REFLECTOR_BTHIN => "Raflektor B schmal (nur in Model Kriegsmarine M4)",
//								   EnigmaConstants::ENIGMA_REFLECTOR_CTHIN => "Raflektor C schmal (nur in Model Kriegsmarine M4)"
	);

	private $arAlphabet = array( "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M",
								 "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z" );

	public function buildForm( FormBuilderInterface $builder, array $options )
	{
		$builder->add( 'enigmaModel', 'choice', array( 'choices' => $this->arModel ) );
		$builder->add( 'enigmaRotor1', 'choice', array( 'choices' => $this->arRotors ) );
		$builder->add( 'enigmaRotor2', 'choice', array( 'choices' => $this->arRotors ) );
		$builder->add( 'enigmaRotor3', 'choice', array( 'choices' => $this->arRotors ) );
		$builder->add( 'enigmaReflector', 'choice', array( 'choices' => $this->arReflectors ) );
		$builder->add( 'encodedText', 'textarea' );
		$builder->add( 'decode', 'submit' );
	}

	/**
	 * Returns the name of this type.
	 *
	 * @return string The name of this type
	 */
	public function getName()
	{
		return 'DecodingForm';
	}
}
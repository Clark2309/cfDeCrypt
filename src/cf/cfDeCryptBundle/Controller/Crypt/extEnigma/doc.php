 <?
/**
 * Enigma - emulator
 *
 * <pre>
 *
 * Information used to create this package come from http://en.wikipedia.org/wiki/Enigma_machine
 * and the manual from "Enigma Simulator" by D. Rijmenants
 * http://users.telenet.be/d.rijmenants/
 * I tested proper encryption against "Enigma Simulator" by D. Rijmenants
 * http://www.xat.nl/enigma/
 *
 * This package provides the funtionality of 3 different Enigma models:
 *  - Wehrmacht / Luftwaffe 3 rotor model
 *  - Kriegsmarine 3 rotor model
 *  - Kriegsmarine 4 rotor model
 *
 * Each model can be equipped with a different set of rotors and refelctors.
 * All in all are 10 types of rotors and 4 types of refelctors available.
 *
 * Wehrmacht / Luftwaffe 3 rotor model uses:
 * rotors: I, II, III, IV, V
 * reflectors: B, C
 *
 * Kriegsmarine 3 rotor model uses:
 * rotors: I, II, III, IV, V, VI, VII, VIII
 * reflectors: B, C
 *
 * Kriegsmarine 4 rotor model uses:
 * rotors: I, II, III, IV, V, VI, VII, VIII, Beta, Gamma
 * reflectors: B Thin, C Thin
 *
 * Each rotor and reflector provides a unique wiring, which can not be changed.
 * Settings are:
 * Contacts  = ABCDEFGHIJKLMNOPQRSTUVWXYZ
 *  I        = EKMFLGDQVZNTOWYHXUSPAIBRCJ
 *  II       = AJDKSIRUXBLHWTMCQGZNPYFVOE
 *  III      = BDFHJLCPRTXVZNYEIWGAKMUSQO
 *  IV       = ESOVPZJAYQUIRHXLNFTGKDCMWB
 *  V        = VZBRGITYUPSDNHLXAWMJQOFECK
 *  VI       = JPGVOUMFYQBENHZRDKASXLICTW
 *  VII      = NZJHGRCXMYSWBOUFAIVLPEKQDT
 *  VIII     = FKQHTLXOCBJSPDZRAMEWNIUYGV
 *  Beta     = LEYJVCNIXWPBQMDRTAKZGFUHOS
 *  Gamma    = FSOKANUERHMBTIYCWLQPZXVGJD
 *  B        = YRUHQSLDPXNGOKMIEBFZCWVJAT
 *  C        = FVPJIAOYEDRZXWGCTKUQSBNMHL
 *  B Thin   = ENKQAUYWJICOPBLMDXZVFTHRGS
 *  C Thin   = RDOBJNTKVEHMLFCWZAXGYIPSUQ
 * Contacts  = ABCDEFGHIJKLMNOPQRSTUVWXYZ
 *
 * Rotors can have notches, which indicate the position where the next rotor is advanced.
 * e.g.: Notch at position Q means, if rotor steps from Q to R, the next rotor is advanced.
 * These positions are:
 * I   = Q
 * II  = E
 * III = V
 * IV  = J
 * V   = Z
 * VI, VII, VIII = Z + M
 *
 * Each Rotor can be only used in one position at a time.
 * Rotors I..VIII can be mounted at position 1, 2 or 3, wherelse rotors Beta and Gamma
 * can only be used at position 4.
 * Aditionally, Beta and Gamma can only be used in combination with reflector B Thin or
 * C Thin, the others only with reflector B or C.
 *
 * !!!important!!!
 * These conditions only apply if a proper emulation of the original Enigma is desired.
 * This implementation allows to setup the rotors in any order, so its up to the user to
 * take care of the order of rotors.
 *
 * <b>usage:</b>
 *
 * to create a new instance call the constructor with the following parameters:
 * $enigma = new Enigma(integer $model, array $rotors, integer $reflector);
 *   $model ... ENIGMA_MODEL_WMLW | ENIGMA_MODEL_KMM3 | ENIGMA_MODEL_KMM4
 *    defines the model to emulate
 *   $rotors ... IDs to identify the rotors for the initial setup
 *    number of IDs has to match the number needed by the specific model
 *   $reflector ... ID to identify the reflector for the initial setup
 *
 * to en- or decode a letter, use
 * string $enigma->encodeLetter (string $letter)
 *
 * to change the setup of the Enigma, these functions can be used:
 *
 * void $enigma->mountRotor (integer $position, integer $rotor);
 *   replace a rotor by another
 *
 * void $enigma->mountReflector (integer $reflector);
 *   replace a reflector by another
 *
 * void $enigma->setPosition (integer $position, string $letter)
 *   turn a rotor to a new position
 *
 * void $enigma->setRingstellung (integer $position, string $letter)
 *   turn the ringstellungon a rotor to a new position
 *
 * void $enigma->plugLetters (string $letter1, string $letter2)
 *   connect two letters on the plugboard
 *
 * void $enigma->unplugLetters (string $letter)
 *   disconnect two letters on the plugboard
 *
 * the current position of a rotor can be obtained by
 * string $enigma->getPosition (integer $position)
 *
 *
 * </pre>
 *
 */
?>
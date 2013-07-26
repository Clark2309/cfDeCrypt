<?

$rotors = array(ENIGMA_ROTOR_I, ENIGMA_ROTOR_II, ENIGMA_ROTOR_III);

$enigma = new Enigma(ENIGMA_WM, $rotors, ENIGMA_REFLECTOR_B);

$enigma->setPosition(ENIGMA_ROTOR_1, "M");

$enigma->setRingstellung(ENIGMA_ROTOR_1, "B");

$enigma->plugLetters("A", "C");
$enigma->plugLetters("B", "Z");

$enigma->unplugLetters("A");


$l = "A";
echo "before: ".$enigma->getPosition(ENIGMA_ROTOR_3)." ".$enigma->getPosition(ENIGMA_ROTOR_2)." ".$enigma->getPosition(ENIGMA_ROTOR_1)."<br>";
echo $l."->".$enigma->encodeLetter($l)."<br>";
echo "after: ".$enigma->getPosition(ENIGMA_ROTOR_3)." ".$enigma->getPosition(ENIGMA_ROTOR_2)." ".$enigma->getPosition(ENIGMA_ROTOR_1)."<br>";

?>
<pre>
<?print_r($enigma);?>
</pre>

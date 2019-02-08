<?php

class Zmogus
{
    public $vardas;
    public $pavarde;

    function __construct($vardas, $pavarde) {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;

    }

}

//$zmogus1 = new Zmogus('Jonas', 'Jonaitis');
//$zmogus2 = new Zmogus('Petras', 'Petraitis');
//$zmogus3 = new Zmogus('Vardenis', 'Pavardenis');

$zmones = [
    new Zmogus('Jonas', 'Jonaitis'),
    new Zmogus('Petras', 'Petraitis'),
    new Zmogus('Vardenis', 'Pavardenis')];
var_dump($zmones);
foreach ($zmones as $zmogus ){
    echo $zmogus->vardas ." " . $zmogus->pavarde . '<br>';
}
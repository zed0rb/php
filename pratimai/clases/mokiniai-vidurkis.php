<html>
<head>
    <title>Demo</title>
</head>
<body>
<?php
class Zmogus
{
    public $vardas;
    public $pavarde;

    function __construct($vardas, $pavarde) {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
    }

    function pilnasVardas() {
        return $this->vardas . ' ' . $this->pavarde;
    }
}

class Mokinys extends Zmogus
{
    public $lygis;      // pvz 6a ar 9b
    public $dalykai;    // masyvas mokinio dalykų

    /**
     * Mokinys constructor.
     * @param $lygis
     * @param $dalykai
     */
    public function __construct($vardas, $pavarde, $lygis, $dalykai)
    {
        parent::__construct($vardas, $pavarde);
        $this->lygis = $lygis;
        $this->dalykai = $dalykai;
    }

    public function vidurkis() {
        $sum = 0;
        foreach ($this->dalykai as $dalykas) {
            $sum += $dalykas->vidurkis();
        }
        return $sum / count($this->dalykai);
    }

}

class Dalykas {
    public $pavadinimas;    // tekstas, pvz: "lietuviu k."
    public $pazymiai;       // masyvas pazymiu, pvz: [6, 8, 9, 7, 5]

    /**
     * Dalykas constructor.
     * @param $pavadinimas
     * @param $pazymiai
     */
    public function __construct($pavadinimas, $pazymiai)
    {
        $this->pavadinimas = $pavadinimas;
        $this->pazymiai = $pazymiai;
    }

    public function vidurkis() {
        return array_sum($this->pazymiai) / count($this->pazymiai);
    }
}

//            $mokinys1 = new Mokinys('Petras', 'Petraitis',
//                "3a", [
//                        new Dalykas("lietuviu k.", [6, 8, 5, 3]),
//                        new Dalykas("matematika", [9, 8, 10, 8])
//                ] );
//
//            var_dump($mokinys1);

$mokiniai = [
    new Mokinys('Petras', 'Petraitis',
        "3a", [
            new Dalykas("lietuviu k.", [6, 8, 5, 3]),
            new Dalykas("matematika", [9, 8, 10, 8])
        ]),
    new Mokinys('Jonas', 'Petraitis',
        "3b", [
            new Dalykas("lietuviu k.", [6, 8, 9, 3]),
            new Dalykas("matematika", [9, 9, 9, 9])
        ]),
    new Mokinys('Ona', 'Petraitis',
        "4a", [
            new Dalykas("lietuviu k.", [9, 8, 9, 8]),
            new Dalykas("matematika", [9, 8, 10, 9])
        ])
];

usort($mokiniai, function(Mokinys $m1, Mokinys $m2) {
    //return $m2->vidurkis() <=> $m1->vidurkis();

    if ($m1->vidurkis() < $m2->vidurkis()) {
        return 1;
    }
    if ($m1->vidurkis() == $m2->vidurkis()) {
        return 0;
    }
    return -1;
});

foreach ($mokiniai as $mokinys) {
    echo "<br>" . $mokinys->pilnasVardas() . " " . $mokinys->vidurkis();
    foreach ($mokinys->dalykai as $dalykas) {
        echo "<br>" . $dalykas->pavadinimas . " " . $dalykas->vidurkis();
    }
    echo "<hr>";
}
?>
</body>
</html
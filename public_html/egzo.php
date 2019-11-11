
<?php

/**
 * Paprastoji KlasÄ— - propertieÄ�iÅ³ ir metodÅ³ rinkinys
 * 
 * Property (Ä�iai) - Kintamieji
 * Metodai - Funkcijos
 * 
 * Pasiekiamumo Scope'ai:
 * private, protected, public
 */
class ManoKlase {

    // Property/Metodas pasiekiamas tik iÅ¡ klasÄ—s vidaus 
    private $privateProperty = 'privatePropertyValue is ManoKlase';
    // Property/Metodas pasiekamas iÅ¡ klasÄ—s vidaus ir extend'inant klasÄ™
    protected $protectedProperty = 'protectedPropertyValue is ManoKlase';
    // Visada pasiekamas, Ä¯skaitant ir uÅ¾ klasÄ—s ribÅ³
    public $publicProperty = 'publicPropertyValue is ManoKlase';

    /**
     * Konstruktorius - 
     * metodas, kuris iÅ¡sikvieÄ�ia naujo objekto sukÅ«rimo metu
     * (magiÅ¡kas metodas. Jo negalima pakartotinai iÅ¡kviesti)
     */
    public function __construct($konstr_param_1, $konstr_param_2) {
        //Paramaterai $konstr_param_1, ir $konstr_param_2, paduodami 
        // sukuriant naujÄ… objektÄ…. Pvz.:
        // $obj = new ManoKlase(10, 20);
        //                      ^    ^
    }

    public function testPrivate() {
        return $this->privateProperty;
    }

    public function testProtected() {
        return $this->protectedProperty;
    }

    public function testPublic() {
        return $this->publicProperty;
    }

    /**
     * Destruktorius - 
     * metodas, kuris iÅ¡sikvieÄ�ia objekto prieÅ¡ pat susinaikinant objektui
     * Kada susinaikina objektas?
     *  * Pasibaugs visam kodui
     *  * unset($object)
     *  * jeigu obj. buvo sukurtas f-ijos viduje, tai Ä¯sivykdÅ¾ius f-ijai
     */
    public function __destruct() {
        // Destruktorius parametrÅ³ turÄ—ti negali
    }

}

/**
 * Extend'inanÄ�ioji klasÄ— - ji paveldi visas savybes iÅ¡ ManoKlase
 * + gali turÄ—ti ir savo unikaliÅ³ properÄ�iÅ³/metodÅ³
 * 
 * KÄ… paveldi?
 * ProperÄ�ius - protected ir public
 * Metodus - protected ir public
 * 
 */
class ManoIsplestineKlase extends ManoKlase {

    public function testPrivatePaveldeta() {
        // Neveiks Å¡itaip, nes private properÄ�iÅ³ nepaveldi
        // return $this->privateProperty;
        return 'Neveikia';
    }

    public function testProtectedPaveldeta() {
        return $this->protectedProperty;
    }

    public function testPublicPaveldeta() {
        return $this->publicProperty;
    }

}

$paprKlase = new ManoKlase('test_param_1', 'test_param_2');
$manoIsplKlase = new ManoIsplestineKlase('test_param_1', 'test_param_2');
?>
<html>
    <body>
        <h1>Paprastoji klasÄ— <pre>ManoKlase</pre></h1>
        <h2>Galima iÅ¡kviesti HTML'e tik public metodus:</h2>
        <ul>
            <li>
                <pre>
    // Property/Metodas pasiekiamas tik iÅ¡ klasÄ—s vidaus 
    private $privateProperty = 'privatePropertyValue is ManoKlase';

    public function testPrivate() {
        return $this->privateProperty;
    }
                </pre>
            </li>
            <li>$paprKlase->testPrivate(): <b><?php print $paprKlase->testPrivate(); ?></b></li>
            <li>
                <pre>
    // Property/Metodas pasiekamas iÅ¡ klasÄ—s vidaus ir extend'inant klasÄ™
    protected $protectedProperty = 'protectedPropertyValue is ManoKlase';

    public function testProtectedPaveldeta() {
        return $this->protectedProperty;
    }
                </pre>
            </li>
            <li>$paprKlase->testProtected(): <b><?php print $paprKlase->testProtected(); ?></b></li>
            <li>
                <pre>
    // Visada pasiekamas, Ä¯skaitant ir uÅ¾ klasÄ—s ribÅ³
    public $publicProperty = 'publicPropertyValue is ManoKlase';

    public function testPublicPaveldeta() {
        return $this->publicProperty;
    }
                </pre>
            </li>
            <li>$paprKlase->testPublic(): <b><?php print $paprKlase->testPublic(); ?></b></li>           
        </ul>
        <h2>Tiesiogiai pasiekti galima tik public properÄ�ius:</h2>
        <ul>
            <li>$paprKlase->privateProperty; <b>Negalima, nes private!</b></li>
            <li>$paprKlase->protectedProperty; <b>Negalima, nes protected!</b></li>
            <li>$paprKlase->publicProperty; <b><?php print $paprKlase->publicProperty; ?></b></li>           
        </ul>        

        <h1>Isplestine klasÄ— <pre>ManoIsplestineKlase</pre></h1>
        <h2>Galima iÅ¡kviesti HTML'e tik public metodus:</h2>
        <ul>
            <li>
                <pre>
    public function testPrivatePaveldeta() {
        // Neveiks Å¡itaip, nes private properÄ�iÅ³ nepaveldi
        // return $this->privateProperty;
        return 'Neveikia';
    }
                </pre>
            </li>            
            <li>$manoIsplKlase->testPrivatePaveldeta(): <b><?php print $manoIsplKlase->testPrivatePaveldeta(); ?></b></li>
            <li>
                <pre>
    public function testProtectedPaveldeta() {
        return $this->protectedProperty;
    }
                </pre>
            </li>
            <li>$manoIsplKlase->testProtectedPaveldeta(): <b><?php print $manoIsplKlase->testProtectedPaveldeta(); ?></b></li>
            <li>
                <pre>
    public function testPublicPaveldeta() {
        return $this->publicProperty;
    }
                </pre>
            </li>            
            <li>$manoIsplKlase->testPublicPaveldeta(): <b><?php print $manoIsplKlase->testPublicPaveldeta(); ?></b></li>           
        </ul>               
        <h2>NepamirÅ¡kime, kad ManoIsplestineKlase paveldi ir public + protected metodus iÅ¡ ManoKlase irgi:</h2>
        <ul>
            <li>$manoIsplKlase->testPublic(): <b><?php print $manoIsplKlase->testPublic(); ?></b></li>                       
            <li>$manoIsplKlase->testPrivate(): <b><?php print $manoIsplKlase->testPublic(); ?></b></li>                       
            <li>$manoIsplKlase->testProtected(): <b><?php print $manoIsplKlase->testPublic(); ?></b></li>                       
        </ul>               
    </body>
</html>


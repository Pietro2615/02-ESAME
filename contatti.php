<?php
require_once('utility.php');
ini_set("auto_detect_line_endings", true);
use Classi\Utility as UT; 
$inviato = UT::richiestaHTTP("inviato");
$inviato = ($inviato == null || $inviato != 1) ? false : true;

//recuperare i dati
if ($inviato) {
    $valido = 0;
    $nome = UT::richiestaHTTP("nome");
    $cognome = UT::richiestaHTTP("cognome");
    $email = UT::richiestaHTTP("email");
    $telefono = UT::richiestaHTTP("telefono");
    $età = UT::richiestaHTTP("età");
    $testo = UT::richiestaHTTP("testo");
    
    $clsErrore = 'class="errore" ';
    
    //validare i dati
    if (($nome !="") && UT::controllaRangeStringa($nome, 0, 25)) {
        $clsErroreNome = "";
    } else {
        $valido++;
        $clsErroreNome = $clsErrore;
        $nome = "";
    }
    if (($cognome !="") && UT::controllaRangeStringa($cognome, 0, 25)) {
        $clsErroreCognome = "";
    } else {
        $valido++;
        $clsErroreCognome = $clsErrore;
        $cognome = "";
    }
    if (($email != "") && UT::controllaRangeStringa($email, 10, 100) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $clsErroreEmail = "";
    } else {
        $valido++;
        $clsErroreEmail = $clsErrore;
        $email = "";
    }
    if (($telefono != "") && UT::controllaRangeStringa($telefono, 5, 20)) {
        $clsErroreTelefono = "";
    } else {
        $valido++;
        $clsErroreTelefono = $clsErrore;
        $telefono = "";
    }
    if (($età != "") && UT::controllaRangeStringa($età, 0, 3)) {
        $clsErroreEtà = "";
    } else {
        $valido++;
        $clsErroreEtà = $clsErrore;
        $età = "";
    }
    if (($testo != "") && UT::controllaRangeStringa($testo, 10, 500)) {
        $clsErroreTesto = "";
    } else {
        $valido++;
        $clsErroreTesto = $clsErrore;
        $testo = "";
    }
    
    $inviato = ($valido == 0) ? true : false;
} else {
    $nome = "";
    $cognome = "";
    $email = "";
    $telefono = "";
    $età = "";
    $testo = "";
    
    $clsErroreNome = "";
    $clsErroreCognome = "";
    $clsErroreEmail = "";
    $clsErroreTelefono = "";
    $clsErroreEtà = "";
    $clsErroreTesto = "";
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contatti</title>
<link rel="stylesheet" href="css/contatti.min.css" type="text/css">
</head>
<body>
<header>
<h1>CONTATTI</h1>
<nav>
<a href="index.php" class="nav">Home page</a> |
<a href="portfolio.php" class="nav">Portfolio</a> |
<a href="progetto.php" class="nav">Progetto</a>

</nav>
</header>
<h2>SEDE LEGALE</h2>
<div class="iframe"><iframe class="responsiveiframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22580.724125489804!2d11.09951375761425!3d44.97231390918027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477f993aa52d917d%3A0xf9505c13ec16a59e!2s46025%20Poggio%20Rusco%20MN!5e0!3m2!1sit!2sit!4v1701026747077!5m2!1sit!2sit" width="700" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    <h2>I MIEI CONTATTI</h2>
    <article>
    <ul>
    <li><b>CELLULARE:</b> +39 123456789</li>    
    <li><b>PEC:</b> nome.cognome@pec.it</li>    
    <li><b>MAIL:</b> mia@mail.com</li>  
    <li><b>SEDE:</b> Via Dante Alighieri, 19 (MN) 12345</li>
    </ul>   
    <ul>
    <li><b>INSTAGRAM:</b> nome.cognome</li> 
    <li><b>FACEBOOK:</b> nome.cognome</li>  
    <li><b>TWITTER:</b> nome.cognome</li>   
    <li><b>LINKEDIN:</b> nome.cognome</li>
    </ul> 
    </article>
    <?php
    if (!$inviato) {
        ?> 
        <main>
        <h2>RICHIEDI INFORMAZIONI</h2>
        <form action="contatti.php?inviato=1" method="POST">
        <div class="totale">
        <div class="col">
        <div><label for="nome">Nome *</label></div>
        <div><input type="text" <?php echo $clsErroreNome; ?> name="nome" id="nome" maxlength="25" placeholder="Inserisci il tuo nome" required value="<?php echo $nome; ?>"></div>
        <div><label for="cognome">Cognome *</label></div>
        <div><input type="text" <?php echo $clsErroreCognome; ?> name="cognome" id="cognome" maxlength="25" placeholder="Inserisci il tuo cognome" required value="<?php echo $cognome; ?>"></div>
        <div><label for="mail">Email *</label></div>
        <div><input type="email" <?php echo $clsErroreEmail; ?> name="email" id="email" minlength="10" maxlength="40" placeholder="Inserisci la tua Email" required value="<?php echo $email; ?>"></div>
        <div><label for="telefono">Telefono *</label></div>
        <div><input type="telefono" <?php echo $clsErroreTelefono; ?> name="telefono" id="telefono" minlength="5" maxlength="20" placeholder="Inserisci il tuo telefono" required value="<?php echo $telefono; ?>"></div>
        <div><label for="età">Età *</label></div>
        <div><input type="text" <?php echo $clsErroreEtà; ?> name="età" id="età" minlength="0" maxlength="3" placeholder=" Inserisci la tua età" required value="<?php echo $età; ?>"></div>
        <section><input type="checkbox" name="dati" id="dati" required>
        <label for="dati">Trattamento dei dati personali</label></section>
        </div>
        <div class="col">
        <textarea name="testo" <?php echo $clsErroreTesto; ?> id="testo" cols="40" rows="20" minlength="10" maxlength="500" placeholder="Scrivi eventuali dubbi o proposte.." <?php echo $testo; ?>></textarea>
        <section><input type="submit"></section>
        </div>
        </div>
        </form>
        <?php
    } else {
        $stringa = "<br><strong>Nome:</strong> %s<br>" .
            "<strong>Cognome:</strong> %s<br>" .
            "<strong>Email:</strong> %s<br>" .
            "<strong>Telefono:</strong> %s<br>" . 
            "<strong>Età:</strong> %s<br>" .
            "<strong>Testo:</strong> %s<br>" ;

            $stringa = sprintf($stringa, $nome, $cognome, $email, $telefono, $età, $testo);
        echo "<h1>Grazie per averci contattato</h1>";

        $file = 'ricezionemoduli.txt';

        $stringa = str_repeat("-", 30) . chr(10) . $stringa . chr(10) . str_repeat("-", 30);
        $rit = UT::scriviTesto($file, $stringa);

        if ($rit) {
            echo "<br>" . str_repeat("-", 30) . "<br>Modulo inviato correttamente<br>";
        } else {
            echo "<br>" . str_repeat("-", 30) . "<br>Problema nell'invio del modulo<br>";
        }
    }
    ?>
    </main>
    </body>
    </html>
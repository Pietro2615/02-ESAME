<?php
require_once('utility.php');
ini_set("auto_detect_line_endings", true);
use Classi\Utility as UT;

$file = "progetto.json";
$arr = json_decode(UT::leggiTesto($file));
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progetto</title>
    <link rel="stylesheet" href="css/progetto.min.css" type="text/css">
</head>
<body>
    <header>
        <h1>PROGETTO</h1>
        <nav>
            <a href="index.php" class="nav">Home page</a> |
            <a href="portfolio.php" class="nav">Portfolio</a> |
            <a href="contatti.php" class="nav">Contatti</a>
        </nav>
    </header>
    <main>
        <img src="img/sfondoprogetti.jpg" alt="foto progetto">
        <p id="testo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, dicta rem quisquam laudantium nihil placeat beatae labore commodi dolorem voluptate sequi, saepe quae adipisci. Earum excepturi dolore nisi placeat ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi vitae doloremque vero in? Ipsam dolore rerum dicta, vitae doloremque enim voluptas, ullam et perferendis totam sapiente quaerat neque. Perspiciatis, similique? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, nobis! Explicabo dolor amet soluta repudiandae atque quam laboriosam culpa temporibus vitae quibusdam eos, reprehenderit, dolorem voluptatem ratione fugit. Doloremque, earum.</p>
    </main>
    <button><a id="bottone" href="contatti.php">Contattami per un preventivo</a></button>
    <h2>CLIENTI RECENTI</h2>
    <div class="clienti">
        <?php
        foreach ($arr as $link){
            $n = $link->id;
            printf('<div class="%s"><b>%s</b></div>', $link->class, $link->nome);
        }
        ?>
    </div>
    <aside>
        <a class="aside" href="index.php">Home page</a>
    </aside>
    <footer class="riga1">
        <div class="colonna1">
            <h5>Vienimi a trovare in:</h5>
            <a class="footer" href="contatti.php">
                <address>Via Dante Alighieri, 19</address>
                <address>12345 Mantova (MN)</address>
                <address>Italia</address>
            </a>
        </div>
        <div class="colonna1">
            <h5>Contattami:</h5>
            <a class="footer" href="contatti.php">
                <address>miamail@gmail.com</address>
                <address>+39 123456789</address>
            </a>
            <hr>
            <p>Cookies Policy Privacy Policy</p>
        </div>
        <div class="colonna1">
            <h5>Seguimi su:</h5>
            <a class="footer" href="contatti.php">
                <address>Facebook</address>
                <address>Twitter</address>
                <address>Instagram</address>
            </a>
        </div>
    </footer>
</body>
</html>
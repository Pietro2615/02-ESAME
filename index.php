<?php
require_once('utility.php');
ini_set("auto_detect_line_endings", true);
use Classi\Utility as UT;

$file = "index.json";
$arr = json_decode(UT::leggiTesto($file));
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="css/index.min.css" type="text/css">
</head>
<body>
    <div class="sfondo">
        <article>
            <h2 id="titolo">HELLO WORLD!</h2>
            <p>I'M PIETRO A FREELANCE GRAPHIC AND WEB DESIGNER</p>
            <div class="dropdown">
                <button class="dropbtn">DISCOVER MORE!</button>
                <div class="dropdown-content">
                    <a href="portfolio.php">Portfolio</a>
                    <a href="progetto.php">Progetto</a>
                    <a href="contatti.php">Contatti</a>
                </div>
            </div>
        </article>
    </div>
    <div class="chisono">
        <h2 id="titoletto">MI PRESENTO..</h2>
        <main class="riga">
            <?php
            foreach ($arr as $link){
                $n = $link->id;
                printf('<p class="%s">%s</p>', $link->class, $link->testo);
            }
            ?>
        </main>
    </div>
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
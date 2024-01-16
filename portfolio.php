<?php
require_once('utility.php');
ini_set("auto_detect_line_endings", true);
use Classi\Utility as UT;

$file = "portfolio.json";
$arr = json_decode(UT::leggiTesto($file));
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="css/portfolio.min.css" type="text/css">
</head>
<body>
    <a id="inizio"></a>
    <header>
        <h1>PORTFOLIO</h1>
        
        <nav>
            <a href="index.php" class="nav">Home page</a> |
            <a href="progetto.php" class="nav">Progetto</a> |
            <a href="contatti.php" class="nav">Contatti</a>
        </nav>
        <p id="testo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis temporibus eos alias eius esse, quia sed ipsa illo labore ullam perspiciatis error vitae soluta a nobis placeat assumenda neque fugit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus enim dolor atque nobis blanditiis eaque, sapiente error, harum eligendi eius, maiores inventore fuga! Reiciendis id tenetur beatae debitis consequuntur architecto!</p>
    </header>
    <h2>I MIEI PROGETTI</h2>
    <main>
            <?php
            foreach ($arr as $link){
                $n = $link->id;
                printf('<section><h3>%s</h3><div class="%s"><a href="%s" class="%s">%s</a></div></section>', $link->h, $link->class1, $link->href, $link->class2, $link->oggetto);
            }
            ?>
    </main>
    <aside>
        <a class="aside" href="index.php">Home page</a>  |
        <a class="aside" href="#inizio">Torna a inizio pagina</a>
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
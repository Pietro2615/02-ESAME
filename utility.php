<?php
namespace Classi;



class Utility 
{
    /**
    * @param string $stringa
    * @param integer $min
    * @param integer $max
    * @return boolean
    */
    public static function controllaRangeStringa($stringa, $min = null, $max = null) {
        $rit = 0;
        $n = strlen($stringa);
        if ($min != null && $n < $min) {
            $rit++;
        }
        if ($max != null && $n > $max) {
            $rit++;
        }
        return ($rit == 0);
    }
    /**
    * @param string $file
    * @return boolean|string
    */
    public static function leggiTesto($file) 
    {
        $rit = false;
        if (!$fp = fopen($file, 'r')) {
            echo ("Non posso aprire il file $file<br>");
        } else {
            if (is_readable($file) === false) {
                echo ("Il file $file non è leggibile");
            } else {
                $rit = fread($fp, filesize($file));
            }
        }
        fclose($fp);
        return $rit;
    }
    /**
     * @param string $file
     * @return boolean|array 
     * 
     */
    public static function leggiTestoCSV($file)
    {
        $rit = false;
        $riga = 0;
        if (!$fp = fopen($file, 'r')) {
            echo ("Non posso aprire il file $file<br>");
        } else {
            if (is_readable($file) === false) {
                echo ("Il file $file non è leggibile");
            } else {
                while (($data = fgetcsv($fp, null, ";")) !== false) {
                    $rit[$riga] = $data;
                    $riga++;    
                }
            }
        }
        fclose($fp);
        return $rit;
    }
/**
 * @param string
 * @return string|null
 */
public static function richiestaHTTP ($str)
{
    $rit = null;
    if ($str !== null) {
        if (isset($_POST[$str])) {
            $rit = $_POST[$str];
        } elseif (isset($_GET[$str])) {
            $rit = $_GET[$str];
        }
    }
    return $rit;
  }
  /**
   * @param string $file
   * @param string $stringa
   * @param boolean $commenta
   * @return boolean
   */
  public static function scriviTesto($file, $stringa, $commenta = false) 
  {
    $rit = false;
    if (!$fp = fopen($file, 'a')) {
        echo ("Non posso aprire il file $file<br>");
    } else {
        if (is_writable($file) === false) {
            echo ("Il file $file non è scrivibile");
        } else {
            if (!fwrite($fp, $stringa)) {
                echo ("Non posso scrivere il file $file<br>");
            } else {
                echo ("Operazione completata<br>Di seguito il riepilogo dei tuoi dati:<br>" . str_repeat($stringa, 1));
                $rit =true;
            }
        }
    }
    fclose($fp);
    return $rit;
  }
}
define("COMMENTA", true);

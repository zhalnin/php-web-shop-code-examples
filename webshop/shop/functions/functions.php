<?php
	defined('myeshop') or die('Äîñòóï çàïðåù¸í!');
function clear_string($cl_str)
{
    
 $cl_str = strip_tags($cl_str);
 $cl_str = mysql_real_escape_string($cl_str);
 $cl_str = trim($cl_str);  
    
  return $cl_str;              
}

function fungenpass()
{
    $number = 7;

    $arr = array('a','b','c','d','e','f',

                 'g','h','i','j','k','l',

                 'm','n','o','p','r','s',

                 't','u','v','x','y','z',

                 '1','2','3','4','5','6',

                 '7','8','9','0');

    // Ãåíåðèðóåì ïàðîëü

    $pass = "";

    for($i = 0; $i < $number; $i++)

    {

      // Âû÷èñëÿåì ñëó÷àéíûé èíäåêñ ìàññèâà

      $index = rand(0, count($arr) - 1);

      $pass .= $arr[$index];

    }


return $pass;
}


function send_mail($from,$to,$subject,$body)
{
	$charset = 'utf-8';
	mb_language("ru");
	$headers  = "MIME-Version: 1.0 \n" ;
	$headers .= "From: <".$from."> \n";
	$headers .= "Reply-To: <".$from."> \n";
	$headers .= "Content-Type: text/html; charset=$charset \n";
	
	$subject = '=?'.$charset.'?B?'.base64_encode($subject).'?=';

	mail($to,$subject,$body,$headers);
}



// Ãðóïïèðîâêà öåí ïî ðàçðÿäàì.
//function group_numerals($int){
//    
//       switch (strlen($int)) {
//
//	    case '4':
//        
//        $price = substr($int,0,1).' '.substr($int,1,4);
//
//	    break;
//
//	    case '5':
//        
//        $price = substr($int,0,2).' '.substr($int,2,5);
//
//	    break;
//
//	    case '6':
//        
//        $price = substr($int,0,3).' '.substr($int,3,6);
//
//	    break;
//
//	    case '7':
//        
//        $price = substr($int,0,1).' '.substr($int,1,3).' '.substr($int,4,7);
//
//	    break;
//        
//	    default:
//        
//        $price = $int;
//        
//	    break;
//
//	}
//    return $price; 
//}

/**
 * Принимаем цену как есть и возвращаем отформатированную строку
 * Пример: 3990
 * Получаем: 3 990
 * @param $value
 * @return mixed
 */
function group_numerals($value) {
    // в number_format() - получаем отформатированную строку - 3,990
    // заменяем запятую пробелом - 3 990
    $price = preg_replace('|\,|',' ', number_format($value)); 
    return $price; // возвращаем отформатированную строку
}


function ftranslite($name){

 $name=preg_replace("/[\s+\.\,]/","-",$name);
 $name=preg_replace("/[\"\'\!\?\(\)\:\$\%]/","",$name); 

 static $trans= array(
 'à'=>'a', 'á'=>'b', 'â'=>'v', 'ã'=>'g', 'ä'=>'d', 'å'=>'e', 'æ'=>'zh', 'ç'=>'z',
 'è'=>'i', 'é'=>'y', 'ê'=>'k', 'ë'=>'l', 'ì'=>'m', 'í'=>'n', 'î'=>'o', 'ï'=>'p',
 'ð'=>'r', 'ñ'=>'s', 'ò'=>'t', 'ó'=>'u', 'ô'=>'f', 'û'=>'i', 'ý'=>'e', 'À'=>'A',
 'Á'=>'B', 'Â'=>'V', 'Ã'=>'G', 'Ä'=>'D', 'Å'=>'E', 'Æ'=>'ZH', 'Ç'=>'Z', 'È'=>'I',
 'É'=>'Y', 'Ê'=>'K', 'Ë'=>'L', 'Ì'=>'M', 'Í'=>'N', 'Î'=>'O', 'Ï'=>'P', 'Ð'=>'R',
 'Ñ'=>'S', 'Ò'=>'T', 'Ó'=>'U', 'Ô'=>'F', 'Û'=>'I', 'Ý'=>'E', '¸'=>"yo", 'õ'=>"h",
 'ö'=>"ts", '÷'=>"ch", 'ø'=>"sh", 'ù'=>"shch", 'ú'=>"", 'ü'=>"", 'þ'=>"yu", 'ÿ'=>"ya",
 '¨'=>"YO", 'Õ'=>"H", 'Ö'=>"TS", '×'=>"CH", 'Ø'=>"SH", 'Ù'=>"SHCH", 'Ú'=>"", 'Ü'=>"",
 'Þ'=>"YU", 'ß'=>"YA"
 );
 
 $strstring = strtr($name, $trans) ;
 
 return strtolower($strstring) ;
 }



?>

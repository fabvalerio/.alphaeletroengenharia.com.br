<?php


//Link

$urlQrCode = $__config->exibi['c_url'].'/ver/'.$InputSQL->exibi['pag_id'];

QRcode::png($urlQrCode, "QR_code.png", QR_ECLEVEL_L, 10, 2);

//=================================================================
//Texto
/*
  QRcode::png('PHP QR Code :)');
 */

//=================================================================
//Celular
 /*
	 QRcode::png('tel:'(049)012-345-678'', EXAMPLE_TMP_SERVERPATH.'020.png', QR_ECLEVEL_L, 3); 
 */

//=================================================================
//Email
/*	 
    $tempDir = EXAMPLE_TMP_SERVERPATH; 
     
    // here our data 
    $email = 'john.doe@example.com'; 
    $subject = 'question'; 
    $body = 'please write your question here'; 
     
    // we building raw data 
    $codeContents = 'mailto:'.$email; 
     
    // generating 
    QRcode::png($codeContents, $tempDir.'022.png', QR_ECLEVEL_L, 3); 
*/

//=================================================================
 //Contato Compelto
 /*
 // here our data 
    $name = 'John Doe'; 
    $phone = '(049)012-345-678'; 
     
    // we building raw data 
    $codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'FN:'.$name."\n"; 
    $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n"; 
    $codeContents .= 'END:VCARD'; 
     
    // generating 
    QRcode::png($codeContents, $tempDir.'025.png', QR_ECLEVEL_L, 3); 
 */   
?>

<div class="text-xs-center">
    <img src="<? echo $url; ?>QR_code.png">
</div>
<?php
//custom error handler
set_error_handler('ErrorHandler',E_ALL);

function ErrorHandler($number, $text, $theFile, $theLine){
	//clear output buffer
	if(ob_get_length()) ob_clean();
	$error = 'Error: ' .$number. chr(10). 
			 'Message: ' .$text. chr(10). 
			 'File: ' .$theFile. chr(10). 
			 'Line: ' .$theLine;
	echo $errorMessage;
	exit;
}

?>
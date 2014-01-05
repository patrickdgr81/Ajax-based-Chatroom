<?php
require_once("chat.class.php");
$mode = $_POST['mode'];
$id = 0;
$chat = new Chat();

//see what our chatroom is doing now
if ($mode=='SendAndRetrieveNew'){
	$name = $_POST['name'];
	$message = $_POST['message'];
	$color = $_POST['color'];
	$id = $_POST['id'];

	//make sure message is valid
	if ($name != '' || $message != '' || $color != ''){
		$chat->postNewMessage($name, $message, $color);
	}
}elseif ($mode=='DeleteAndRetrieveNew'){
		$chat->deleteAllMessages();
}
elseif ($mode=='RetrieveNew'){
	$id = $_POST['id'];
}

if(ob_get_length()){
	ob_clean;
}

//Headers to prevent browsers from caching
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Content-Type: text/xml');

echo $chat->getNewMessages($id);

?>
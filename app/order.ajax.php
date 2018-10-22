<?
function clearData($data){
	$data = trim(strip_tags($data));
	return $data ;	
}

$email='kronos2003@gmail.com';

$subject="Быстрое сообщение с сайта Band.in.ua";

$body="Имя: ".clearData($_POST['name'])."
E-mail: ".clearData($_POST['mail'])."
Сообщение: ".clearData($_POST['msg']);

@mail($email,$subject,$body,"From:".clearData($_POST['mail'])."\r\nContent-type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n");
?>	
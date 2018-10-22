<?
include("data.php");
$subject="Быстрое сообщение с сайта Band";

$htmlstr="<p>Имя: <b>".clearData($_POST['name'])."</b></p>
<p>E-mail: <b>".clearData($_POST['email'])."</b></p>
<p>Комментарий: <b>".clearData($_POST['msg'])."</b></p>";

$url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';
$htmlstr .= "<br/><p>Сообщение отправлено с сайта ".$url.$_SERVER['SERVER_NAME']."</p>";

$body = '<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <style>
        p{
        	margin: 0
        }
        </style>
	</head>
	<body>
        '.
        $htmlstr.
    '</body></html>';



@mail($email,$subject,$body,"From:".clearData($_POST['email'])."\r\nContent-type: text/html; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n");
?>	
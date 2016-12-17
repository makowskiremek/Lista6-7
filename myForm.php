<?php



if (!(isset($_POST['numer']) and isset($_POST['cash']) and isset($_POST['title']))){
	header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/Form.html");
}




$NUM = (string)$_POST['numer'];
$CASH = (string)$_POST['cash'];
$TITLE = (string)$_POST['title'];

$Tekst = <<<EOT
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8"/>
</head>
<body>
<span>Potwierdź dane</span><br>
<span>Tytuł: {{TIT}}</span><br>
<span>Numer Konta: {{NUMER}}</span><br>
<span>Kwota: {{CASH}}</span><br>
<form id="myForm" action="Send.php" method="post">
{{ENTITY1}}
{{ENTITY2}}
{{ENTITY3}}
<input type="submit"  class="button" value="Wyślij przelew"><br>
</form>
</body>
</html>
EOT;

$S = (string) str_replace("{{NUMER}}", $NUM,  $Tekst);
$S = (string) str_replace("{{ENTITY1}}", "<input id=\"n\" type=\"hidden\" name=\"numer\" value=\"" . $NUM . "\">",  $S);
$S = (string) str_replace("{{ENTITY2}}", "<input id=\"c\" type=\"hidden\" name=\"cash\" value=\"" . $CASH . "\">",  $S);
$S = (string) str_replace("{{ENTITY3}}", "<input id=\"t\" type=\"hidden\" name=\"title\" value=\"" . $TITLE . "\">",  $S);
$S = (string) str_replace("{{CASH}}", $CASH,  $S);
$S = (string) str_replace("{{TIT}}", $TITLE,  $S);

echo($S);

	
?>
<?php
$name = htmlspecialchars ($_POST['my_name'], ENT_QUOTES);
$menu = htmlspecialchars ($_POST['menu'],ENT_QUOTES);
$submit = htmlspecialchars ($_POST['submit'], ENT_QUOTES);

print "私の名前は、" . $name . "<br>";
print "ご希望の商品は、" . $menu . "<br>";
print "注文数は、" . $submit;
<?php
include ('include/lib/Cookie.class.php');
$cookie = new Cookie();
$text = 'dsfdss';
$cookie->add('osa_verify_code', $text);
echo $text;
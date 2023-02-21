<?php
$back = $_POST['back'];
$set_cookies = $this->loadModel("cookieform");
$set_cookies->setVisitorCookies();
header("Location: $back");

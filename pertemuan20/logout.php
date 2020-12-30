<?php
session_start();

//menghapus session
session_destroy();
session_unset();

//menghapus cookie
setcookie("login", "", time() - 3600);


//redirectke login
header('Location: login.php');

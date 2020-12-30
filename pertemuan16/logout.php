<?php
session_start();

//menghapus session
session_destroy();
session_unset();

//redirectke login
header('Location: login.php');

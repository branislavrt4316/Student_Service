<?php
session_start();
session_destroy();

header('Location: ../LoginStranica/login.html');
?>
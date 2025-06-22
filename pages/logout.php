<?php
session_start();
session_destroy();
header('Location: /TaskManagerOOP/pages/login.php');
exit;
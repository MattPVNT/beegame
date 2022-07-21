<?php
session_start();
unset($_SESSION['uid']);
session_unset();
session_destroy();
header("Location: ../index.php");
exit();
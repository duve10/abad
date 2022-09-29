<?php
require_once 'config/constants.php';
session_start();
session_destroy();
header("location:".URL . '/login');
?>

?>
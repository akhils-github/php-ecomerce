<?php
$pageTitle = "Product Create";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../../common/sidebar.php');
session_start();
include('../config/db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}else{
header("Location: products");

}
?>
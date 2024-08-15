<?php
$pageTitle = "Product Create";

session_start();
include('../config/db.php');

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}else{
header("Location: products");

}
?>
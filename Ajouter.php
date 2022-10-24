<?php
session_start();
require_once "config.php";

if(isset($_GET['id'])){
    $sql = "INSERT INTO liste ( idusers, idjeux) VALUES (?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Liaison des variables de la requête preparée au paramètre.
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['id'], $_GET['id']);
        if (mysqli_stmt_execute($stmt)){
            header("location: ./profile.php");
        }

        
}}
?>
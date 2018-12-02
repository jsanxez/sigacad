<?php
session_start();

if (!isset($_SESSION["usuario"]))
    header("Location: ../index.php");

require "../models/Conectar.php";
require "sidebar.view.php";
require "header.view.php";
require "content.view.php";
require "footer.view.php";

?>


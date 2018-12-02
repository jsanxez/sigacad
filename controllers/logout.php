<?php
/**
 * Created by PhpStorm.
 * User: jsanchez
 * Date: 17/11/18
 * Time: 16:59
 */

session_start();
session_destroy();

header("Location: ../index.php");
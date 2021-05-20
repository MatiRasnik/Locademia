<?php
session_start();
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['apellido'] = $_POST['apellido'];
$_SESSION['telefono'] = $_POST['telefono'];
$_SESSION['mail'] = $_POST['mail'];
$_SESSION['direccion'] = $_POST['direccion'];
$_SESSION['horas_efectuadas'] = $_POST['horas_efectuadas'];
$_SESSION['horas_reservadas'] = $_POST['horas_reservadas'];
$_SESSION['nombre_C'] = $_POST['nombre_C'];
$_SESSION['tipo'] = $_POST['tipo'];
$_SESSION['horas_restantes'] = $_POST['horas_restantes'];
?>
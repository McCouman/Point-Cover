<?php
if (!isset($_GET['name']) || empty($_GET['name'])) die();
$name = escapeshellarg($_GET['name']);
$datei = explode("\n",`ls . | grep $name`);
$datei = $datei[0];
if (empty($datei)) die();
$finfo = new finfo(FILEINFO_MIME);
$mime = $finfo->file($datei);
header("Content-Type: ".$mime);
readfile($datei);

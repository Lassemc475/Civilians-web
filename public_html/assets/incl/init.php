<?php
/* Define Document Root */
define("DOCROOT", filter_input(INPUT_SERVER, "DOCUMENT_ROOT", FILTER_SANITIZE_STRING));
/* Define Core Root */
define("COREPATH", substr(DOCROOT, 0, strrpos(DOCROOT,"/")) . "/core/");
require COREPATH.'classes/autoloader.php';
$vrpdbconn = new vrpdbconn();
session_start();
ob_start();
$POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
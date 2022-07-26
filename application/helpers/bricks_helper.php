<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function pa($var = null) {
    echo "<pre>";
    print_r($var); 
    echo "</pre>";
    exit;
}

function paa($var = null) {
    echo "<pre>";
    print_r($var); 
    echo "</pre>";
}

function setView($view = null,$data = null) {
    $CI =& get_instance();
    $controller = strtolower(str_replace('Controller','',$CI->router->fetch_class()));

    $CI->load->view('layouts/header');
    $CI->load->view($controller.DS.$view, $data);     
    $CI->load->view('layouts/footer');     
}

function __dfu($date, $from_format = 'd.m.Y', $to_format = 'Y-m-d') {
    if ($date) {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux, $to_format);
    } else return '';
}

function __dfl($date, $from_format = 'Y-m-d', $to_format = 'd.m.Y') {
    if ($date) {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux, $to_format);
    } else return '';
}

function mb_ucfirst($string, $encoding = null) {
    if (!$encoding)
	$encoding = 'UTF-8';
    $strlen = mb_strlen($string, $encoding);
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, $strlen - 1, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}




?>

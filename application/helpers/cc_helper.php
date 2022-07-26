<?php
defined('BASEPATH') or exit('No direct script access allowed');

function getData($query = null)
{
    $data = '';
    $error_message = '';
    $rez = new stdClass();
    $CI = &get_instance();
    $url = $CI->config->item('cc_url');
    $key = $CI->config->item('cc_key');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $url . $query . 'apiKey=' . $key);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
    $data = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
    curl_close($ch);

    if ($data) {
        $rez = json_decode($data, false);
        if (isset($rez->error)) $error_message = $rez->error;
    } else {
        $CI->flash->error('Komunikāciju kļūda.');
    }
    if ($httpCode && $httpCode != 200) $CI->flash->error('Pakalpojuma kļūda. <br/>Kods: '.$httpCode.'<br/><i>('.$error_message.')</i>');
    return $rez;
}

function getPair($cur1 = null, $cur2 = null)
{
    $query = "convert?q=".$cur1."_".$cur2."&compact=ultra&";
    return getData($query);
}

function getCurrencylist()
{
    $query =  "currencies?";
    return getData($query);
}

function getCountrylist()
{
    $query =  "countries?";
    return getData($query);
}

function getHystoric($cur1 = null, $cur2 = null, $start_date = null, $end_date = null)
{
    if (!$end_date) {
        $query = "convert?q=cur1,$cur2&compact=ultra&date=$start_date&";
    } else {
        $query = "convert?q=cur1,$cur2&compact=ultra&date=$start_date&endDate=$end_date&";
    }
    return getData($query);
}

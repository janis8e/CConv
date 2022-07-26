<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Flash 
{

    public function __construct()
    {
        $CI = &get_instance();        
        $CI->load->library("session");                                
    }


    public function success($message = null)
    {
        $CI = &get_instance();     
        $CI->session->set_flashdata('success', $message);        
    }


    public function error($message = null)
    {
        $CI = &get_instance();     
        $CI->session->set_flashdata('danger', $message);        

    }


    public function warning($message = null)
    {
        $CI = &get_instance();     
        $CI->session->set_flashdata('warning', $message);
    }


    public function info($message = null)
    {
        $CI = &get_instance();     
        $CI->session->set_flashdata('info', $message);
    }

    public function render()
    {
        $CI = &get_instance();     
        // pa($CI->session->flashdata());
        foreach ($CI->session->flashdata() as $key => $item) {
            $data = [
                'alerttype'=> $key,
                'message'=> $item
            ];
            $CI->load->view('alert',$data);
        }

    }

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AjaxController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		// $this->load->database();
		// $this->load->model('currency_model');
		$this->load->helper('bricks');
		$this->load->helper('cc_helper');
		$this->load->library('session');
		$this->load->library('assets');
		$this->load->library('flash');
		$this->load->helper('security');
		$this->load->helper('url');
	}

	public function calc()
	{
		$data = array();
		$rez = array();


		if ($this->input->is_ajax_request()) {
			if ($_POST) {
				$data = $this->input->post();
				$data = $this->security->xss_clean($data);
				if ($data['curr_from'] && $data['curr_to'])
					$rez = getPair($data['curr_from'], $data['curr_to']);
				$rez = (array) $rez;
				if ($rez)
					echo json_encode(array_values($rez)[0]);
			}
		}
	}
}

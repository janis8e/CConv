<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
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

	public function index()
	{
		setView('index');
	}

	public function currlist()
	{
		$data = Array();
		$this->assets->collection('css_optional')->addCss('//cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css');
		$this->assets->collection('js_optional')->addJs('//cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js');

		$currlist = getCurrencylist();
		
		$data['currlist'] = $currlist->results;
		setView('currlist', $data);
	}

	public function currcalc()		
	{
		$data = Array();
		$currpair = ['curr_from'=>'---','curr_to'=>'---'];
		$currrate = 0;
		$currrez = 0;

		$currlist = getCurrencylist();
		$data['currlist'] = $currlist->results;
	
		$data['currpair'] = $currpair;
		$data['currrate'] = $currrate;
		$data['currrez'] = $currrez;

		setView('currcalc',$data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_m');
		//Do your magic here
	}

	public function index()
	{
		$this->data['categories'] = $this->category_m->get_nested();
		$this->data['page_title'] = "Category Management";
		$this->load->view('category',$this->data);
	}

	public function order_ajax(){
		if(isset($_POST['sortable'])){
			$this->category_m->save_order($_POST['sortable']);
		}
		$this->data['category'] = $this->category_m->get_nested();
		$this->load->view('order_ajax',$this->data);
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */
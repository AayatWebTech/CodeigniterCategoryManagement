<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {

	protected $_table_name = "tbl_categories";
	protected $_primary_key = 'id';

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}

	public function get_nested(){
		$category = $this->db->get($this->_table_name)->result_array();
		$this->load->helper('array_tree_helper');
		$array = array();
		if(count($category)!=0){
			$array = array_tree($category,'id','category_parent_id','children');	
		}
		return $array;
	}

	public function save_order($category){
		if(count($category)){
			foreach ($category as $cat => $c) {
				if( !empty($c['item_id']) ){
					$data = array('category_parent_id' => (int) $c['parent_id']);
					$this->db->set($data)->where($this->_primary_key,$c['item_id'])->update($this->_table_name);
				}
			}
		}
	}

}

/* End of file Category_m.php */
/* Location: ./application/models/Category_m.php */
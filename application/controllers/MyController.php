
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
//***********************************************************************************************************////////////////////////////////////*********************************//
																										   	///////////SESSIONS/////////////////
																										   ////////////////////////////////////
	public function __construct(){
		parent:: __construct();
	}
	public function index(){
		//set session data
	}
//***********************************************************************************************************////////////////////////////////////*********************************//
																										   	///////////SESSIONS/////////////////
																										   ////////////////////////////////////
//********************************************************************************************************////////////////////////////////////***********************************//
																										 ///////////CATEGORIES///////////////
																										////////////////////////////////////
	//creates a table with the given name
	//also adds the name in the categories table
	public function categoryAdder(){//creates 
		$table_name = $this->input->post('table_name');
		$this->load->model('mymodel');
		$status = $this->mymodel->categoryAdder($table_name);
		if($status == true){
			redirect(base_url()."/index.php/MyController/categories/");
		}
	}
	//CATEGORY REMOVER 
	//
	public function categoryRemover(){
		$table_name = $this->input->post('product_name');
		$this->load->model('mymodel');
		$results = $this->mymodel->categoryRemover($table_name);
		if($results){
			redirect(base_url().'/index.php/MyController/categories/');
		}
	}
	public function categoryUpdater(){
		echo 'controller is working';
		$old_name = $this->input->post('old_name');
		$new_name = $this->input->post('new_name');		
		$this->load->model('mymodel');
		$results = $this->mymodel->categoryUpdater($old_name,$new_name);
		if($results){
			redirect(base_url().'/index.php/MyController/categories/');
		}
	}
	//fetches all categories and returns contents to caller
	//generic for use whenever needed
	public function getCategories(){
		$this->load->model('mymodel');
		$data['categories'] = $this->mymodel->getCategories();
		return $data;
	}
	public function categories(){
	//loads the view 'categories'
	//passes an array returned by 'getCategories' method
		$this->load->view('categories',$this->getCategories());
	}
	public function category(){
		$cat_name = $this->uri->segment(3);
		$this->load->model('mymodel');
		$data['thisCategory'] = $this->mymodel->findCategory($cat_name);
		$bigData = array_merge($data,$this->getCategories(),array('thisCategoryName'=>$cat_name));
		$this->load->view('category',$bigData);
	}
	public function productAdder(){
	//echo "generic product adder starts";
		$user_id = 1;
		$table_name = $this->input->post('table_name');
		$file_name = $this->input->post('file_name');
		$prod_name = $this->input->post('prod_name');
		$prod_price = $this->input->post('prod_price');
		$prod_quantity = $this->input->post('prod_quantity');
		$prod_desc = $this->input->post('prod_desc');
		$toModel = array('product_name'=>$prod_name,
						 'product_price'=>$prod_price,
						 'product_description'=>$prod_desc,
						 'user_id'=>$user_id,
						 'file_name'=>$file_name);
		$this->load->model('mymodel');
		$results = $this->mymodel->productAdder($toModel,$table_name);
		if ($results == true){
			redirect(base_url().'index.php/MyController/category/'.$table_name);
		}
	}
	public function productRemover(){
		$product_id = $this->input->post('product_id');
		$table_name = $this->input->post('table_name');
		$this->load->model('mymodel');
		$results = $this->mymodel->productRemover($product_id,$table_name);
		if($results){
			redirect(base_url().'/index.php/MyController/category/'.$table_name);
		}
	}
	public function productUpdater(){
		$user_id = 1;
		$product_id = $this->input->post('product_id');
		$table_name = $this->input->post('table_name');

		$prod_name = $this->input->post('prod_name');
		$prod_price = $this->input->post('prod_price');
		//$prod_quantity = $this->input->post('prod_quantity');
		$prod_desc = $this->input->post('prod_desc');
		$toModel = array('product_name'=>$prod_name,
						 'product_price'=>$prod_price,
						 'product_description'=>$prod_desc,
						 'user_id'=>$user_id);
		$this->load->model('mymodel');
		$fromModel = $this->mymodel->productUpdater($toModel,$product_id,$table_name);
		if($fromModel ==  true){
			redirect(base_url().'//index.php/MyController/category/'.$table_name);
		}
	}
//********************************************************************************************************////////////////////////////////////***********************************//
																										 ///////////CATEGORIES///////////////
																										////////////////////////////////////	

	//ALL UPLOADING CODE **ends here***

}

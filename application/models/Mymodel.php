<?php
defined('BASEPATH') OR exit('NO direct scripts allowed on this here server, not ever');

class Mymodel extends CI_Model{



	public function __construct(){

		parent::__construct();
		//$this->load_database();
		$this->load->database();

	}
//***********************************************************************************************************////////////////////////////////////*********************************//
																										   	///////////SESSIONS/////////////////
																										   ////////////////////////////////////




//***********************************************************************************************************////////////////////////////////////*********************************//
																										   	///////////SESSIONS/////////////////
																										   ////////////////////////////////////
//********************************************************************************************************////////////////////////////////////***********************************//
																										 ///////////CATEGORIES///////////////
																										////////////////////////////////////
	//creates a table with the given name
	//also adds the name in the categories table	
	public function categoryAdder($table_name){
		$sql = "CREATE TABLE ".$table_name." (table_id int(20) auto_increment primary key not null,
				product_name varchar(200), product_price int(200), product_description longtext,
				user_id int(20) not null,file_name varchar(200) not null,created_on timestamp)";
        $this->db->query($sql);
        $this->db->set('created_on','NOW()',false);
        $this->db->insert('allcategories',array('cat_name'=>$table_name,'user_id'=>'1'));
        return true;
	}
	public function categoryRemover($table_name){
		$this->db->where('cat_name',$table_name);
		$this->db->delete('allcategories');
		//$this->dbforge->drop_table($cat_name,TURE);
		$this->load->dbforge();
		$this->dbforge->drop_table($table_name,true);
		return true;
	}

	public function categoryUpdater($old_name,$new_name){
		$this->db->where('cat_name',$old_name);
		$this->db->update('allcategories',array('cat_name'=>$new_name));

		$this->load->dbforge();
		$this->dbforge->rename_table($old_name, $new_name);
		return true;
	}
	public function getCategories(){
		$query = $this->db->select('cat_name')->from('allcategories')->get();
		return $query->result();
	}
	public function findCategory($cat_name){
		//receive a table name
		//query it and return contents
		$query = $this->db->select('*')->from($cat_name)->get();
		return $query->result();
	}
	
	public function productAdder($fromController,$table_name){
		$this->db->set('created_on','NOW()',false);//sets time to current time
		$this->db->insert($table_name,$fromController);
		return true;
	}
	public function productRemover($product_id,$table_name){
		$this->db->where('table_id',$product_id);
		$this->db->delete($table_name);
		return true;
	}
	public function productUpdater($fromController,$product_id,$table_name){
		$this->db->where('table_id',$product_id);
		$this->db->update($table_name,$fromController);
		return true;
	}
//********************************************************************************************************////////////////////////////////////***********************************//
																										 ///////////CATEGORIES///////////////
																										////////////////////////////////////

	//*****************************ENDS HERE***********************************//
	//CODE RESPONSIBLE FOR CREATING TABLES FOR OUR CATEGORIES TO GROUP PRODUCTS|



}


?>

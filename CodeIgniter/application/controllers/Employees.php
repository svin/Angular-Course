<?php

class Employees extends CI_Controller {
	public function _remap($id){
		//load instance of model into memory
		$this->load->model('employees_model');
		//get the method name
		$method= strtolower($_SERVER['REQUEST_METHOD']);
		//call the method
		$data = $this->$method($id);
		//return the result
		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($data);	
	}
	
	private function _getData(){
		//get the raw data
		$jsonStr=file_get_contents('php://input');
		//convert json str to object
		return json_decode($jsonStr,true);
	}
	private function get($id=null){
		if(is_numeric($id)){
			//cast to integer - Security good practice
			$id=(int)$id;
			//get record by id
			$data=$this->employees_model->get_by_id($id);
		}
		else{
			//get all the data
			$data=$this->employees_model->get_all();
		}
		return $data;
	}
	
	private function post(){
		$jsonArr=$this->_getData();
		//store to db
		return $this->employees_model->post($jsonArr);	
	}
	
	private function put($id){
		$jsonArr=$this->_getData();
		//store to db
		return $this->employees_model->put($id,$jsonArr);
	}
	
	private function delete($id){
		return $this->employees_model->delete($id);
	}
}
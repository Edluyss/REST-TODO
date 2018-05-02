<?php
require APPPATH . '/libraries/REST_Controller.php';
class Item extends REST_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('task_model');
    }
    
    public function item_get(){
        
        
        if($data = $this->task_model->get_all()) {
            $this->response(array(
                'status' => 'success',
                'message' => $data
            ), 200);
        } else {
            $this->response(array(
                'status' => 'error',	
                'message' => 'Table is empty'
            ), 404);
        }
    }   
    
    public function item_post(){
        
        $data = $this->post();
        
        if($this->item_model->insert($data)){
            $this->response(array(
                'status' => 'success',
                'message' => 'data inserted'
            ), 200);
        }
        else{
            $this->response(array(
                'status' => 'error',
                'message' => 'Internal Server Error'
            ), 500);
        }
    }
    public function item_put(){
    	$id = $this->put();
    	$data = array(
            'task_status' => '1',
            'task_completed' => date('Y-m-d H:i:s'));

    	if($this->item_model->update($data,$id[0])){
    		$this->response(array(
    			'status'=>'success',
    			'message' => 'data complete'
    		),200);
    	}
    	else{
    		$this->response(array(
    			'status' => 'error',
    			'message' => 'Internal Server Error'
    		),500);
    	}
    }
    public function update_post(){
        $data= $this->post();
        $id = $data['task_id'];
        unset($data['task_id']);

        if($this->item_model->get(array('task_id'=>$id,'task_status'=> 0))){
        if($this->item_model->update($data,$id)){
            $this->response(array(
                    'status' => 'Success'
                ), 200);
            }
            else{
                $this->response(array(
                    'status' => 'Error'
                ), 500);
            }
    }else{
            $this->response(array(
                    'status' => 'Notequal'
                ), 404);
        }
    }
    
}
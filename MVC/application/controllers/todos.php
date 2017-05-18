<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class todos extends CI_Controller {

	public function create()
	{	
		$this->load->model("todo_model", "todo", true);
		

		if (!empty( $_POST )){
			

			
			if (isset($data)){
				$data['todo'] = $this->input->post('todo');
				$this->todo->Save($data);
				$this->load->view("todos/success");
			} else {
				throw new Exception;
			}


			
			



		}
		else{
			$data['todos'] = $this->todo->GetAll();
			$this->load->view("todos/create", $data);
		}
	}
}

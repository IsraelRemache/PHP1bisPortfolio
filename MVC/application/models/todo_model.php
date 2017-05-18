<?php 

class todo_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }

        public function Save($data){
        	$this->db->insert('todos', $data);
        }

        public function GetAll(){
        	return $this->db->get('todos');
        }



}

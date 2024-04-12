<?php
class StudentModel extends CI_Model{

    //view all students
    function getallStudents(){
        $this->db->select('*'); 
        $this->db->from('students');
        $query= $this->db->get();
        return $query->result();
    }

    //add students
    function savedetails(){ 
        $insert_array = array(
            'stno'=>$this->input->post('stno'),
            'name'=>$this->input->post('name'),
            'address'=>$this->input->post('address'),
            'phone'=>$this->input->post('phone'),
            'email'=>$this->input->post('email'),
            'grade'=>$this->input->post('grade')
        );
       $output= $this->db->insert('students',$insert_array);
       return $output; 
    }

//get student by id
    function getstudentById($stno){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('stno', $stno);

        $query= $this->db->get();
        return $query->result();
    }
  
    function updatestudent($id) 
    {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('stno', $id);
        $query= $this->db->get();
        return $query->result();
    }

    function updatedetails($insert_array){
        $insert = array(
            'name'=>$this->input->post('name'),
            'address'=>$this->input->post('address'),
            'phone'=>$this->input->post('phone'),
            'email'=>$this->input->post('email'),
            'grade'=>$this->input->post('grade')
        );
        $this->db->where('stno',$this->input->post('stno'));
       return  $this->db->update('students',$insert);
    }
}
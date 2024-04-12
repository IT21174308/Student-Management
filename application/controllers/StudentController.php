<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('StudentModel');
    }

    //add students
    function index()
    {
        $this->load->view('AddStudent');
    } function mobile()
    {
        $this->load->view('mobile');
    }

    //view all students
    function allstudents()
    {
        $studentModel = new StudentModel();
        $data['details'] = $studentModel->getallStudents();
        $this->load->view('AllStudents', $data);

       
    }


    //add student
    function savedata()
    {
        $insert_array = array(
            'stno' => $this->input->post('stno'),
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'grade' => $this->input->post('grade')

        );
        $this->StudentModel->savedetails();
        redirect('StudentController/allstudents');
    }

    //get student by id
    function getstudentById()
    {
        $stno = $this->uri->segment(3);
        if (!$stno) {
            redirect('StudentController/allstudents');
        } else {
            $info['student'] = $this->StudentModel->getstudentById($stno);
            $this->load->view('StudentDetails', $info);
        }
    }

    //update student details
    function updatestudent($id)
    {
        $studentModel = new StudentModel;
        $data['details'] = $studentModel->updatestudent($id);
        $this->load->view('UpdateStudent', $data);
    }

    function update()
    {
        $insert_array = array(
            'stno' => $this->input->post('stno'),
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'grade' => $this->input->post('grade')

        );
        $this->StudentModel->updatedetails($insert_array);
        redirect('StudentController/getstudentById');
    }

    //delete student
    function delete($stno)
    {
        $this->db->where('stno', $stno);
        $this->db->delete('students');
        redirect('StudentController/allstudents');
    }
}

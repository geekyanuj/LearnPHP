<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class DashboardController extends BaseController
{
    protected $session;

    // Constructor to load session
    public  function __construct()
    {
        // Load session service
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if (!$this->session->has('username')) {
            return redirect()->to(site_url('/'));
        }else{
            if($this->session->get('role')==2){
                return view('admin/admin_dashboard'); 
            }else{
                return view('employee/employee_dashboard'); 
            }
            // print_r($this->session->get('role'));
        }

    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function getAllEmpData(){
        if($this->session->has('username') && $this->request->getMethod() == 'GET'){
            $employeeModel = new EmployeeModel();
            $data = $employeeModel->where('role',1)->orderBy('emp_id','DESC')->findAll();
            return response()->setJSON($data);
        }else{
            $response = [
                'status'=> 'error',
                'message'=> 'Please login first.'
            ];
            return response()->setJSON($response);
        }
        
    }
    public function addEmployee(){
        $response = null;
        if($this->session->has('username') && $this->request->getMethod() == "POST"){
            // print_r($this->request->getPost()); die();
            $data = $this->request->getPost(); 

             // Set validation rules
            $validation =  \Config\Services::validation();

            $validation->setRules([
            'full_name' => 'required|min_length[5]',
            'email'    => 'required|valid_email',
            'username' => 'required|min_length[5]|max_length[15]|alpha_numeric',
            'gender' => 'required',
        ]);
             // Validate form data
             if ($validation->run($data)) {
                // print_r($data); die;
                $employeeModel = new EmployeeModel();
                $employeeModel->insert($data);
                $response = [
                    'status'  => true,
                    'message'  => 'Employee added successfully.',
                ];
             }else{
                $errors = $validation->getErrors();
                $response = [
                    'status'  => false,
                    'message'  => $errors
                ];
             }
            }else{
                $response = [
                    'status'=> 'error',
                    'message'=> 'Please login first',
                ];
            }
            return response()->setJSON($response);
        
    }

    public function getDataOfEmpById(){
        if($this->session->has('username') && $this->request->getMethod() == 'GET'){
            $id = $this->request->getGet();
            // print_r("hello");
            // print_r($id);
            $employeeModel = new EmployeeModel();
            
            $response = $employeeModel->find($id);
            return $this->response->setJSON($response);
        }
    }
    public function updateEmployee(){
        if($this->session->has('username') && $this->request->getMethod() == 'POST'){
            $data = $this->request->getPost();
            $id = $this->request->getPost('emp_id');
            // print_r($data); die();
            // print_r("hello");
            // print_r($id);
             // Set validation rules
             $validation =  \Config\Services::validation();

             $validation->setRules([
             'full_name' => 'required|min_length[5]',
             'email'    => 'required|valid_email',
             'username' => 'required|min_length[5]|max_length[15]|alpha_numeric',
             'gender' => 'required',
            ]);
            if ($validation->run($data)) {
                // print_r($data); die;
                $employeeModel = new EmployeeModel();
                $status = $employeeModel->update($id,$data);
                $response = [
                    'status'=> $status,
                    'message'=> 'Updated Successfully',
                ];
                
             }else{
                $errors = $validation->getErrors();
                $response = [
                    'status'  => false,
                    'message'  => $errors
                ];
             }
            
            return $this->response->setJSON($response);
        }
    }

    public function deleteEmployee(){
        if($this->session->has('username') && $this->request->getMethod() == 'POST'){
            $id = $this->request->getPost();
            // print_r("hello");
            // print_r($id);
            $employeeModel = new EmployeeModel();
            
            $status = $employeeModel->delete($id);
            $response = [
                'status'=> $status,
                'message'=> 'Deleted Successfully!'
            ];

            return $this->response->setJSON(body: $response);
        }
    }

}
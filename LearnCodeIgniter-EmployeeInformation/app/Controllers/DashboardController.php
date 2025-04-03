<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('id')) {
            return redirect()->to(site_url('/'));
        }else{
            if(session()->get('role')==2){
                // $this->getAllEmpData();
                return view('admin/admin_dashboard'); 
            }else{
                return view('employee/employee_dashboard'); 
            }
            // print_r(session()->get('role'));
        }

    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function getAllEmpData(){
        if($session = session()){
            $employeeModel = new EmployeeModel();
            $data = $employeeModel->where('role',1)->findAll();
            return response()->setJSON($data);
        }
        
    }
}
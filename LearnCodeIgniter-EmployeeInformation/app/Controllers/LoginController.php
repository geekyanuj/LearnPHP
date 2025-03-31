<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class LoginController extends BaseController
{

    public function __construct()
    {
        helper(["url"]);
    }
    public function index(): string
    {
        return view('login/index');
    }

    public function login()
    {
        $response = [];

        if ($this->request->getMethod() == "POST") {
            $email = $this->request->getPost("email");
            $isEmail = substr_count($email,'@')>0;
            if($isEmail){
                $validationRules = [
                    'email' => 'required|valid_email',
                    'password' => 'required|min_length[8]',
                ];

                if ($this->validate($validationRules)) {
                    $employeeModel = new EmployeeModel();
                    $data = $employeeModel->where('email', $email)->first();
                    //  $dbpassword = $data['password'];
                    //  $password = $this->request->getPost('password');
                    //  $cmp = strcmp($password, $dbpassword); 
                     
                    if (!empty($data)) {
                        if(!strcmp($data['password'],$this->request->getPost('password'))){
                            $role = $data['role'];
                            session()->set('user_data', $data);
                            // session()->set('username', $data['username']);
                            if($role == 2){
                                $response = ['status' => true, 'id' => $data['emp_id'], 'username'=> $data['username'],
                                'role'=>$role,'message'=>'Login Successful redirect to dashboard !!'];
                            }else{
                                $response = ['status' => true, 'id' => $data['emp_id'], 'username'=> $data['username'],'role'=>$role,
                            'message'=>'Login Successful redirect to dashboard !!'];
                            }
                            // print_r($role); die;
                           
                            
                        }else{
                            $response = ['status'=> false,'message'=> 'Incorrect Password'];
                        }
                        
                    }else{
                        $response = ['status' => false, 'message' => 'User not found!'];
                    }
                }else{ //when email validation failed
                    $errors = $this->validator->getErrors();
                    $response = [
                        'status'  => false,
                        'message'  => $errors
                    ];
                }
            }else{
                $validationRules = [
                    'email' => 'required|min_length[5]|max_length[15]',
                    'password' => 'required|min_length[8]',
                ];

                if ($this->validate($validationRules)) {
                    // echo "hello";
                    $employeeModel = new EmployeeModel();
                    $data = $employeeModel->where('username', $email)->first();
                    if (!empty($data)) {
                        if(!strcmp($data['password'],$this->request->getPost('password'))){
                            $response = ['status'=> true,'id'=> $data['emp_id'],'username'=> $data['username']];
                            $role = $data['role'];
                            session()->set('user_data', $data);
                            // session()->set('username', $data['username']);
                            if($role == 2){
                                $response = ['status' => true, 'id' => $data['emp_id'], 'username'=> $data['username'],'role'=>$role,'message'=>'Login Successful redirect to dashboard !!'];
                            }else{
                                $response = ['status' => true, 'id' => $data['emp_id'], 'username'=> $data['username'],'role'=>$role,'message'=>'Login Successful redirect to dashboard !!'];
                            }
                            // print_r($role); die;

                        }else{
                            $response = ['status'=> false,'message'=> 'Incorrect Password'];
                        }
                    }else{
                        $response = ['status'=> false,'message'=> 'User not found'];
                    }

                }else{ //when username validation failed
                    $errors = $this->validator->getErrors();
                    $response = [
                        'status'  => false,
                        'message'  => $errors
                    ];
                }

            }

            
        }   
        return response()->setJSON($response);

    }

    public function register()
    {
        $response = [];

        if ($this->request->getMethod() == "POST") {
            // print_r($this->request->getMethod()); die();
            // Define validation rules
            $validationRules = [
                'r-username' => 'required|min_length[5]|max_length[15]',
                'r-email' => 'required|valid_email',
                'r-password' => 'required|min_length[8]',
                'r-cpassword' => 'required|matches[r-password]',
            ];
            $errorMessages = [
                'r-username' => [
                    'required' => 'The Username field is required!',
                    'min_length' => 'The Username must be at least 5 characters long!',
                    'max_length' => 'The Username must not exceed 15 characters!',
                ],
                'r-email' => [
                    'required' => 'The Email field is required!',
                    'valid_email' => 'Please enter a valid email address!',
                ],
                'r-password' => [
                    'required' => 'The Password field is required!',
                    'min_length' => 'The Password must be at least 8 characters long!',
                ],
                'r-cpassword' => [
                    'required' => 'The Confirm Password field is required!',
                    'matches' => 'The Confirm Password does not match the Password!',
                ],
            ];
            //  print_r($_POST); die();

            // Validate form data
            if ($this->validate($validationRules, $errorMessages)) {

                $employeeModel = new EmployeeModel();
                // print_r($employeeModel); die;

                $data = [
                    "username" => $this->request->getVar('r-username'),
                    "email" => $this->request->getVar('r-email'),
                    "password" => $this->request->getVar('r-password'),
                ];

                $existingEmployee = $employeeModel->where('email', $data['email'])->orWhere('username', $data['username'])->first();
                if ($existingEmployee) {
                    $response = [
                        'status' => false,
                        'message' => 'The email or username is already taken. Please try another one.',
                    ];
                    http_response_code(400); // 400 Bad Request
                }else{
                    if ($employeeModel->insert($data)) {
                        $response = [
                            'status' => true,
                            'message' => 'Your Registration was successful! Please Login',
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Database error. Please try again later.',
                        ];
                    }
                }

            } else {
                $errors = $this->validator->getErrors();
                $response = [
                    'status'  => false,
                    'message'  => $errors,
                ];
                http_response_code(422);
                // Return the response as JSON
            }
        }
        // print_r("Reached");
        // return json_encode($response);
        return $this->response->setJSON($response);
    }


    public function userdashboard(){
        return view('employee/user_dashboard');
    }


    public function admindashboard(){

        $session = session();
       
        

        $logged_in = $session->get('user_data');
        // print_r($logged_in); die;

        // if(!empty($logged_in)){
        //     echo "Session found";}
        //     else{
        //         // echo "Session not found";

        //     } die;
        $username = $logged_in['username'];
        // return view('admin/admin_dashboard', [
        //     'logged_in' => $logged_in,
        //     'username'  => $username    
        // ]);
        return view('admin/admin_dashboard',compact('logged_in','username'));
    }
    public function adminlogout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');

    }
}

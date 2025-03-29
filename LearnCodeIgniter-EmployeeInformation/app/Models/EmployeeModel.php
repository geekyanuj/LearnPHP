<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
	protected $table = 'employee';
	protected $primaryKey = 'emp_id';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $allowedFields = ['username', 'email', 'password','full_name','gender'];

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	
	

}


?>
<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class EmployeeId extends Model
{
    protected $table = "Employees";
 
    public function departementname()
    {
    	return $this->hasOne('App\DepartementName');
    }
    
}
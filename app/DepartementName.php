<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Telepon extends Model
{
    protected $table = "departements";
 
    public function employeesid()
    {
    	return $this->belongsTo('App\EmployeesId');
    }
}
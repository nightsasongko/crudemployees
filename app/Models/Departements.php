<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Departements extends Model
{
    public function Departements()
    {
        return DB::table('departements')->get();
    }

}
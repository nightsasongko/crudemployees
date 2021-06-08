<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Departement extends Model
{
    public function nameDepartement()
    {
        return DB::table('departements')->get();
    }

}

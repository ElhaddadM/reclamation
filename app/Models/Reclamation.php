<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable = ['Name','Departement','Date','Notice','IsValidate',"user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

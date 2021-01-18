<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

     protected $fillable = [
        'first_name', 'last_name','company_id','email','city','country','job_title'
    ];

    public function company(){
      return $this->belongsTo('App\Models\Company', 'company_id');
    }

}

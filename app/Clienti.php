<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clienti extends Model
{
    protected $fillable= ['name','lastname','email','description'];
}

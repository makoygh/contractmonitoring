<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DQCLients extends Model
{
    use HasFactory;
    //protected $guarded = [];
    protected $table = 'clients';
    protected $guarded = ['id'];


}

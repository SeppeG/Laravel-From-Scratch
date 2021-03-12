<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function complete(){
       $this->completed_at =now();
       $this->save();
    }
    use HasFactory;
}

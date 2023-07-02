<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function testCaseResults(){
        return $this->hasMany(TestCaseResult::class);
    }

    public function testTemplate(){
        return $this->belongsTo(TestTemplate::class);
    }
}

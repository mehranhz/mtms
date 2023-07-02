<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCaseResult extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function test(){
        return $this->belongsTo(Test::class);
    }

    public function testCase(){
        return $this->belongsTo(TestCase::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}

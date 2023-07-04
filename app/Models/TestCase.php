<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','test_template_id','test_steps','test_data','exception_result'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function testTemplate(){
        return $this->belongsTo(TestTemplate::class);
    }

    public function testCaseResults(){
        return $this->hasMany(TestCaseResult::class);
    }
}

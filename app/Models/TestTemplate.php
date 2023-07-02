<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestTemplate extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','app_id'];

    public function app(){
        return $this->belongsTo(App::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function testCases(){
        return $this->hasMany(TestCase::class);
    }
}

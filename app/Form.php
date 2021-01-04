<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
  ];
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    public function faculties() {
        return $this->belongsTo(Faculty::class,'faculty');
     }
    
     public function levels() {
    return $this->belongsTo(Level::class,'level');
    }

    public function course() {
        return $this->belongsTo(Course::class,'programs');
     }

    public function subject() {
       return $this->belongsTo(Subject::class);
    }

    public function colleges() {
        return $this->belongsTo(Admin::class,'campus');
     }
    
}

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
    protected $fillable = [
        'faculty',
        'campus',
        'level',
        'programs',
        'year',
        'form_serial_no',
        'sex',
        'fname',
        'mname',
        'lname',
        'regd_no',
        'symbol_no',
        'semester',
        'exam_type',
        'subjects',
        'subject_codes',
        'image',
        'signature',
        'is_verified',
        'exam_centre',
        'nationality',
        'dateOfBirth',
        'district',
        'mother_name',
        'father_name',
        'ward',
        'contact',
        'email',
        'board',
        'passed_year',
        'roll_no',
        'division',
        'is_final_verified',
        'voucher',
        'consent',
        'created_at', 'updated_at', 'deleted_at', 
    ];

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

    
}

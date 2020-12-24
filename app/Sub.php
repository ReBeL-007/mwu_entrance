<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sub extends Model
{
    //
    use SoftDeletes;

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
  ];
  
    protected $fillable = [
      'title', 'slug', 'subject_code', 'description', 'course_id', 'semester', 'created_at', 'updated_at', 'deleted_at',
  ];
     
     public function course() {
     
        return $this->belongsTo(Course::class);
            
     }


    //  public function getRouteKeyName() {
       
    //       return 'slug';
    //   }
}

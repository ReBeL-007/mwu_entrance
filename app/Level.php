<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    //
    use SoftDeletes;

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
  ];
  
    protected $fillable = [
      'name',
      'slug',
      'description',
      'created_at',
      'updated_at',
      'deleted_at',
  ];

    // public function roles() {

    //     return $this->belongsToMany(Role::class,'roles_permissions');
            
    //  }
     
     public function faculties() {
     
        return $this->belongsToMany(Faculty::class,'faculties_levels');
            
     }

        /**
         * Override parent boot and Call deleting event
         *
         * @return void
         */
        protected static function boot() 
        {
            parent::boot();

            static::deleting(function($levels) {
                foreach ($levels->courses()->get() as $course) {
                $course->delete();
                }
            });
        }

    public function courses() {
    
      return $this->hasMany(Course::class);
          
   }

   public function forms() {

    return $this->hasMany(Form::class,'level');
        
}
    // public function batches(){

    //   return $this->hasManyThrough(Batch::class, Course::class);
      
    // }

     public function getRouteKeyName() {
       
          return 'slug';
      }
}

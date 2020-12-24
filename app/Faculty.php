<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
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

      public function levels() {
        
        return $this->belongsToMany(Level::class,'faculties_levels');
        
      }
      
          /**
         * Override parent boot and Call deleting event
         *
         * @return void
         */
        protected static function boot() 
        {
            parent::boot();

            static::deleting(function($faculties) {
                foreach ($faculties->courses()->get() as $course) {
                $course->delete();
                }
            });
        }

      public function courses() {
    
          return $this->hasMany(Course::class);
              
       }

       public function forms() {

        return $this->hasMany(Form::class,'faculty');
            
    }

    //    public function fines() {
    
    //     return $this->hasMany(Fine::class);
            
    //  }

      // public function batches(){
      //   return $this->hasManyThrough(Batch::class, program::class);
      // }

     public function getRouteKeyName() {
       
          return 'slug';
      }
}

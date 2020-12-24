<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
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
      'abbreviation',
      'duration',
      'description',
      'weight',
      'faculty_id',
      'level_id',
      'created_at',
      'updated_at',
      'deleted_at',
      'created_by',
      'updated_by',
      'deleted_by',
  ];
     
     public function faculty() {
     
        return $this->belongsTo(Faculty::class);
            
     }

     public function level() {
     
        return $this->belongsTo(Level::class);
          
      }

      public function coursetypes() {
     
        return $this->belongsToMany(ProgramType::class,'courses_coursetypes','course_id','coursetype_id');
            
     }

         /**
         * Override parent boot and Call deleting event
         *
         * @return void
         */
        // protected static function boot() 
        // {
        //     parent::boot();

        //     static::deleting(function($courses) {
        //         foreach ($courses->batches()->get() as $batch) {
        //         $batch->delete();
        //         }
        //     });
        // }

      public function forms() {

          return $this->hasMany(Form::class,'programs');
              
      }

     public function getRouteKeyName() {
       
          return 'slug';
      }
}

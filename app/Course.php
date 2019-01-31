<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const PUBLISHED = 1;
    const PENDING = 2;
    const REJECTED = 3;

    public function category()
    {
        //Un curso pertenece a una categoría
        return $this->belongsTo(Category::class)->select('id','name');
    }
    public function goals()
    {
        //Un curso puede tener muchas metas
        return $this->hasMany(Goal::class)->select('id','course_id','goal');
    }
    public function level()
    {
        //Un curso pertenece a una nivel
        return $this->belongsTo(Level::class)->select('id','name');
    }

    public function reviews()
    {
        //Un curso puede tener muchas valoraciones
        return $this->hasMany(Review::class)->select('id','user_id','course_id','rating','comment','created_at');
    }

    public function requirements()
    {
        //Un curso puede tener muchas requerimientos
        return $this->hasMany(Requirement::class)->select('id','course_id','rating','requirement');
    }

    public function students()
    {
        //Muchos cursos pueden tener muchas estudiantes
        //Es una Relacion muchos a muchos
        return $this->belongsToMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}

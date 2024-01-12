<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    // RELATIONSHIP
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //ENCAPSULATION
    public function getBodyHtmlAttribute()
    {
        return Str::markdown($this->body);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($answer){
            $answer->question->increment('answers_count');
            $answer->question->save();
        });
    }
}

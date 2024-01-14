<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['title','body'];

    //RELATIONSHIPS
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }






    //ENCAPSULATIONS
    public function setTitleAttribute($value)
    {
            $this->attributes['title'] = $value;
            $this->attributes['slug'] = Str::slug($value);
    }
    
    public function getUrlAttribute()
    {
        return route("questions.show", $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if($this->answers_count > 0){
                if($this->best_answer_id){
                    return "answered-accepted";
                }
                return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return Str::markdown($this->body);
    }

    // METHOD
    public function acceptBestAnswer($answer)
    {
            $this->best_answer_id = $answer;
            $this->save();
    }
    
    
}

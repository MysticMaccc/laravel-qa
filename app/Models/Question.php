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

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps(); //, 'question_id', 'user_id');
    }
    
    //ENCAPSULATIONS
    public function isFavorited()
    {
        return $this->favorites()->where('user_id', request()->user()->id)->count() > 0;
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }    

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

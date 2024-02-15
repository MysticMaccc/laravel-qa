<?php

namespace App\Models;

use App\VotableTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mews\Purifier\Facades\Purifier;

class Answer extends Model
{
    use VotableTrait;
    use HasFactory;
    protected $fillable = [
        'body', 'user_id'
    ];

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
        return Purifier::clean(Str::markdown($this->body));
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
            return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute()
    {
            return $this->isBest();
    }

    public function isBest()
    {
        return $this->id == $this->question->best_answer_id;
    }


    public static function boot()
    {
        parent::boot();

        static::created(function ($answer){
            $answer->question->increment('answers_count');
        });

        static::deleted(function ($answer){
            $answer->question->decrement('answers_count');
        });
    }


    
}

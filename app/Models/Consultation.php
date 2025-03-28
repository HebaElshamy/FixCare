<?php

namespace App\Models;

use App\Models\ConsultationResponse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($consultation) {
            $latest = static::latest()->first();
            $number = $latest ? ((int) filter_var($latest->consultation_number, FILTER_SANITIZE_NUMBER_INT)) + 1 : 5000;
            $consultation->consultation_number = 'FIX' . $number;
        });
    }

    protected $fillable = ['consultation_number','consultation_topic', 'client_id', 'team_id', 'status','original_consultation' , 'image'];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function team()
    {
        return $this->belongsTo(User::class, 'team_id');
    }

    public function responses()
{
    return $this->hasMany(ConsultationResponse::class);
}
}

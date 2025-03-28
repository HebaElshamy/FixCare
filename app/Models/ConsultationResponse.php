<?php

namespace App\Models;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationResponse extends Model
{
    use HasFactory;
    protected $fillable = [
        'consultation_id',
        'user_id',
        'response',
        'role',
    ];


    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

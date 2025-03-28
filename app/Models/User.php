<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Consultation;
use App\Models\ConsultationResponse;
use App\Models\HomeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'cv_path',
        'phone',
        'company_name',
        'experience_years',
        'consultation_fee',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public static function countByRole($role)
    {
        return self::where('role', $role)->count();
    }

    public function clientConsultations()
    {
        return $this->hasMany(Consultation::class, 'client_id');
    }
    public function clientHomeService()
    {
        return $this->hasMany(HomeService::class, 'client_id');
    }

    public function teamConsultations()
    {
        return $this->hasMany(Consultation::class, 'team_id');
    }
    public function responses()
{
    return $this->hasMany(ConsultationResponse::class);
}


}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'matricule_number',
        'birth_date',
        'registration_date',
        'email',
        'password',
        'cycle_id',
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

    public function isAdmin()
    {
        return $this->hasRole(['admin', 'super_admin']);
    }

    public function getRoleNameAttribute()
    {
        return $this->roles->first()->display_name ?? null;
    }

    public function getRoleAttribute()
    {
        return $this->roles->first()->name ?? null;
    }

    public function getNameAttribute()
    {
        return $this->first_name. " " .$this->last_name;
    }

    public function getAvatarAttribute()
    {
        return asset('admin/images/avatars/default.png') ;
    }
}

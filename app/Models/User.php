<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
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

    function cycles()
    {
        return $this->belongsToMany(Cycle::class, 'cycle_user');
    }

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

    function scopeList($query, $search='')
    {
        return $query->orderBy('matricule_number')
                    ->when(!blank($search), function($q)use($search){
                        $q->where(function($q) use($search){
                            $q->where('label', 'LIKE', "%$search%")
                                ->orWhere('description', 'LIKE', "%$search%")
                                ->orWhere('format', 'LIKE', "%$search%");
                        });
                    });
    }

    public static function createStudent($data, $role) : self 
    {
        $matricule = self::generateMatricule($data);

        $data = array_merge($data, ['matricule_number' => $matricule]);
        
        $user = self::create($data);

        $role = Role::whereName($role)->first();
        if (!blank($role))
            $user->assignRole($role);
            
        $user->cycles()->attach($data['cycle_id']);

        return $user;
    }

    public static function generateMatricule($data) : string
    {
        //dd(substr($data['first_name'], 0, 1));
        $cycle = Cycle::findOrFail($data['cycle_id']);

        $matricule = $cycle->format;
        $matricule = str_replace('{YEAR}', date('Y'), $matricule);
        $matricule = str_replace('{MONTH}', date('m'), $matricule);
        $matricule = str_replace('{DAY}', date('d'), $matricule);
        $matricule = str_replace('{TC}', self::role('student')->count() + 1, $matricule);
        $matricule = str_replace('{CC}', DB::table('cycle_user')->where('cycle_id', $data['cycle_id'])->count() + 1, $matricule);

        if($cycle->label == 'BTS')
            $matricule = str_replace('{G}', $data['gender'], $matricule);
        if($cycle->label == 'Licence'){
            $matricule = str_replace('{FN}', substr($data['first_name'], 0, 1), $matricule);
            $matricule = str_replace('{LN}', substr($data['last_name'], 0, 1), $matricule);
        }
        
        return $matricule;
    }
}

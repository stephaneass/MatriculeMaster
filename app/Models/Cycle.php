<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    public static $YEAR = '{YEAR}';
    public static $MONTH = '{MONTH}';
    public static $DAY = '{DAY}';
    public static $TC = '{TC}';
    public static $CC = '{CC}';
    public static $G = '{G}';
    public static $FN = '{FN}';
    public static $LN = '{LN}';

    protected $guarded = [];

    function users()
    {
        return $this->belongsToMany(User::class, 'user_user');
    }
    
    function students()
    {
        return $this->hasMany(User::class);
    }

    function scopeList($query, $search='')
    {
        return $query->orderBy('label')
                    ->when(!blank($search), function($q)use($search){
                        $q->where(function($q) use($search){
                            $q->where('label', 'LIKE', "%$search%")
                                ->orWhere('description', 'LIKE', "%$search%")
                                ->orWhere('format', 'LIKE', "%$search%");
                        });
                    });
    }

    public static function checkIfFormatIsValide($format, $label) : bool
    {
        if (!str_contains($format, Cycle::$YEAR))
            return false;
        if (!str_contains($format, Cycle::$MONTH))
            return false;
        if (!str_contains($format, Cycle::$DAY))
            return false;
        if (!str_contains($format, Cycle::$TC))
            return false;
        if (!str_contains($format, Cycle::$CC))
            return false;
        
        if ($label == 'BTS' && !str_contains($format, Cycle::$G))
            return false;
        
        if ($label == 'Licence' && !str_contains($format, Cycle::$FN))
            return false;
        if ($label == 'Licence' && !str_contains($format, Cycle::$LN))
            return false;
        
        return true;
    }
}

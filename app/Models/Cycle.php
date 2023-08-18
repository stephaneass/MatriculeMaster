<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    protected $guarded = [];

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
}

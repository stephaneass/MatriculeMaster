<?php

use Illuminate\Support\Carbon;

if (!function_exists("formatDate")) {
    function formatDate($date)
    {
        if(in_array($date, [NULL, "null"]))
            return "";
        return Carbon::parse($date)->locale('fr_FR')->isoFormat('DD/MM/YYYY');
    }
}

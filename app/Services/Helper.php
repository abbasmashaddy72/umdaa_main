<?php

namespace App\Services;

use App\Models\StaticOption;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Helper
{
    // Gets ENUM values Data from DB in array format
    public static function getEnum($table_name, $colum_name)
    {
        $values = DB::select(DB::raw('SHOW COLUMNS FROM ' . $table_name . ' WHERE Field = "' . $colum_name . '"'));

        preg_match('/^enum\((.*)\)$/', $values[0]->Type, $matches);
        foreach (explode(',', $matches[1]) as $value) {
            $enum[trim($value, "'")] = trim($value, "'");
        }

        return $enum;
    }

    // Gets array of custom key & values from Model
    public static function getKeyValues($model, $value, $key, $where_column = null, $where_id = null)
    {
        $model = "\\App\\Models\\" . $model;
        if ($where_column != null && $where_id != null) {
            $data = $model::where($where_column, $where_id)->pluck($value, $key);
        } else {
            $data = $model::all()->pluck($value, $key);
        }

        return $data;
    }

    // Gets array of custom key & values from Model Based of Grouped Colum
    public static function getGroupedKeyValues($model, $group_by, $value, $key)
    {
        $model = "\\App\\Models\\" . $model;

        $data = $model::get()->groupBy($group_by)->map(fn ($type) => $type->pluck($value, $key));

        return $data;
    }

    // Create or Update Static option value in DB
    public static function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            Cache::forget($key);
            return true;
        }
        return false;
    }

    // Get Static Value from DB
    public static function get_static_option($key)
    {
        global $option_name;
        $option_name = $key;
        $value = StaticOption::where('option_name', $option_name)->first();
        Cache::remember($option_name, 86400, function () {
            global $option_name;
            return StaticOption::where('option_name', $option_name)->first();
        });

        return !empty($value) ? $value->option_value : null;
    }

    // Delete Static Option with Value
    public static function delete_static_option($key)
    {
        StaticOption::where('option_name', $key)->delete();
        return true;
    }

    // Time Slots
    public static function getTimeSlots($start, $end, $gap)
    {
        // $period = new CarbonPeriod($start, $gap . ' minutes', $end); // for create use 24 hours format later change format
        $period = Carbon::parse($start)->toPeriod($end, $gap . ' minutes');
        $slots = [];
        foreach ($period as $item) {
            array_push($slots, $item->format("h:i A"));
        }

        return $slots;
    }

    // Route Action
    public static function getRouteAction()
    {
        return substr(strstr(Route::currentRouteAction(), '@'), 1);
    }
}

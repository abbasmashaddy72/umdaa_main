<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

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
}

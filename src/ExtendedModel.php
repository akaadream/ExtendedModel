<?php

namespace Akaadream\ExtendedModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class ExtendedModel extends Model
{
    /**
     * Hydrate a model instance with request and options
     *
     * @param ExtendedModel $instance
     * @param Request $request
     * @param array $options
     * @return ExtendedModel
     */
    public static function createOrUpdateWith(ExtendedModel $instance, Request $request, array $options = [])
    {
        foreach ($request->all() as $key => $value)
        {
            if (!Schema::hasColumn($instance->getTable(), $key))
            {
                continue;
            }

            if (Arr::has($options, $key)) {
                $instance->$key = $options[$key];
                continue;
            }

            $instance->$key = $value;
        }

        $instance->save();
        return $instance;
    }
}

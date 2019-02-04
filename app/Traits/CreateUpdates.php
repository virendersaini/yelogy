<?php

namespace App\Traits;

trait CreateUpdates
{
    protected function updateCreate(array $data, $id=null)
    {
        if (empty($id)) {
            $model = new self;
        } else {
            $model = self::find($id);
        }

        $model->fill($data);

        $model = tap($model)->save();

        return $model;
    }
}

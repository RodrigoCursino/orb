<?php
/**
 * Created by PhpStorm.
 * User: rodrigo
 * Date: 21/03/19
 * Time: 22:19
 */

namespace App\Helpers;

use Webpatser\Uuid\Uuid;

trait Uuids
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate(4)->string;
        });

    }
}
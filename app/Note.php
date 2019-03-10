<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string uuid
 * @property string title
 * @property string text
 * @property int date_create
 * @property int date_update
 */
class Note extends Model
{
    protected $table = 'notes';

    protected $keyType = 'uuid';

    public $timestamps = false;

    protected $guarded = [];
}

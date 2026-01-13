<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Task extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [ 'title', 'description', 'completed' ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'description', 'completed'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $fillable = [
        'user_id',
        'ip',
        'event',
        'extra'
    ];

    public static function records($user_id = null, $event = null, $extra = null)
    {
        return Log::create([
            'user_id' => is_null($user_id) ? null : $user_id->id,
            'ip' => request()->ip(),
            'event' => is_null($event) ? null : $event,
            'extra' => is_null($extra) ? null : $extra
        ]);
    }

    
}

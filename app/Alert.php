<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = ['id', 'title', 'event', 'template_type', 'template_id', 'fire', 'reminder_time', 'notify_to', 'meta',];

    protected $casts = [
    	'meta' => 'array'
    ];

    public function scopeEvent($query, $eventName)
    {
    	return $query->whereEvent($eventName);
    }

    public function getTemplate()
    {
    	return new EmailTemplate;
    }
}

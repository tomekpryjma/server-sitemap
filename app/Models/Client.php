<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'contacts',
        'website',
        'notes'
    ];

    protected $casts = [
        'contact' => 'array'
    ];

    /**
     * Get all sites that were built for this client.
     */
    public function sites()
    {
        return $this->hasMany('\App\Models\Site');
    }
}

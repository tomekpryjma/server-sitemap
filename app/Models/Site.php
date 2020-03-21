<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * Get the server this site is hosted on.
     */
    public function server()
    {
        return $this->belongsTo('\App\Models\Server');
    }
 
    /**
     * Get the client that this site was built for.
     */
    public function client()
    {
        return $this->belongsTo('\App\Models\Client');
    }
}

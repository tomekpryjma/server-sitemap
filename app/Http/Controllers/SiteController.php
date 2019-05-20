<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \App\Models\Site;

class SiteController extends Controller
{
    /**
     * Add site to the database & assign it the correct
     * server ID.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'url' => 'required|max:255',
            'server_id' => 'required|integer'
        ]);
    
        if ($validator->fails()) {
            return redirect('/servers')
                ->withInput()
                ->withErrors($validator->errors());
        }
    
        $site = new Site;
        $site->name = $request->name;
        $site->url = $request->url;
        $site->server_id = $request->server_id;
        $site->save();
    
        return redirect('/servers');
    }
}

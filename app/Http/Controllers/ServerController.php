<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \App\Models\Server;

class ServerController extends Controller
{
    /**
     * List all server in the database.
     * 
     * @return view
     */
    public function index()
    {
        $servers = Server::orderBy('created_at', 'asc')->get();

        return view('servers', [
            'servers' => $servers
        ]);
    }

    /**
     * Add a server to the database.
     * 
     * @param \Illuminate\Http\Request
     * @return redirect
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'ip_address' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/servers')
                ->withInput()
                ->withErrors($validator->errors());
        }

        $server = new Server;
        $server->name = $request->name;
        $server->ip_address = $request->ip_address;
        $server->save();

        return redirect('/servers');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \App\Models\Server;
use \App\Models\Client;

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
        $clients = Client::orderBy('name', 'asc')->get();

        return view('server.index', compact('servers', 'clients'));
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
            return redirect('/')
                ->withInput()
                ->withErrors($validator->errors());
        }

        $server = new Server;
        $server->name = $request->name;
        $server->ip_address = $request->ip_address;
        $server->save();

        return redirect('/');
    }

    /**
     * Delete a server from the database.
     * 
     * @param int
     */
    public function delete($id)
    {
        $server = Server::find($id);
        $deleted = $server->delete();

        if (! $deleted) {
            return back()
                ->withInput()
                ->withErrors(['server_delete_failed' => 'Failed to delete server.']);
        }

        return redirect('/');
    }
}

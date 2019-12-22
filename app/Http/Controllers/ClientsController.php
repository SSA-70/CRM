<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientsRequest;
Use Auth;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $clients = Client::whereNull('checked_at')->get();
        } else {
            $clients = Client::whereNull('checked_at')->where('user_id', '=', $user->id)->get();
        }

        return view('clients.index', compact('clients', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $client = new Client();

        $client->user_id = $user->id;
        $client->owner_id = $user->id;
        $client->azs_id = $user->place_id;
        return view('clients.create', compact('user', 'client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        $this->validate($request,['card_number'=>'unique:clients'],['card_number.unique'=>'такой номер карты уже существует в базе']);
        Client::create($request->all());
        return redirect('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        $user = Auth::user();

        return view('clients.show', compact('client', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $user = Auth::user();
        return view('clients.edit', compact('client', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        if($client->card_number != $request->card_number){
            $this->validate($request,['card_number'=>'unique:clients'],['card_number.unique'=>'такой номер карты уже существует в базе']);
        }
        $client->update($request->all());
        $user = Auth::user();
        return view('clients.show', compact('client', 'user'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        //   $client->is_deleted = true;
        //   $client->save();
        return redirect('clients');
    }
}

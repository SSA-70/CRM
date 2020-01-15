<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientsRequest;
Use Auth;
Use Carbon\Carbon;
use Illuminate\Http\Request;






class ClientsDBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $clients_db = Client::where('is_deleted', 0)->whereNotNull('checked_at')->orderby('card_number', 'desc')->limit(1000)->get();
        $clients_ws = Client::whereNull('checked_at')->orderby('card_number', 'desc')->get();
        $clients_del = Client::where('is_deleted', 1)->orderby('updated_at', 'desc')->get();

        return view('clients_db.index', compact('clients_db', 'clients_ws', 'clients_del', 'user'));
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
        return view('clients_db.create', compact('user', 'client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        $this->validate($request,['card_number'=>'unique:clients'],['card_number.unique'=>'такой номер карты уже существует в базе']);
        $request['checked_at'] = Carbon::now()->toDateTimeString();
        Client::create($request->all());
        return redirect('clients_db');
    }

    public function search(Request $request)
    {

        $user = Auth::user();
        $clients_db = Client::where('card_number', $request->input('search'))
                ->orWhere('firstname', $request->input('search'))
                ->orWhere('lastname', $request->input('search'))
                ->orWhere('patronymic', $request->input('search'))
                /**->orWhere('birthday', $request->input('search'))**/
                ->orWhere('mobile_number', $request->input('search'))
                ->orWhere('mobile_number_addition', $request->input('search'))
                ->orWhere('phone_number', $request->input('search'))
                ->orWhere('email', $request->input('search'))
                ->orWhere('address', $request->input('search'))
                ->orWhere('comment', $request->input('search'))
                /**->orWhere('sold_at', $request->input('search'))**/
                ->where('is_deleted', 0)->whereNotNull('checked_at')->orderby('card_number', 'desc')->limit(1000)->get();
        $clients_ws = Client::whereNull('checked_at')->orderby('card_number', 'desc')->get();
        $clients_del = Client::where('is_deleted', 1)->orderby('updated_at', 'desc')->get();
        return view('clients_db.index', compact('clients_db', 'clients_ws', 'clients_del', 'user'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        $user = Auth::user();

        return view('clients_db.show', compact('client', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $user = Auth::user();
        return view('clients_db.edit', compact('client', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        if($client->card_number != $request->card_number){
            $this->validate($request,['card_number'=>'unique:clients'],['card_number.unique'=>'такой номер карты уже существует в базе']);
        }
        /** если не чекнутый - чекаем (функционал для заявок) **/
        if(is_null($client->checked_at))
        {
            $client->checked_at = Carbon::now()->toDateTimeString();
        }
        $client->update($request->all());
        $user = Auth::user();
        return view('clients_db.show', compact('client', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_deleted' => 1]);
        //   $client->is_deleted = true;
        //   $client->save();
        return redirect('clients_db');
    }
}

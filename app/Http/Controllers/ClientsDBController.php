<?php

namespace App\Http\Controllers;

use App\Client;
use App\Places;
use App\User;
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
    public function index(Request $request)
    {
        $operatorSql ='';
        $operator = User::where('firstname',$request->input('search'))->pluck('id');
        if(!empty($operator)){
            foreach ($operator as $op) {
                $operatorSql = $operatorSql . ' or `user_id` LIKE \'%' . $op.'%\'';
            }
        }
        $azsSql ='';
        $azs = Places::where('name',$request->input('search'))->pluck('id');
        if(!empty($azs)){
            foreach ($azs as $az){
                $azsSql=$azsSql.' or `azs_id` LIKE \'%'.$az.'%\'';
            }
        }

        $searchsql = '(
                `card_number` LIKE \'%'.$request->input('search').'%\' or
                `firstname` LIKE \'%'.$request->input('search').'%\' or
                `lastname` LIKE \'%'.$request->input('search').'%\' or
                `patronymic` LIKE \'%'.$request->input('search').'%\' or
                `mobile_number` LIKE \'%'.$request->input('search').'%\' or
                `mobile_number_addition` LIKE \'%'.$request->input('search').'%\' or
                `phone_number` LIKE \'%'.$request->input('search').'%\''.
            $operatorSql.''.$azsSql.')';

        $user = Auth::user();
        $clients_db = Client::whereRaw('is_deleted = 0 and checked_at IS NOT NULL and '.$searchsql)
            ->orderby('card_number', 'desc')->limit(1000)->get();
        $clients_ws = Client::whereRaw('is_deleted = 0 and checked_at IS NULL and '.$searchsql)
            ->orderby('card_number', 'desc')->get();
        $clients_del = Client::whereRaw('is_deleted = 1 and '.$searchsql)
            ->orderby('updated_at', 'desc')->get();
        $searchtext=$request->input('search');
        return view('clients_db.index', compact('clients_db', 'clients_ws', 'clients_del', 'user','searchtext'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $operators = User::get();
        $azs = Places::get();
        $client = new Client();

        $client->user_id = $user->id;
        $client->owner_id = $user->id;
        $client->azs_id = $user->place_id;
        return view('clients_db.create', compact('user', 'client', 'operators','azs'));
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
        $azs = Places::get();
        $operators = User::get();

        return view('clients_db.show', compact('client', 'user','operators','azs'));
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
        $azs = Places::get();
        $operators = User::get();
        return view('clients_db.edit', compact('client', 'user','operators','azs'));
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

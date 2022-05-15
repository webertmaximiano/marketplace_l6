<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;


class StoreController extends Controller
{
    public function index()
    {
        $stores = \App\Store::paginate(10); // pagina o resultado de 10 linhas

        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request) //salvar loja usando a validação do formrequest StoreRequest
    {
       $data = $request -> all();

       //$user = \App\User::find($data['user']); //pega o usuario do data
       $user = auth()->user(); //pega o usuario atenticado ou logado
       $store = $user->store()->create($data);
       
       flash('Loja Criada com Sucesso')->success();
       return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = \App\Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();

        $store = \App\Store::find($store);
        $store->update($data);

        flash('Loja Atualizada com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = \App\Store::find($store);
        $store->delete();
        flash('Loja Removida com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }
}

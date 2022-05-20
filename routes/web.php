<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
    return view('welcome');
});

Route::get('/model', function () {
    
    //    return \App\User::all(); retorna todos usuarios json
    //    return \App\User::find(3); retorna com base no ID
    //    return \App\User::where('name', 'Helga Huels')->get();// select * from users where name='Helga Huels'
    //    return \App\User::paginate(10); //paginação de resultado

    // Mass Assigment = atribuição em massa
    /*$user = \App\User::create([
    'name' => 'Webert Maximiano',
    'email' => 'webert@clube.com',
    'password' => bcrypt('12345678')
    ]);*/

    //Mass Update
    /*$user = \App\User::find(81);
    $user->update([
    'name' => 'Atualizando com Mass Update'
    ]); //true ou false

    dd($user); */

    // pegando uma loja de um usuário
    //$user = \App\User::find(4);
    //return $user->store; //objeto unico(store) se for collectio de dados(objetos)
    //dd($user->store()->count()); //conta o numero de lojas por usuarios
    // pegar os produtos de uma loja
    //$loja = \App\Store::find(1);
    //return $loja->products; //coleção
    //dd( $loja->products()->where('id', 1)->get());

    /*//criar uma loja para um usuario
    $user = \App\User::find(10);
    $store = $user->store()->create([
    'name' => 'Loja Azenka',
    'description' => 'Loja de cosméticos',
    'mobile_phone' => 'xx-xxxxx-xxxx',
    'phone' => 'xx-xxxxx-xxxx',
    'slug' => 'loja-teste'
    ]);
    dd($store);*/
    /*
    //criando um produto para uma loja
    $store = \App\Store::find(41);
    $product = $store->products()->create([
    'name'=> 'Ampola de chantilly',
    'description'=> '$faker->sentence',
    'body'=> '$faker->paragraph(5, true)',
    'price' => 70.00, //2 casas decimais, minimo 1 e máximo 10
    'slug'=> 'ampola-de-chantilly',
    ]);
    dd($product);
    */
    /*
    //criando uma Categoria
    \App\Category::create([
    'name' => 'cabelos teste',
    'description' => 'produtos cabelos',
    'slug' =>'cabelos-teste'

    ]);
    return \App\Category::all();
    //return \App\User::all();
    */
     return \App\User::all();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin lojas
/*
Route::get('/admin/stores', 'Admin\\StoreController@index');
Route::get('/admin/stores/create', 'Admin\\StoreController@create');
Route::post('/admin/stores/store', 'Admin\\StoreController@store');
*/
    //organizando rotas

Route::group(['middleware'=>['auth']], function(){
   
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
        //usando apelidos função name
        /*Route::prefix('stores')->name('stores.')->group(function(){
        Route::get('/', 'StoreController@index')->name('index');
        Route::get('/create', 'StoreController@create')->name('create');
        Route::post('/store', 'StoreController@store')->name('store');    
        Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        Route::post('/update/{store}', 'StoreController@update')->name('update');
        Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');      
    */
    Route::resource('stores', 'StoreController');    

    Route::resource('products', 'ProductController');
    
    Route::resource('categories', 'CategoryController');
    
});

});    
 
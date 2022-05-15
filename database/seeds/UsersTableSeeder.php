<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 /*       \DB::table('users')->insert(
            [
                'name' =>'Administrator',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => 'assdasddmfdslgmfgfmkfl',
            ]
    
        );
 */ //função factory cria dados automáticos faker, chame a função, passa o model, a quantidade e passa o método 
    // factory(\App\User::class, 40)->create(); //metodo create trabalha com arrays
//criando dados de usuarios e lojas com save e make
    factory(\App\User::class, 40)->create()->each(function($user){
        $user->store()->save(factory(\App\Store::class)->make());
    });
    }
}

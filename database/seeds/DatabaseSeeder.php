<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Agenda\Pessoa::class,30)->create();
        factory(\Agenda\Telefone::class,80)->create();

    }
}



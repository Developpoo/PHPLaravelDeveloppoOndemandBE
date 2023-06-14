<?php

namespace Database\Seeders;

use App\Models\AttoreModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttoreModel::create(["idAttore" => 1, "idNazione" => 1, "nome" => "Bud Spencer"]);
        AttoreModel::create(["idAttore" => 2, "idNazione" => 1, "nome" => "Terence Hill"]);
        AttoreModel::create(["idAttore" => 3, "idNazione" => 234, "nome" => "Farley Granger"]);
        AttoreModel::create(["idAttore" => 4, "idNazione" => 1, "nome" => "Remo Capitani"]);
        AttoreModel::create(["idAttore" => 5, "idNazione" => 57, "nome" => "Steffen Zacharias"]);
        AttoreModel::create(["idAttore" => 6, "idNazione" => 70, "nome" => "Yanti Somer"]);
        AttoreModel::create(["idAttore" => 7, "idNazione" => 1, "nome" => "Enzo Fiermonte"]);
        AttoreModel::create(["idAttore" => 8, "idNazione" => 1, "nome" => "Adriano Micantoni"]);
        AttoreModel::create(["idAttore" => 9, "idNazione" => 1, "nome" => "Furio Meniconi"]);
        AttoreModel::create(["idAttore" => 10, "idNazione" => 77, "nome" => "John Sharp"]);
        AttoreModel::create(["idAttore" => 11, "idNazione" => 68, "nome" => "Patty Shepard"]);
        AttoreModel::create(["idAttore" => 12, "idNazione" => 68, "nome" => "Deogratias Huerta"]);
        AttoreModel::create(["idAttore" => 13, "idNazione" => 234, "nome" => "Buffy Dee"]);
        AttoreModel::create(["idAttore" => 14, "idNazione" => 1, "nome" => "Riccardo Pizzuti"]);
        AttoreModel::create(["idAttore" => 15, "idNazione" => 234, "nome" => "David Huddleston"]);
        AttoreModel::create(["idAttore" => 16, "idNazione" => 234, "nome" => "Faith Minton"]);
        AttoreModel::create(["idAttore" => 17, "idNazione" => 1, "nome" => "Luciano Catenacci"]);
        AttoreModel::create(["idAttore" => 18, "idNazione" => 1, "nome" => "Enzo Maggio (II)"]);
        AttoreModel::create(["idAttore" => 19, "idNazione" => 1, "nome" => "Claudio Ruffini"]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FilmNazioneModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(
            [
                ConfigurationSeeder::class,
                TipoIndirizzoSeeder::class,
                UserStatusSeeder::class,
                UserClientSeeder::class,
                NazioneSeeder::class,
                UserRoleSeeder::class,
                ComuneSeeder::class,
                IndirizzoSeeder::class,
                UserAbilitySeeder::class,
                UserAuthSeeder::class,
                UserPasswordSeeder::class,
                UserAccessSeeder::class,
                FilmSeeder::class,
                UserRoleAbilitySeeder::class,
                CreditSeeder::class,
                UserSessionSeeder::class,
                TipoRecapitoSeeder::class,
                RecapitoSeeder::class,
                UserClientRoleSeeder::class,
                FilmNazioneSeeder::class,
                AttoreSeeder::class,
                RegistaSeeder::class,
                FilmAttoreSeeder::class,
                FilmRegistaSeeder::class,
                LinguaSeeder::class,
                TraduzioneSeeder::class,
                TraduzioneCustomSeeder::class,
                FileSeeder::class,
                CategorySeeder::class,
                FilmCategorySeeder::class,
                TipoFileSeeder::class,
                FilmFileSeeder::class
            ]
        );
    }
}

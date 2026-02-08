<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $expert1 = \App\Models\Expert::create([
            'nomExp' => 'Dupont',
            'prenomExp' => 'Jean',
            'telExp' => '0601020304',
            'specialiteExp' => 'Developpement Web',
            'emailExp' => 'jean.dupont@example.com'
        ]);

        $expert2 = \App\Models\Expert::create([
            'nomExp' => 'Martin',
            'prenomExp' => 'Alice',
            'telExp' => '0605060708',
            'specialiteExp' => 'Cybersecurite',
            'emailExp' => 'alice.martin@example.com'
        ]);

        $event1 = \App\Models\Evenement::create([
            'theme' => 'Conférence Informatique Avancée',
            'date_debut' => '2024-04-01',
            'date_fin' => '2024-04-03',
            'description' => 'Conférence sur les dernières avancées en informatique',
            'cout_journalier' => 500,
            'expert_id' => $expert1->id
        ]);

        $event2 = \App\Models\Evenement::create([
            'theme' => 'Atelier de Programmation Java',
            'date_debut' => '2024-05-01',
            'date_fin' => '2024-05-03',
            'description' => 'Atelier pratique de programmation Java',
            'cout_journalier' => 550,
            'expert_id' => $expert1->id
        ]);
        
        $event3 = \App\Models\Evenement::create([
            'theme' => 'Hackathon Cybersecurity',
            'date_debut' => '2024-06-01',
            'date_fin' => '2024-06-03',
            'description' => 'Compétition de sécurité informatique',
            'cout_journalier' => 600,
            'expert_id' => $expert1->id
        ]);
         
         $event4 = \App\Models\Evenement::create([
            'theme' => 'Conférence Médicale Internationale',
            'date_debut' => '2024-05-15',
            'date_fin' => '2024-05-17',
            'description' => 'Conférence médicale internationale',
            'cout_journalier' => 700,
            'expert_id' => $expert2->id 
        ]);


        \App\Models\Atelier::create([
            'nomAtelier' => 'Atelier de Développement Web',
            'descriptionAtelier' => 'Pratique avancée sur les technologies web modernes',
            'evenement_id' => $event1->id
        ]);

        \App\Models\Atelier::create([
            'nomAtelier' => 'Atelier de Sécurité Informatique',
            'descriptionAtelier' => 'Séances pratiques pour renforcer la sécurité des applications',
            'evenement_id' => $event1->id
        ]);
    }
}

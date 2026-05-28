<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Models\Apprenant;
use App\Models\Filiere;
use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        if (Filiere::query()->exists()) {
            return;
        }

        $filieres = collect([
            [
                'nom' => 'Developpement Web',
                'description' => 'Formation orientee applications web et architecture logicielle.',
                'duree' => '12 mois',
            ],
            [
                'nom' => 'Genie Logiciel',
                'description' => 'Parcours axe conception, qualite et cycle de vie logiciel.',
                'duree' => '10 mois',
            ],
            [
                'nom' => 'Informatique de Gestion',
                'description' => 'Programme centre sur les outils numeriques et la gestion des donnees.',
                'duree' => '9 mois',
            ],
        ])->map(fn (array $data) => Filiere::query()->create($data));

        $apprenants = [
            [
                'matricule' => 'CFTP-2026-001',
                'nom' => 'Diallo',
                'prenom' => 'Aminata',
                'sexe' => Gender::Feminin,
                'date_naissance' => '2001-04-16',
                'email' => 'aminata.diallo@example.test',
                'telephone' => '+221700000001',
                'adresse' => 'Dakar, Medina',
                'photo' => 'photos/default-avatar.svg',
                'date_inscription' => now()->subMonths(4)->toDateString(),
                'filiere_id' => $filieres[0]->id,
            ],
            [
                'matricule' => 'CFTP-2026-002',
                'nom' => 'Sow',
                'prenom' => 'Moussa',
                'sexe' => Gender::Masculin,
                'date_naissance' => '2000-11-03',
                'email' => 'moussa.sow@example.test',
                'telephone' => '+221700000002',
                'adresse' => 'Thies, Grand Standing',
                'photo' => 'photos/default-avatar.svg',
                'date_inscription' => now()->subMonths(3)->toDateString(),
                'filiere_id' => $filieres[1]->id,
            ],
            [
                'matricule' => 'CFTP-2026-003',
                'nom' => 'Ba',
                'prenom' => 'Fatou',
                'sexe' => Gender::Feminin,
                'date_naissance' => '2002-02-22',
                'email' => 'fatou.ba@example.test',
                'telephone' => '+221700000003',
                'adresse' => 'Saint-Louis, Sor',
                'photo' => 'photos/default-avatar.svg',
                'date_inscription' => now()->subMonths(2)->toDateString(),
                'filiere_id' => $filieres[2]->id,
            ],
        ];

        foreach ($apprenants as $data) {
            $apprenant = Apprenant::query()->create($data);

            foreach ([
                ['module' => 'Algorithmique', 'note' => 14.50, 'coefficient' => 3],
                ['module' => 'Base de donnees', 'note' => 12.00, 'coefficient' => 2],
                ['module' => 'Developpement web', 'note' => 15.25, 'coefficient' => 4],
            ] as $note) {
                Note::query()->create([
                    'apprenant_id' => $apprenant->id,
                    ...$note,
                ]);
            }
        }
    }
}

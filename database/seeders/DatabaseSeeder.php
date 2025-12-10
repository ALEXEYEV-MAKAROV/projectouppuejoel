<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TeamMember;
use App\Models\Publication;
use App\Models\InterestTopic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear Usuarios (Admin y Auxiliar)
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@prueba.com',
            'password' => Hash::make('admin123'), // Contraseña fácil para pruebas
            'role' => 'admin',
        ]);

        $auxiliar = User::create([
            'name' => 'Colaborador Auxiliar',
            'email' => 'aux@prueba.com',
            'password' => Hash::make('aux123'),
            'role' => 'auxiliar',
        ]);

        // 2. Crear Temas de Interés
        $tema1 = InterestTopic::create([
            'title' => 'Inteligencia Artificial',
            'icon_class' => 'fa-robot', // Ejemplo de clase de icono
            'description' => 'Investigación sobre redes neuronales.',
            'created_by_user_id' => $admin->id,
        ]);
        
        $tema2 = InterestTopic::create([
            'title' => 'Sostenibilidad',
            'icon_class' => 'fa-leaf',
            'description' => 'Proyectos de impacto ambiental positivo.',
            'created_by_user_id' => $admin->id,
        ]);

        // 3. Crear Miembros del Equipo
        $miembro1 = TeamMember::create([
            'name' => 'Dr. Juan Pérez',
            'slug' => 'juan-perez',
            'area' => 'Desarrollo Tecnológico',
            'institution' => 'Universidad Politécnica',
            'email' => 'juan@upp.edu.mx',
            'excerpt' => 'Especialista en IA y Big Data.',
            'is_active' => true,
            'created_by_user_id' => $admin->id,
        ]);

        $miembro2 = TeamMember::create([
            'name' => 'Lic. Ana García',
            'slug' => 'ana-garcia',
            'area' => 'Gestión de Proyectos',
            'institution' => 'Regenera MYPE',
            'email' => 'ana@regenera.com',
            'excerpt' => 'Experta en metodologías ágiles.',
            'is_active' => true,
            'created_by_user_id' => $auxiliar->id, // Este lo creó el auxiliar
        ]);

        // 4. Crear Publicaciones
        $pub1 = Publication::create([
            'publication_year' => 2024,
            'title' => 'Avances en la IA para MYPES',
            'description' => 'Un estudio sobre cómo las pequeñas empresas usan IA.',
            'primary_link' => 'https://google.com',
            'created_by_user_id' => $admin->id,
        ]);

        $pub2 = Publication::create([
            'publication_year' => 2023,
            'title' => 'Gestión Sostenible en Puebla',
            'description' => 'Análisis del impacto ambiental local.',
            'created_by_user_id' => $auxiliar->id,
        ]);

        // 5. RELACIONES (La parte mágica: Llenar las tablas pivote)
        
        // Asignar temas a miembros
        $miembro1->interestTopics()->attach([$tema1->id]); // Juan le interesa IA
        $miembro2->interestTopics()->attach([$tema1->id, $tema2->id]); // Ana le interesan ambos

        // Asignar autores a publicaciones
        $pub1->teamMembers()->attach([$miembro1->id]); // Juan escribió la pub1
        $pub2->teamMembers()->attach([$miembro1->id, $miembro2->id]); // Ambos escribieron la pub2
    }
}
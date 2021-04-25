<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
                'description' => 'accès à la gestion des utilisateurs',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
                'description' => 'créer permission ',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
                'description' => 'modifier permission',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
                'description' => 'afficher permission',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
                'description' => 'supprimer permission',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
                'description' => 'accès permission',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
                'description' => 'créer role',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
                'description' => 'modifier role',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
                'description' => 'afficher role',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
                'description' => 'supprimer role',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
                'description' => 'accès role',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
                'description' => 'créer utilisateur',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
                'description' => 'modifier utilisateur',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
                'description' => 'afficher utilisateur',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
                'description' => 'supprimer utilisateur',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
                'description' => 'accès utilisateur',
            ],
            [
                'id'    => 17,
                'title' => 'teacher_create',
                'description' => 'créer enseignant ',
            ],
            [
                'id'    => 18,
                'title' => 'teacher_edit',
                'description' => 'modifier enseignant',
            ],
            [
                'id'    => 19,
                'title' => 'teacher_show',
                'description' => 'afficher enseignant',
            ],
            [
                'id'    => 20,
                'title' => 'teacher_delete',
                'description' => 'supprimer enseignant',
            ],
            [
                'id'    => 21,
                'title' => 'teacher_access',
                'description' => 'accès enseignant',
            ],
            [
                'id'    => 22,
                'title' => 'quiz_create',
                'description' => 'créer quiz',
            ],
            [
                'id'    => 23,
                'title' => 'quiz_edit',
                'description' => 'modifier quiz',
            ],
            [
                'id'    => 24,
                'title' => 'quiz_show',
                'description' => 'afficher quiz',
            ],
            [
                'id'    => 25,
                'title' => 'quiz_delete',
                'description' => 'supprimer quiz',
            ],
            [
                'id'    => 26,
                'title' => 'quiz_access',
                'description' => 'accès quiz',
            ],
            [
                'id'    => 27,
                'title' => 'question_create',
                'description' => 'créer question',
            ],
            [
                'id'    => 28,
                'title' => 'question_edit',
                'description' => 'modifier question',
            ],
            [
                'id'    => 29,
                'title' => 'question_show',
                'description' => 'afficher question',
            ],
            [
                'id'    => 30,
                'title' => 'question_delete',
                'description' => 'supprimer question',
            ],
            [
                'id'    => 31,
                'title' => 'question_access',
                'description' => 'accès question',
            ],
            [
                'id'    => 32,
                'title' => 'student_create',
                'description' => 'créer étudiant',
            ],
            [
                'id'    => 33,
                'title' => 'student_edit',
                'description' => 'modifier étudiant',
            ],
            [
                'id'    => 34,
                'title' => 'student_show',
                'description' => 'afficher étudiant',
            ],
            [
                'id'    => 35,
                'title' => 'student_delete',
                'description' => 'supprimer étudiant',
            ],
            [
                'id'    => 36,
                'title' => 'student_access',
                'description' => 'accès étudiant',
            ],
            [
                'id'    => 37,
                'title' => 'answer_create',
                'description' => 'créer réponse',
            ],
            [
                'id'    => 38,
                'title' => 'answer_edit',
                'description' => 'modifier réponse',
            ],
            [
                'id'    => 39,
                'title' => 'answer_show',
                'description' => 'afficher réponse',
            ],
            [
                'id'    => 40,
                'title' => 'answer_delete',
                'description' => 'supprimer réponse',
            ],
            [
                'id'    => 41,
                'title' => 'answer_access',
                'description' => 'accès réponse',
            ],
            [
                'id'    => 42,
                'title' => 'classe_create',
                'description' => 'créer classe',
            ],
            [
                'id'    => 43,
                'title' => 'classe_edit',
                'description' => 'modifier classe',
            ],
            [
                'id'    => 44,
                'title' => 'classe_show',
                'description' => 'afficher classe',
            ],
            [
                'id'    => 45,
                'title' => 'classe_delete',
                'description' => 'supprimer classe',
            ],
            [
                'id'    => 46,
                'title' => 'classe_access',
                'description' => 'accès classe',
            ],
            [
                'id'    => 47,
                'title' => 'profile_password_edit',
                'description' => 'modification du mot de passe du profil',
            ],
        ];

        Permission::insert($permissions);
    }
}
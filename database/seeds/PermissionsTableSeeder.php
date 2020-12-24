<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
                'slug' => 'user-management-access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
                'slug' => 'permission-create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
                'slug' => 'permission-edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
                'slug' => 'permission-show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
                'slug' => 'permission-delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
                'slug' => 'permission-access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
                'slug' => 'role-create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
                'slug' => 'role-edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
                'slug' => 'role-show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
                'slug' => 'role-delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
                'slug' => 'role-access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
                'slug' => 'user-create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
                'slug' => 'user-edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
                'slug' => 'user-show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
                'slug' => 'user-delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
                'slug' => 'user-access',
            ],
            [
                'id'    => '17',
                'title' => 'subject_create',
                'slug' => 'subject-create',
            ],
            [
                'id'    => '18',
                'title' => 'subject_edit',
                'slug' => 'subject-edit',
            ],
            [
                'id'    => '19',
                'title' => 'subject_show',
                'slug' => 'subject-show',
            ],
            [
                'id'    => '20',
                'title' => 'subject_delete',
                'slug' => 'subject-delete',
            ],
            [
                'id'    => '21',
                'title' => 'subject_access',
                'slug' => 'subject-access',
            ],
            [
                'id'    => '22',
                'title' => 'question_create',
                'slug' => 'question-create',
            ],
            [
                'id'    => '23',
                'title' => 'question_edit',
                'slug' => 'question-edit',
            ],
            [
                'id'    => '24',
                'title' => 'question_show',
                'slug' => 'question-show',
            ],
            [
                'id'    => '25',
                'title' => 'question_delete',
                'slug' => 'question-delete',
            ],
            [
                'id'    => '26',
                'title' => 'question_access',
                'slug' => 'question-access',
            ],
            [
                'id'    => '27',
                'title' => 'answer_create',
                'slug' => 'answer-create',
            ],
            [
                'id'    => '28',
                'title' => 'answer_edit',
                'slug' => 'answer-edit',
            ],
            [
                'id'    => '29',
                'title' => 'answer_show',
                'slug' => 'answer-show',
            ],
            [
                'id'    => '30',
                'title' => 'answer_delete',
                'slug' => 'answer-delete',
            ],
            [
                'id'    => '31',
                'title' => 'answer_access',
                'slug' => 'answer-access',
            ],
            [
                'id'    => '32',
                'title' => 'answer_download',
                'slug' => 'answer-download',
            ],
            [
                'id'    => '33',
                'title' => 'question_download',
                'slug' => 'question-download',
            ],
            [
                'id'    => '34',
                'title' => 'program_create',
                'slug' => 'program-create',
            ],
            [
                'id'    => '35',
                'title' => 'program_edit',
                'slug' => 'program-edit',
            ],
            [
                'id'    => '36',
                'title' => 'program_show',
                'slug' => 'program-show',
            ],
            [
                'id'    => '37',
                'title' => 'program_delete',
                'slug' => 'program-delete',
            ],
            [
                'id'    => '38',
                'title' => 'program_access',
                'slug' => 'program-access',
            ], 
            [
                'id'    => '39',
                'title' => 'form_create',
                'slug' => 'form-create',
            ],
            [
                'id'    => '40',
                'title' => 'form_edit',
                'slug' => 'form-edit',
            ],
            [
                'id'    => '41',
                'title' => 'form_show',
                'slug' => 'form-show',
            ],
            [
                'id'    => '42',
                'title' => 'form_delete',
                'slug' => 'form-delete',
            ],
            [
                'id'    => '43',
                'title' => 'form_access',
                'slug' => 'form-access',
            ],     
            [
                'id'    => '44',
                'title' => 'form_download',
                'slug' => 'form-download',
            ],    
            [
                'id'    => '45',
                'title' => 'card_download',
                'slug' => 'card-download',
            ], 
            [
                'id'    => '46',
                'title' => 'group_create',
                'slug' => 'group-create',
            ],
            [
                'id'    => '47',
                'title' => 'group_edit',
                'slug' => 'group-edit',
            ],
            [
                'id'    => '48',
                'title' => 'group_show',
                'slug' => 'group-show',
            ],
            [
                'id'    => '49',
                'title' => 'group_delete',
                'slug' => 'group-delete',
            ],
            [
                'id'    => '50',
                'title' => 'group_access',
                'slug' => 'group-access',
            ],                     
            [
                'id'    => '51',
                'title' => 'triplicate_download',
                'slug' => 'triplicate-download',
            ],  
            [
                'id'    => '52',
                'title' => 'faculty_create',
                'slug' => 'faculty-create',
            ],
            [
                'id'    => '53',
                'title' => 'faculty_edit',
                'slug' => 'faculty-edit',
            ],
            [
                'id'    => '54',
                'title' => 'faculty_show',
                'slug' => 'faculty-show',
            ],
            [
                'id'    => '55',
                'title' => 'faculty_delete',
                'slug' => 'faculty-delete',
            ],
            [
                'id'    => '56',
                'title' => 'faculty_access',
                'slug' => 'faculty-access',
            ], 
            [
                'id'    => '57',
                'title' => 'level_create',
                'slug' => 'level-create',
            ],
            [
                'id'    => '58',
                'title' => 'level_edit',
                'slug' => 'level-edit',
            ],
            [
                'id'    => '59',
                'title' => 'level_show',
                'slug' => 'level-show',
            ],
            [
                'id'    => '60',
                'title' => 'level_delete',
                'slug' => 'level-delete',
            ],
            [
                'id'    => '61',
                'title' => 'level_access',
                'slug' => 'level-access',
            ],
            [
                'id'    => '62',
                'title' => 'course_create',
                'slug' => 'course-create',
            ],
            [
                'id'    => '63',
                'title' => 'course_edit',
                'slug' => 'course-edit',
            ],
            [
                'id'    => '64',
                'title' => 'course_show',
                'slug' => 'course-show',
            ],
            [
                'id'    => '65',
                'title' => 'course_delete',
                'slug' => 'course-delete',
            ],
            [
                'id'    => '66',
                'title' => 'course_access',
                'slug' => 'course-access',
            ],
            [
                'id'    => '67',
                'title' => 'sub_create',
                'slug' => 'sub-create',
            ],
            [
                'id'    => '68',
                'title' => 'sub_edit',
                'slug' => 'sub-edit',
            ],
            [
                'id'    => '69',
                'title' => 'sub_show',
                'slug' => 'sub-show',
            ],
            [
                'id'    => '70',
                'title' => 'sub_delete',
                'slug' => 'sub-delete',
            ],
            [
                'id'    => '71',
                'title' => 'sub_access',
                'slug' => 'sub-access',
            ],
        ];

        Permission::insert($permissions);
    }
}

<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin_permissions = Permission::all();
        Role::findOrFail(3)->permissions()->sync($admin_permissions->pluck('id'));
        
        $admins_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) == 'user_' || substr($permission->title, 0, 8) == 'faculty_' || substr($permission->title, 0, 6) == 'level_' || substr($permission->title, 0, 7) == 'course_' || substr($permission->title, 0, 4) == 'sub_' || $permission->title == 'role_access' || $permission->title == 'role_show' || $permission->title ==  'form_access' || $permission->title == 'form_edit' || $permission->title == 'form_download' || $permission->title == 'form_delete' || $permission->title == 'card_download' || $permission->title == 'triplicate_download';
        });
        Role::findOrFail(1)->permissions()->sync($admins_permissions);
        
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return $permission->title == 'form_access' || $permission->title == 'form_edit' || $permission->title == 'form_delete' || $permission->title == 'form_download' || $permission->title == 'card_download' || $permission->title == 'triplicate_download';
            // return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, 0, 8) != 'subject_' && substr($permission->title, 0, 9) != 'question_';
        });        
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}

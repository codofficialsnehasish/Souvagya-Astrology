<?php 
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;


    if (!function_exists('get_role')) {
        function get_role($user_id){
            $roleName = Role::leftJoin('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->where('model_has_roles.model_id', $user_id)
                    ->select('roles.name')
                    ->first();
            if($roleName){
                return $roleName->name;
            }
        }
    }
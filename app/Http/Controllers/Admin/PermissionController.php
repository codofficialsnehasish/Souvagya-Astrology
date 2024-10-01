<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(){
        $this->view_path = 'admin.roles_permission.';

        $this->middleware('role_or_permission:Permission Show', ['only' => ['permission']]);
        $this->middleware('role_or_permission:Permission Create', ['only' => ['create_permission']]);
        $this->middleware('role_or_permission:Permission Edit', ['only' => ['update_permission']]);
        $this->middleware('role_or_permission:Permission Delete', ['only' => ['destroy_permission']]);
    }

    public function permission(){
        $data['title'] = 'Permission';
        $data['permissions'] = Permission::all();
        return view($this->view_path.'permission')->with($data);
    }

    public function create_permission(Request $r){
        $validator = Validator::make($r->all(), [
            'name' => 'required|string|unique:permissions,name'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $permission = Permission::create(['name' => $r->name]);
            if($permission){
                return back()->with(['success'=>'Role Created Successfully']);
            }else{
                return back()->with(['error'=>'Role Not Created']);
            }
        }
    }

    public function update_permission(Request $r, $permissionId){
        $validator = Validator::make($r->all(), [
            'name' => ['required','string',Rule::unique('permissions')->ignore($permissionId),]
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $permission = Permission::findOrFail($permissionId);
            $permission->name = $r->name;
            $res = $permission->update(); 
            if($res){
                return back()->with(['success'=>'Permission Updated Successfully']);
            }else{
                return back()->with(['error'=>'Permission Not Updated']);
            }
        }
    }

    public function destroy_permission(Request $r){
        $permission = Permission::find($r->permissionId);
        $res = $permission->delete();
        if($res){
            return back()->with(['success'=>'Permission Deleted Successfully']);
        }else{
            return back()->with(['error'=>'Permission Not Deleted']);
        }
    }
}
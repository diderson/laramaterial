<?php
/**
 * Created by PhpStorm.
 * User: donmarkus
 * Date: 3/9/17
 * Time: 2:11 PM
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\CountValidator\Exception;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Roles & Permissions Controller
 * Class SecurityController
 * @package App\Http\Controllers\Backend
 */
class SecurityController extends Controller
{

    public function roles()
    {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function roleEdit()
    {
        try {
            $role = Role::find(request('id'));

            $role->name = request('name');
            $role->save();
        } catch (Exception $exception) {
            throw new ModelNotFoundException($exception->getMessage());
        }
    }

    public function permissions()
    {
        $permissions = Permission::all();
        return view('backend.permissions.index', compact('permissions'));
    }

    public function permissionEdit()
    {
        try {
            $role = Permission::find(request('id'));

            $role->name = request('name');
            $role->save();
        } catch (Exception $exception) {
            throw new ModelNotFoundException($exception->getMessage());
        }
    }
}
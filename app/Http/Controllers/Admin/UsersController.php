<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Gate;
use DB ;

use App\Imports\UsersImport;
use App\Imports\UsersImportstd;
use App\Exports\UsersExport;
use App\Exports\UsersExportpr;

use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }
    public function getTeacher()
    {
       
 $users = DB::table('users')
        ->join('role_user','role_user.user_id','users.id')
        ->join('roles','roles.id','role_user.role_id')
       ->select('users.*','roles.title')
       -> where('roles.title','User')
       ->get();
 $roles = Role::all();
 $classes = Classe::all();
        return view('admin.users.teacher', compact('users','roles','classes'));
    }
    public function getStudent()
    {
        $users = DB::table('users')
        ->join('role_user','role_user.user_id','users.id')
        ->join('roles','roles.id','role_user.role_id')
        ->join('classes','classes.id','users.classe_id')
       ->select('users.*','classes.name as classN')
       -> where('roles.title','student')
       ->get();
      
 $roles = Role::all();
 $classes = Classe::all();
        return view('admin.users.student', compact('users','roles','classes'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $classes = Classe::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('roles', 'classes'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
          $ts = $user->roles->pluck('title');

         if ( $ts[0] == "student") {

        $users = DB::table('users')
        ->join('role_user','role_user.user_id','users.id')
        ->join('roles','roles.id','role_user.role_id')
        ->join('classes','classes.id','users.classe_id')
       ->select('users.*','classes.name as classN')
       -> where('roles.title','student')
       ->get();
           $roles = Role::all();
 $classes = Classe::all();
        return view('admin.users.student', compact('users','roles','classes'));
         }
         else  {
            
           $users = DB::table('users')
        ->join('role_user','role_user.user_id','users.id')
        ->join('roles','roles.id','role_user.role_id')
       ->select('users.*')
       -> where('roles.title','User')
       ->get();
 $roles = Role::all();
 $classes = Classe::all();
        return view('admin.users.teacher', compact('users','roles','classes'));
        
         }
        
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('title', 'id');

        $classes = Classe::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'classe');
        $ts = $user->roles->pluck('title');

         if ( $ts[0] == "student") {
            return view('admin.users.editS', compact('roles', 'classes', 'user'));
         }
          elseif( $ts[0] == "User") {
        return view('admin.users.edit', compact('roles', 'classes', 'user'));
         }

        
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'classe');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
   
        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }



     function import(Request $request)
    {
      $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx']);
     $path = $request->file('select_file')->getRealPath();

     $data = Excel::import(new UsersImport,$path);
     
  return back()->with('success', 'Excel Data Imported successfully.');
   
        
}
function importstd(Request $request)
    {
      $this->validate($request, [
      'selectd_file'  => 'required|mimes:xls,xlsx'
     ]);
      
     $path = $request->file('selectd_file')->getRealPath();

     $data = Excel::import(new UsersImportstd,$path);
 
     return back()->with('success', 'Excel Data Imported successfully.');   
}

public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
public function exportp() 
    {
        return Excel::download(new UsersExportpr, 'usersP.xlsx');
    }


}

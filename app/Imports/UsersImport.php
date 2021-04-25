<?php

namespace App\Imports;

use App\User;
use App\Classe;
use App\Role;
use App\RoleUser;
use Maatwebsite\Excel\Concerns\ToModel;


use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
     public function model(array $row)
    {
        
         
        $role = Role::where("title","like","User")->first();
         
  

         $form =  User::create([


           'name'     => $row['name'] ,
           'email'    => $row['email'] ,
           'password' => Hash::make($row['password']),
          
        ]);
        $roleuser = RoleUser::create([
            'user_id'    => $form->id ,
           'role_id'     => $role->id 
           ]);
      
      return   $form;
}
}

<?php

namespace App\Imports;

use App\User;
use App\Classe;
use App\Role;
use App\RoleUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class UsersImportstd implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $classe = Classe::where("name","like","%".$row['classe']."%")->first();
        $role = Role::where("title","like","student")->first();
        
        $row['classe_id']  = $classe->id ;
       
       $form =  User::create([


           'name'     => $row['name'] ,
           'email'    => $row['email'] ,
           'password' => Hash::make($row['password']),
           'classe_id' => $row['classe_id'] ,
           'cin' =>  $row['cin']
          
        ]);
        $roleuser = RoleUser::create([
            'user_id'    => $form->id ,
           'role_id'     => $role->id 
           ]);
      
      return   $form;
    }
}

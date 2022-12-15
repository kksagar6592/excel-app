<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::where('email', $row[1])->first();
        if($user) {
            $user->name = $row[0];
            $user->password = bcrypt($row[2]);
            $user->save();
        } else {
            return new User([
                'name' => $row[0],
                'email' => $row[1],
                'password' => bcrypt($row[2]),
            ]);
        }
    }
}

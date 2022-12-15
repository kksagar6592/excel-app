<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\User;

class UserController extends Controller
{
	public function importView() {
		return view('importFile');
	}

	public function import(Request $request) {
        $request->validate([
            'file' => 'required',
        ]);
		Excel::import(new ImportUser, $request->file('file')->store('files'));
		return redirect()->back();
	}

	public function exportUsers() {
		return Excel::download(new ExportUser, 'users.xlsx');
	}
}
?>

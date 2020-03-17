<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function all()
	{
		$results=User::all();
		return view("User.user",
			[
				"users"=>$results,
				"status"=>1
			]
		);
	}

	public function select($id_user)
	{
		$results=User::firstWhere("id_user","=",$id_user);
		return view("User.user",
			[
				"user"=>$results,
				"status"=>2
			]
		);
	}

	public function create(Request $request)
	{
		$user=new User();
		$user->name=$request->input("name");
		$user->save();

		$results=User::all();

		return view("User.user",
			[
				"users"=>$results,
				"status"=>3
			]
		);
	}

	public function update(Request $request,$id_user)
	{
		$user=User::where("id_user","=",$id_user);
		$user->update([
			"name"=>$request->input("name")
		]);

		$user=User::where("id_user","=",$id_user)->first();
		
		return view("User.user",
			[
				"user"=>$user,
				"status"=>4
			]
		);
	}

	public function delete($id_user)
	{
		$user=User::where("id_user","=",$id_user);
		$user->delete();
		return redirect("users");
	}
}

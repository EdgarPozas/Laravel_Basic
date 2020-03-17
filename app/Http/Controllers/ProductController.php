<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
	public function all()
	{
		$results=Product::all();
		$users=User::all();
		return view("Product.product",
			[
				"products"=>$results,
				"users"=>$users,
				"status"=>1
			]
		);
	}

	public function select($id_product)
	{
		$results=Product::firstWhere("id_product","=",$id_product);
		$users=User::all();
		return view("Product.product",
			[
				"product"=>$results,
				"users"=>$users,
				"status"=>2
			]
		);
	}

	public function create(Request $request)
	{
		$product=new Product();
		$product->id_user=$request->input("user");
		$product->name=$request->input("name");
		$product->amount=$request->input("amount");
		$product->save();

		$results=Product::all();
		$users=User::all();

		return view("Product.product",
			[
				"products"=>$results,
				"users"=>$users,
				"status"=>3
			]
		);
	}

	public function update(Request $request,$id_product)
	{
		$product=Product::where("id_product","=",$id_product);
		$product->update([
			"id_user"=>$request->input("user"),
			"name"=>$request->input("name"),
			"amount"=>$request->input("amount")
		]);

		$product=Product::where("id_product","=",$id_product)->first();
		$users=User::all();

		return view("Product.product",
			[
				"product"=>$product,
				"users"=>$users,
				"status"=>4
			]
		);
	}

	public function delete($id_product)
	{
		$product=Product::where("id_product","=",$id_product);
		$product->delete();
		return redirect("products");
	}
}

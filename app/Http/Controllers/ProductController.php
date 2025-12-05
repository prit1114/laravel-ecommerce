<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::paginate(10));
    }

    public function store(Request $r)
    {
        $data = $r->only(['name','sku','description','price','stock']);
        $p = Product::create($data);
        return response()->json($p,201);
    }
}

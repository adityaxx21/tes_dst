<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Products_Controller extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit == null ? 10 :  $request->limit;
        $sortBy = $request->sortBy == null ? 'asc' :  $request->sortBy;
        $OrderBy = $request->OrderBy == null ? 'id' :  $request->OrderBy;

        // if ($limit == null) {
        //     # code...
        // }

        $data['product'] = DB::table('tb_products')
        ->where('deleted_at',null)
        ->orderBy($OrderBy, $sortBy)
        ->paginate($limit);

        return response()->json($data);
    }

    public function index_detail($uuid)
    {
        $data['product'] = DB::table('tb_products')
        ->where([['deleted_at',null],['uuid',$uuid]])
        ->first();

        return response()->json($data);
    }

    public function index_post(Request $request)
    {
        $name = $request->name;
        $type = $request->type;
        $price = $request->price;
        $quantity = $request->quantity;

        $get_data = [
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'created_at' => date('Y-m-d H:i:s')
        ];

        DB::table('tb_products')->insert($get_data);
    }

    public function index_update(Request $request,$uuid)
    {
        $name = $request->name;
        $type = $request->type;
        $price = $request->price;
        $quantity = $request->quantity;

        $get_data = [
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('tb_products')->where('uuid',$uuid)->update($get_data);
    }

    public function index_delete($uuid)
    {
        DB::table('tb_products')->where('uuid',$uuid)->update(['deleted_at' => date('Y-m-d H:i:s')]);
    }

    
}

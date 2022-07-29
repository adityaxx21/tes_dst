<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Transactions_Controller extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit == null ? 10 :  $request->limit;
        $sortBy = $request->sortBy == null ? 'asc' :  $request->sortBy;
        $OrderBy = $request->OrderBy == null ? 'id' :  $request->OrderBy;

        // if ($limit == null) {
        //     # code...
        // }
            $token['token'] = csrf_token();
        $data['product'] = DB::table('tb_transactions')
        ->where('deleted_at',null)
        ->orderBy($OrderBy, $sortBy)
        ->paginate($limit);

        return response()->json($data,$token);
    }

    public function index_post(Request $request)
    {
        $name = $request->name ;
        $user_id = $request->user_id ;
        $product_id = $request->product_id ;
        $price = $request->price ;
        $amount = $request->amount ;
        $tax = $price * 0.1;
        $admin_fee = ($amount + $tax) * 0.05;
        $total = ($price * $amount) + $tax + $admin_fee;

        $get_data = [
            'name' => $name,
            'user_id' => $user_id,
            'product_id' => $product_id,
            'amount' => $amount,
            'tax' => $tax,
            'admin_fee' => $admin_fee,
            'total' => $total,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        DB::table('tb_transactions')->insert($get_data);
    }

public function index_update(Request $request,$uuid)
    {
        $name = $request->name ;
        $user_id = $request->user_id ;
        $product_id = $request->product_id ;
        $price = $request->price ;
        $amount = $request->amount ;
        $tax = $price * 0.1;
        $admin_fee = ($amount + $tax) * 0.05;
        $total = ($price * $amount) + $tax + $admin_fee;

        $get_data = [
            'name' => $name,
            'user_id' => $user_id,
            'product_id' => $product_id,
            'amount' => $amount,
            'tax' => $tax,
            'admin_fee' => $admin_fee,
            'total' => $total,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        DB::table('tb_transactions')->where('uuid',$uuid)->update($get_data);
    }

    public function index_delete($uuid)
    {
        DB::table('tb_transactions')->where('uuid',$uuid)->update(['deleted_at',date('Y-m-d H:i:s')]);
    }

}

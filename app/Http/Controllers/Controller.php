<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function thirdParty(Request $request)
    {
        $datas = $request->data;
        $token = $request->header('Authorization');
        if($token == base64_encode('vebika_ino_darmawan')){
            $data = [
                'order_id' => $datas->order_id,
                'amount'   => $datas->amount,
                'status'   => 1
            ];
        }

        return response()->json($data);
    }
}

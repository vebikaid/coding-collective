<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WithDraw extends Component
{
    public function withdraw()
    {
        // $this->validate([
        //     'amount' => 'required|numeric|max:'.Auth::user()->balance
        // ]);

        // $order_id = time().'-order_id-'.Auth::user()->id;
        // Transaction::create([
        //     'user_id'  => Auth::user()->id,
        //     'order_id' => $order_id,
        //     'amount'   => $this->amount,
        //     'status'   => 'waiting'
        // ]);

        // $reponse = Http::post('http://localhost:8000/deposit', [
        //                 'data' => [
        //                     'order_id'  => $order_id,
        //                     'amount'    => $this->amount,
        //                     'timestamp' => time()
        //                 ],
        //                 'headers' => [
        //                     'Authorization' => base64_encode('vebika_ino_darmawan'),
        //                 ]
        //             ]);

        // if ($reponse->successful()) {
        //     $data = $reponse->json()->data;
    
        //     if($data->status == 1){
        //         Transaction::where('order_id', $data->order_id)
        //                     ->update(['status' => 'success']);
        //         $user_id = explode('-', $data->order_id)[2];
    
        //         User::where('id', $user_id)
        //             ->decrement('balance', $data->amount);
                
        //     }else{
        //         Transaction::where('order_id', $data->order_id)
        //                     ->update(['status' => 'failed']);
        //     }
        // }

        return true;
    }

    public function render()
    {
        return view('livewire.with-draw');
    }
}

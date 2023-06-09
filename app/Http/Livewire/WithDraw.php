<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class WithDraw extends Component
{
    public $amount;
    public $order_id;

    public function withdraw()
    {
        $this->validate([
            'amount' => 'required|numeric',
        ]);

        $waiting = Transaction::where([['status', 'waiting'], ['user_id', Auth::user()->id]])->get()->sum('amount');

        if($this->amount > Auth::user()->balance - $waiting){
            return session()->flash('flash', 'the withdrawal amount cannot be more than the balance');
        };

        $order_id = time().'-order_id-'.Auth::user()->id;
        $this->order_id = $order_id;
        Transaction::create([
            'user_id'  => Auth::user()->id,
            'order_id' => $order_id,
            'amount'   => $this->amount,
            'status'   => 'waiting'
        ]);

        $client = new Client();
        $client->postAsync('https://yourdomain.com/deposit', [
                        'json' => [
                            'order_id'  => $order_id,
                            'amount'    => $this->amount,
                            'timestamp' => time()
                        ],
                        'headers' => [
                            'Authorization' => base64_encode('vebika_ino_darmawan'),
                            'Content-Type' => 'application/json',
                        ]
                    ])->then(
                        function ($response) {
                            $body = $response->getBody();
                            if($body->status == 1){
                                Transaction::where('order_id', $body->order_id)
                                            ->update(['status' => 'success']);

                                User::where('id', Auth::user()->id)
                                    ->decrement('balance', $body->amount);
                                
                            }else{
                                Transaction::where('order_id', $body->order_id)
                                            ->update(['status' => 'failed']);
                            }
                        }
                    )->otherwise(function(Exception $e){
                        Transaction::where('order_id', $this->  order_id)
                                    ->update(['status' => 'failed']);
                        Log::error('error async', [$e]);
                    })->wait();
        $this->amount = '';
    }

    public function render()
    {
        return view('livewire.with-draw');
    }
}

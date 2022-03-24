<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Card::all();
        return response()->json($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'card_number' => 'required|integer|digits_between:16,16',
            'exp_date' => 'date',
            'cvv' => 'required|integer'
        ]);

        $newCard = new Card([
            'card_number'=>$request->get('card_number'),
            'exp_date'=>$request->get('exp_date'),
            'cvv'=>$request->get('cvv'),
        ]);

        $newCard->save();

        return response()->json($newCard);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $user = Card::findOrFail($card);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCardRequest  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $user = Card::findOrFail($card);

        $request->validate([
            'card_number' => 'required|integer|digits_between:16,16',
            'exp_date' => 'date',
            'cvv' => 'required|integer'
        ]);
        $user->card_number = $request->get('card_number');
        $user->exp_date = $request->get('exp_date');
        $user->cvv = $request->get('cvv');
        $user->save();

        return response()->json($user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $user = Card::findOrFail($card);
        $user->delete();

        return response()->json($user::all());
    }


    public function cardNumberGenerate()
  {
    $n = rand(7900000000000009,7999999999999990);
    $m = $n;
    $ans = 0;
    $digits = [];
    while ($m) {
      array_push($digits, ($m % 10));
      $m = intval($m / 10);
    }
    for ($i = 0; $i < 16; $i++) {
      if ($i % 2 == 0) {
        $ans += $digits[$i];
      } else {
        if ($digits[$i] == 5) {
          $ans += 1;
        } else if ($digits[$i] == 6) {
          $ans += 1;
        } else if ($digits[$i] == 7) {
          $ans += 1;
        } else if ($digits[$i] == 8) {
          $ans += 1;
        } else if ($digits[$i] == 9) {
          $ans += 1;
        } else {
          $ans += 2 * $digits[$i];
        }
      }
    }
    $result= $n - $ans % 10;
    return $result;
  }

  public function checkCardNumber($n)
  {
    $m = $n;
    $ans = 0;
    $digits = [];
    while ($m) {
      array_push($digits, ($m % 10));
      $m = intval($m / 10);
    }
    for ($i = 0; $i < 16; $i++) {
      if ($i % 2 == 0) {
        $ans += $digits[$i];
      } else {
        if ($digits[$i] == 5) {
          $ans += 1;
        } else if ($digits[$i] == 6) {
          $ans += 1;
        } else if ($digits[$i] == 7) {
          $ans += 1;
        } else if ($digits[$i] == 8) {
          $ans += 1;
        } else if ($digits[$i] == 9) {
          $ans += 1;
        } else {
          $ans += 2 * $digits[$i];
        }
      }
    }
    if($ans%10==0){
      return true;
    }
      return false;
   
  }
 

}

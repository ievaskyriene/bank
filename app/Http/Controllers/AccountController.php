<?php

namespace App\Http\Controllers;

use App\Account;
use Validator;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        $accounts = Account::orderBy('surname')->get();


        
        return view('account.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account;
        $validator = Validator::make($request->all(),
        [
            'account_name' => ['required', 'min:3', 'max:64'],
            'account_surname' => ['required', 'min:3', 'max:64'],
            'account_holder_ak' => 'unique:accounts,AK'
        ],

        [
            'account_holder_ak.unique' => 'Toks asmens kodas jau egzistuoja!' 
        ]


        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        if(Account::valid_ak($request->account_holder_ak) != true){
            return redirect()->route('account.create')->with('alert_message',  'Iveskite teisinga asmens koda');
         }

    

      
        $account->name = $request->account_name;
        $account->surname = $request->account_surname;
        $account->AK = $request->account_holder_ak;
        $account->IBAN = Account::generateIBAN();
        $account->lesos = 0;
        $account->USD = 0;
        $account->save();
        return redirect()->route('account.index')->with('success_message', 'Sąskaita sėkmingai sukurta.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->name = $request->account_name;
        $account->surname = $request->account_surname;
        $account->AK = $request->account_holder_ak;
        $account->IBAN = Account::generateIBAN();
        $account->lesos = 0;
        $account->USD = 0;
        $account->save();
        return redirect()->route('account.index');
    }

    public function updateAdd(Request $request, Account $account)
    {
        if ($request->account_prideti > 0){
        $account->lesos += $request->account_prideti;
        $account->save();
        return redirect()->route('account.add', ['account' => $account])->with('success_message', 'Lešos  įneštos į sąskaitą');
        }else {
            return redirect()->route('account.add', ['account' => $account])->with('alert_message', 'Įveskite sumą, didesnę už nulį.');
        }
        // $account->USD = 0;
       
    }

    public function updateMinus(Request $request, Account $account)
    {
        if ($request->account_nuimti <= $account->lesos && $request->account_nuimti > 0 ){
             $account->lesos -= $request->account_nuimti;
             $account->save();
            return redirect()->route('account.minus', ['account' => $account])->with('success_message', 'Lešos  nurašytos');
        }else{
            return redirect()->route('account.minus', ['account' => $account])->with('alert_message', 'Likutis negali būti mažesnis už nulį');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        if($account->lesos > 0){
            return redirect()->route('account.index')->with('alert_message', 'Sąskaitos, kurioje yra pinigų, ištrinti negalima.');
            
        }
        $account->delete();
        return redirect()->route('account.index')->with('success_message', 'Sąskaita sėkmingai ištrinta.');
    }

    public function add(Account $account)
    {
        return view('account.add', ['account' => $account]);
    }

    public function minus(Account $account)
    {
        return view('account.minus', ['account' => $account]);
    }
}

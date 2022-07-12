<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Faker\Factory as Faker;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $accounts = Account::all();

        $accounts = Account::orderBy('firstname')->orderBy('lastname')->get();

        return view('clients', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faker = Faker::create();

        $phone = '+370' . $faker->numberBetween($min = 60000000, $max = 69999999);
        $email = $faker->freeEmail;
        $address = $faker->address;
        
        return view('register')->with('phone', $phone)->with('email', $email)->with('address', $address);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'address' => 'required|string|max:150',
            'phone' => 'required|max:12',
            'agree' => 'required',
        ]);
        // $account = new Account([
        //     'firstname' => $request->get('firstname'),
        //     'lastname' => $request->get('lastname'),
        //     'accountNumber' => $request->get('accountNumber'),
        //     'password' => $request->get('password'),
        //     'address' => $request->get('address'),
        //     'phone' => $request->get('phone'),
        // ]);
        $account = new Account;
        $account->firstname = $request->get('firstname');
        $account->lastname = $request->get('lastname');
        $account->email = $request->get('email');
        $account->accountNumber = $account->iban();
        $account->password = $request->get('password');
        $account->address = $request->get('address');
        $account->phone = $request->get('phone');
        // $account->iban();
        
        $account->save();
        return redirect()->route('accounts_index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('edit', ['account' => $account]);
    }
    //     /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Account  $account
    //  * @return \Illuminate\Http\Response
    //  */
    // public function editOut(Account $account)
    // {
    //     return view('cashout', ['account' => $account]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        if($account->cash < $request->cash_out) {
            $message="<span style='color:red'>Nepakankamas Likutis</span";
            return view('edit', ['account' => $account] ,compact('message'));
        } if($request->cash < 0) {
                $message1="<span style='color:red'>Įveskite tinkama skaičių</span>";
                return view('edit', ['account' => $account] ,compact('message1'));
        } if($request->cash_out < 0) {
            $message2="<span style='color:red'>Įveskite tinkama skaičių</span>";
            return view('edit', ['account' => $account] ,compact('message2'));
        } if ($account->cash >= $request->cash_out) {
            $account->cash += $request->cash;
            $account->cash -= $request->cash_out;
            $account->save();
            return view('edit', ['account' => $account]);
        }
        
    }
    //     /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Account  $account
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update2(Request $request, Account $account)
    // {

    //     $account->cash -= $request->out;

    //     $account->save();

    //     return redirect()->route('accounts_index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        if ($account->cash == 0) {

            $account->delete();
            return redirect()->route('accounts_index');
        } else {
            $message3= "<span style='color:red'>Sąskaita turi būti tuščią</span>";
            return view('edit', ['account' => $account])->with('message3' , $message3);
        }
        

    }

    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

}

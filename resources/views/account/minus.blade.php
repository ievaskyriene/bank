
@extends('layouts.app')

<style>
     .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .links{
        padding: 30px;
    }
</style>

<div class="links">
    <a href="{{route('account.create')}}">Sukurti naują sąskaitą</a>
    <br>
    <a href="{{route('account.index')}}">Peržiūrėti sąskaitų sąrašą</a>
</div>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th >Vardas</th>
        <th>Pavarde</th> 
        <th>Saskaita</th>
        <th>Lesos</th>
        <th>Lesos USD</th>
        <th>Veiksmai</th>
    </div>
  
 
{{-- // $USD = 0;
// $USD = $user['lesos'] * CE::excange(); --}}
<tr>
        
<td>{{$account->name}}</td>
<td>{{$account->surname}}</td>
<td>{{$account->IBAN}}</td>
<td>{{$account->lesos}}</td>
<td>{{App\Account::excange() * $account->lesos}}</td>
<td>
        
        <form action="{{route('account.updateMinus',[$account->id])}}" method="POST">

        <input type="hidden" name="ID" value="'.$user['ID'].'" readonly>
        <input type="number" step="0.01" name="account_nuimti" value="">
        @csrf
        <button type="submit">Nuimti</button>
    </form>
    
    </td>
    </tr>
</thead>
    </div>
</table>
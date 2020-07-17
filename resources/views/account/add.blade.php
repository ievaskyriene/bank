
@extends('layouts.app')

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
<td>{{$account->USD}}</td>
<td>
        
        <form action="{{route('account.updateAdd',[$account->id])}}" method="POST">

        <input type="hidden" name="ID" value="'.$user['ID'].'" readonly>
        <input type="number" step="0.01" name="account_prideti" value="">
        @csrf
        <button type="submit">Prideti</button>
    </form>
    
    </td>
    </tr>
</thead>
    </div>
</table>
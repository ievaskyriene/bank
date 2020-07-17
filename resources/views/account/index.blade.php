@extends('layouts.app')
<table class = "table">
    <thead class="thead-dark">
    <tr>
        <th >Vardas</th>
        <th>Pavarde</th> 
        <th>Saskaita</th>
        <th>Asmens kodas</th>
        <!-- <th>Profilio nuotrauka</th>  -->
        <th>Veiksmai</th>
    <div>

         @foreach ($accounts as $account)
         {{-- <a href="{{route('account.add',[$account])}}">{{$account->name}} {{$account->surname}}</a> --}}
                <tr>
                    <td>{{$account->name}}</td>
                    <td>{{$account->surname}}</td>
                    <td>{{$account->IBAN}}</td>
                    <td>{{$account->AK}}</td>
                    <!-- <td><img style = "width: 200px; height: 200px; object-fit: cover;" src=""> -->
                    <td>
                        <form action="{{route('account.destroy', [$account])}}" method="post"> 
                            @csrf
                        <button type="submit" name="delete" value="'.$user['IBAN'].'">Trinti</button> 
                        </form>
                        <a href="{{route('account.add', [$account])}}">
                            @csrf
                           <input type="hidden" name="ID" value="'.$user['ID'].'"readonly>    
                            <button type="submit" name="inesti">Inesti</button>
                        </a>
                        <a href="{{route('account.minus', [$account])}}">
                            @csrf
                           <input type="hidden" name="ID" value="'.$user['ID'].'"readonly>    
                            <button type="submit" name="nuimti">Nuimti</button>
                        </a>
                        
                    </td>
                </tr>
            </thead>
        </div>

    @endforeach

    <div class="links">
        <a href="{{route('account.create')}}">Sukurti naują sąskaitą</a>
    </div>




{{-- @foreach ($accounts as $account)
  {{$account->name}} {{$account->surname}}<br>
@endforeach --}}

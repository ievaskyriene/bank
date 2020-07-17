@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Įveskite duomenis</div>
               <div class="card-body">

               <form action="{{route('account.store')}}" enctype="multipart/form-data" method="post">
                <div class = "input">
                    <label for="name"> Vardas: <br>
                        <input type="text" name="account_name" required> <br>
                    </label> 
                </div>
                <div class = "input">
                    <label for="surname"> Pavardė: <br>
                        <input type="text" name="account_surname" required> <br>
                    </label>
                </div>  
                <div class = "input">
                    <label for="AK"> Asmens kodas:  <br>
                        <input type="number" name="account_holder_ak" required><br>
                    </label>
                </div>  
                <!-- <div class = "input">
                    <label for="img"> Įkelkite profilio nuotrauką:  <br>
                        <input style = "margin-left:120px; margin-top:20px;" type="file" name="cat_photo"><br><br>
                    </label>
                </div>  -->
                @csrf
                <button type="submit" name = "action">Sukurti saskaitą</button>
            </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Place a bet</h6>
    </div>
    <div class="card-body">

        <div class="m-0-auto w-50">
            <form action="/makeBet/{{$company->id}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" value="{{$company->name}}"
                    class="form-control form-control-user"
                    name="amount" readonly
                    autofocus>
            </div>
            <div class="form-group">
                <input type="number" value="{{$company->price}}"
                    class="form-control form-control-user"
                    name="amount" readonly
                    autofocus>
            </div>
            <div class="form-group">
                <input type="number" placeholder="Bet Amount"
                    class="form-control form-control-user"
                    name="amount" required
                    autofocus>
            </div>
            <div class="d-flex justify-content-between" data-toggle="buttons">
                <label class="btn btn-primary">
                  <input type="radio" name="betType" value="up" id="option1"> Increase
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="betType" value="down" id="option2"> Decrease
                </label>
          </div>
            <button class="d-flex m-0-auto btn btn-success" type="submit">Submit</button>
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @if($errors->any())
             <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
                 </div>
            @endif
            </form>


        </div>
    </div>
</div>
@endsection

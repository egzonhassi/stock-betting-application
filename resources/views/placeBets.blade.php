@extends('layouts.app')

@section('content')


<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Your Status (Monthly)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">-127 Tokens</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Your Status (Annual)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">+412 Tokens</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number of Bets</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">120</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-atom fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Active Bets</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-battery-full clock-o fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    name="ammount" readonly
                    autofocus>
            </div>
            <div class="form-group">
                <input type="number" value="{{$company->price}}"
                    class="form-control form-control-user"
                    name="ammount" readonly
                    autofocus>
            </div>
            <div class="form-group">
                <input type="number" placeholder="Bet Ammount"
                    class="form-control form-control-user"
                    name="ammount" required
                    autofocus>
            </div>
            <div class="d-flex justify-content-between" data-toggle="buttons">
                <label class="btn btn-primary">
                  <input type="radio" name="betType" value="up" id="option1"> UP
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="betType" value="down" id="option2"> DOWN
                </label>
          </div>
            <button class="d-flex m-0-auto btn btn-success" type="submit">Submit</button>
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

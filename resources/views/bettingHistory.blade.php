@extends('layouts.app')

@section('content')


<div class="row">

@php
    $tokenStatus = Auth::user()->tokens - 100;
    if($tokenStatus < 0){
        $status = 'danger';
    }else{
        $status = 'success';
    }
@endphp
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-{{$status}} shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-{{$status}} text-uppercase mb-1">Your Status
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tokenStatus}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number of Bets</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$numberOfBets}}</div>
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

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Active Bets</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$activeBets}}</div>
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
        <h6 class="m-0 font-weight-bold text-primary">Current Stock Price</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Date</th>
                        <th>Ammount</th>
                        <th>Bet Type</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Company</th>
                        <th>Date</th>
                        <th>Ammount</th>
                        <th>Bet Type</th>
                    </tr>
                </tfoot>
                <tbody>




                    {{--  --}}
                    @foreach ($bets as $bet)
                    <tr>
                        <td>
                            {{$bet->name}}
                        </td>
                        <td>
                            {{$bet->created_at}}
                        </td>
                        <td>
                            {{$bet->bet_price}}
                        </td>
                        <td>
                            {{$bet->bet_type}}
                        </td>
                    </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
</div>
@endsection

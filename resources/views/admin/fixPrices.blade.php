@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Companies</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Symbol</th>
                        <th>Current Price</th>
                        <th>Is Fixed</th>
                        <th>Fix Price</th>
                        <th>Fixed Value</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Company</th>
                        <th>Symbol</th>
                        <th>Current Price</th>
                        <th>Is Fixed</th>
                        <th>Fixed Value</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <td>
                            {{$company->name}}
                        </td>
                        <td>
                            {{$company->symbol}}
                        </td>
                        <td>
                            {{$company->price}}
                        </td>
                        <td>
                            @if($company->isFixed == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            @if($company->isFixed != 1)
                            <a href="{{route('fixPrice' , $company->id)}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                  <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Fix Price</span>
                              </a>
                            @else
                            <a href="{{route('unfix' , $company->id)}}" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Unfix Price</span>
                              </a>
                            @endif
                        </td>

                        <td>
                            {{$company->fixed_price}}
                        </td>
                    </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
</div>
@endsection

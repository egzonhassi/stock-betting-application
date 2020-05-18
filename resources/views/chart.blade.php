@extends('layouts.app')

@section('content')


          <h1 class="h3 mb-2 text-gray-800">Token Chart</h1>
          <p class="mb-4">Want to see your tokens in the past week but in a simplier way?</p>

          <div class="row">

            <div class="w-100">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Your Tokens Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  <hr>
                  This chart shows your ammount of tokens in the last.
                </div>
              </div>
            </div>
          </div>

@endsection

@extends('layouts.app')

@section('content')

          <div class="row">

            <div class="w-100">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Companies Stock Chart</h6>
                </div>
                <figure class="highcharts-figure">
                    <div id="highchartDiv"></div>
                </figure>
            </div>
          </div>

          <script>
              var data = @json($data);
              initializeHighChart(data)
          </script>

@endsection

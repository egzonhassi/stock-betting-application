@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="" style="margin:0 auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome, {{Auth::user()->name}}</h1>
                            </div>

                            <form method="POST" class="user" action="{{ route('profile') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="text" placeholder="{{Auth::user()->name}}"
                                        class="form-control form-control-user"
                                        name="name" value="{{ Auth::user()->name }}" required
                                        autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="{{Auth::user()->email}}"
                                        value="{{Auth::user()->email}}"
                                        class="form-control form-control-user "
                                        name="email" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update Profile
                                </button>

                                @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first()}}
                                  </div>
                                @endempty
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection

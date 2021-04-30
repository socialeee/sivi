@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                {{-- <img src="{{asset('img/Logo Studay.png')}}" class="img-responsive" style="margin-left: auto;margin-right: auto; margin-top: auto;margin-bottom: auto;width:75%;" alt="Tri"> --}}
                                <h1 class="h4 text-gray-900 mb-4">SIVI!</h1>
                            </div>
                            
                                <a href="{{route ('login')}}" class="btn btn-primary btn-user btn-block">
                                    Login
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <form enctype="multipart/form-data" action="/entry" method="POST" >
                            @csrf
                            <input id="date" type="date" class="form-control  " name="date" placeholder="Date" autofocus>
                            <br>
                            <input id="date" type="number" class="form-control  " name="cpu" placeholder="Price per Unit" autofocus>
                            <br>
                            <input id="date" type="number" class="form-control  " name="received" placeholder="Amount Received" autofocus>
                            <br>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="number" name="previous" name="prevs" type="number" class="form-control  " placeholder="Previous Reading">
                                    <input id="number" name="previousim" name="prevFile" type="file" class="form-control  " placeholder="Previous Reading">
                                </div>
                                <div class="col-md-6">
                                    <input id="email" type="number" name="current" class="form-control"  placeholder="Current Reading">
                                    <input id="email" type="file" name="currentFile" class="form-control"  placeholder="Current Reading">


                                </div>
                            </div>
                            <br>
                            <button class="btn btn-dark">Calculate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

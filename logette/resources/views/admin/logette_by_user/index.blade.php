@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Logettes</h2>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all(); as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                  @endif
                  @if (Session::has('status'))
                          <div class="alert alert-success">
                              {{Session::get('status')}}
                          </div>
                  @endif

                <div class="card-body">
                        <div class="row">
                            @foreach (Auth::user()->logettes as $logette)
                                <div class="col-lg-6 col-xl-4">
                                    <div class="card card-default p-4">
                                        <div class="media-body">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>{{ __('Name') }}:</strong>
                                                    {{ $logette->libelle }}
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>{{ __('Etat') }}:</strong>
                                                    {{ $logette->etat }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endsection

@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Logettes</h2>
                    @permission('Logette', 'create')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-logette"><i
                                class="mdi mdi-plus mr-1"></i>Ajouter
                        </button>
                    @endpermission
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
                        {{ Session::get('status') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="row">
                        @foreach ($logettes as $logette)
                            <div class="col-lg-6 col-xl-4">
                                <div class="card card-default p-4">
                                    <a href="#" data-toggle="modal"
                                        data-target="#modal-logette{{$logette->id}}">
                                        <div class="media-body">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>{{ __('Libellé') }}:</strong>
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
                                    </a>
                                    @include('admin.logettes.modal.show')
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('admin.logettes.modal.create')
    @endsection

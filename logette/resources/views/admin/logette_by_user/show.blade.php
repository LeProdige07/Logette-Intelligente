@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>45,48</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-show-puissance">Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Les puissances de la logette</span> |
                                <span class="mx-1">45%</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>57,90</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#"   data-toggle="modal" data-target="#modal-show-tension">Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Les tensions de la logette</span> |
                                <span class="mx-1">50%</span>
                                <i class="mdi mdi-arrow-down-bold text-danger"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>65,58</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#"   data-toggle="modal" data-target="#modal-show-energie">Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Les énergies de la logette</span> |
                                <span class="mx-1">20%</span>
                                <i class="mdi mdi-arrow-down-bold text-danger"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>67,09</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#"   data-toggle="modal" data-target="#modal-show-courant">Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Les courants de la logette</span> |
                                <span class="mx-1">35%</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <!-- Current Users  -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Table de la logette</h2>
                            <span>En temps réel</span>
                        </div>
                        <div class="card-body">
                            @if (Session::has('status'))
                                <div class="alert alert-danger">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                        <div class="card-footer bg-white py-4">
                            @if ($logette->etat == 0)
                                <a href="{{ url('/allumer/' . $logette->id) }}" class="btn btn-success">Allumer</a>
                            @else
                                <a href="{{ url('/eteindre/' . $logette->id) }}" class="btn btn-danger">Eteindre</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.logette_by_user.puissances.index')
    @include('admin.logette_by_user.tensions.index')
    @include('admin.logette_by_user.energies.index')
    @include('admin.logette_by_user.courants.index')
@endsection

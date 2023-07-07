@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Roles</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-role"><i
                            class="mdi mdi-plus mr-1"></i>Ajouter
                    </button>
                </div>
                @if (Session::has('status'))
                    <div class="alert alert-success">
                        {{ Session::get('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="collapse" id="collapse-data-tables">

                    </div>
                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                            <tr>
                                <th>Num.</th>
                                <th>Noms</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>ID</th>
                                <th>Actions</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td class="py-0">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>{{ $role->name }}</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>1</td>
                                    <td>
                                        @permission('Role', 'update')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary"><i
                                                    class="mdi mdi-pencil"></i></a>
                                        @endpermission
                                        @permission('Role', 'delete')
                                            <a href="{{ route('roles.destroy', $role->id) }}" id="delete"
                                                class="btn btn-danger"><i class="mdi mdi-close"></i></a>
                                        @endpermission
                                    </td>
                                    <td>
                                        @permission('role', 'read')
                                            <a class="dropdown-toggle icon-burger-mini" href="#">
                                            </a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @include('admin.roles.modal.create')
@endsection

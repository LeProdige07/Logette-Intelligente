@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Roles</h2>
                    @if (Session::has('status'))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                </div>
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
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                        @endpermission
                                        @permission('Role', 'delete')
                                        <a href="{{ route('roles.destroy', $role->id) }}" id="delete"
                                            class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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
@endsection

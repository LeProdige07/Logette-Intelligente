@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Utilisateurs</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-user"> Add
                        Contact
                      </button>

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

                            @foreach ($users as $key => $user)
                                <tr>
                                    <td class="py-0">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRolesUser() }}</td>
                                    <td>1</td>
                                    <td>

                                        @permission('User', 'update')
                                            <a class="btn btn-primary" href="#" data-toggle="modal"
                                                data-target="#ModalEdit{{ $user->id }}">modifier</a>
                                        @endpermission
                                        @permission('User', 'delete')
                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#ModalDelete{{ $user->id }}" id="delete">supprimer</a>
                                        @endpermission
                                    </td>
                                    <td>
                                        @permission('User', 'read')
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
    @include('admin.users.modal.create')
@endsection

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!-- Basic Examples -->
            {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('Nom') }}:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <table class="table datatables" id="dataTable-1">
                    <thead>
                        <tr>
                            <th>Models</th>
                            @foreach ($operations as $item)
                                <th>{{ $item }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $object)
                            <input type="hidden" name="models[]" value="{{ $object }}">
                            <tr>
                                <td>{{ $object }}</td>
                                @foreach ($operations as $operation)
                                    <input type="hidden" name="operators{{ $object }}[]" value="{{ $operation }}">
                                    <td>
                                        <input type="hidden" name="id{{ $object . $operation }}"
                                            value="{{ $class->checkPermission($object, $operation, $role->id) }}">
                                        <input type="checkbox" name="permissions{{ $object . $operation }}"
                                            @if ($class->checkPermission($object, $operation, $role->id) > 0) checked @endif>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-warning">{{ __('Modifier') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

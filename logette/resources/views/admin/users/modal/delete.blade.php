{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'enctype' => 'multipart/form-data']) !!}
{{ method_field('delete') }}
    {{ csrf_field() }}

    <div class="modal fade" id="ModalDelete{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Suppression de l'utilisateur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Voulez-vous supprimer l'utilisateur <b>{{$user->name}}</b> ? </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-smoke btn-pill" data-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-outline-danger">{{ __('Supprimer')}}</button>
                </div>
            </div>
        </div>
    </div>

{!! Form::close() !!}
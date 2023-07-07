{!! Form::open(['route' => 'logettes.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
@csrf
<div class="modal fade" id="modal-add-logette" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Créer une logette</h5>
                </div>
                <div class="modal-body px-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Libellé') }}:</strong>
                            {!! Form::text('libelle', null, ['placeholder' => 'Libellé', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Client') }}:</strong>
                            {!! Form::select('user_id', $users, [], ['placeholder' => 'Selectionner le client','class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4 justify-content-between">
                    <button type="button" class="btn btn-smoke btn-pill" data-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-primary btn-pill">Enregistrer</button>
                </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<!-- .container-fluid -->

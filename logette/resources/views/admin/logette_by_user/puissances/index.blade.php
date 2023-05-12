<div class="modal fade" id="modal-show-puissance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Détails des puissances de la logette {{$logette->libelle}}</h5>
                </div>
                <div class="modal-body px-4">
                    <div class="card card-default">
                        <div class="card-header">
                          <h2>Puissances Table</h2>
                        </div>
                        <div class="card-body">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Puissance 1</th>
                                <th scope="col">Puissance 2</th>
                                <th scope="col">Puissance 3</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($logette->puissances as $key => $puissance)
                                <tr>
                                    <td scope="row">{{ $key }}</td>
                                    <td>{{ $puissance->puissance }}</td>
                                    <td>#</td>
                                    <td>#</td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
        </div>
    </div>
</div>
<!-- .container-fluid -->

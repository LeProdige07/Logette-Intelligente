<div class="modal fade" id="modal-show-courant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title" id="exampleModalCenterTitle">Détails des courants de la logette
                    {{ $logette->libelle }}</h5>
            </div>
            <div class="modal-body px-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Courants Table</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Courant 1</th>
                                    <th scope="col">Courant 2</th>
                                    <th scope="col">Courant 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logette->courants as $key => $courant)
                                    <tr>
                                        <td scope="row">{{$key}}</td>
                                        <td>{{$courant->courant1}}</td>
                                        <td>{{$courant->courant2}}</td>
                                        <td>{{$courant->courant3}}</td>
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

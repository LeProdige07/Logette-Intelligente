<div class="modal fade" id="modal-logette{{ $logette->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-end border-bottom-0">
                <button type="button" class="btn-edit-icon" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-pencil"></i>
                </button>

                <div class="dropdown">
                    <button class="btn-dots-icon" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                    </div>
                </div>

                <button type="button" class="btn-close-icon" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>

            <div class="modal-body pt-0">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <div class="profile-content-left px-4">
                            <div class="card text-center px-0 border-0">
                                <div class="card-body">
                                    <h4 class="py-2">{{ $logette->libelle }}</h4>
                                    @if ($logette->etat == 1)
                                    <p class="badge badge-success">La logette est allumée</p><br><br><br><br>
                                    <a href="{{ url('/eteindre/' . $logette->id) }}" class="btn btn-danger">Eteindre</a>
                                    @else
                                    <p  class="badge badge-danger">La logette est éteinte</p><br><br><br><br>
                                    <a href="{{ url('/allumer/' . $logette->id) }}" class="btn btn-success">Allumer</a>
                                    @endif
                                </div>
                            </div>
                            <br><br><br>
                            <div class="d-flex justify-content-between ">
                                <div class="text-center pb-4">
                                    <h6 class="pb-2">150</h6>
                                    <p>Tension</p>
                                </div>

                                <div class="text-center pb-4">
                                    <h6 class="pb-2">290</h6>
                                    <p>Puissance</p>
                                </div>

                                <div class="text-center pb-4">
                                    <h6 class="pb-2">120</h6>
                                    <p>Energie</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="contact-info px-4">
                            <h4 class="mb-1">Contact Details</h4>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                            <p>{{ $logette->user->email }}</p>
                            <p class="text-dark font-weight-medium pt-4 mb-2">User Name</p>
                            <p>{{ $logette->user->name }}</p>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Birthday</p>
                            <p>Nov 15, 1990</p>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Event</p>
                            <p>Lorem, ipsum dolor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

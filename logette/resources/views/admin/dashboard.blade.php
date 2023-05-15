@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header">
                      <h2>Evolution des utilisateurs</h2>
                      <div class="dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>

                    </div>
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <canvas id="graphicEvolutionUser" height="100px"></canvas>
                      </div>
                    </div>

                  </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var users = {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Les utilisateurs',
                backgroundColor: 'rgb(255, 128, 0)',
                borderColor: 'rgb(255, 99, 132)',
                data: users,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const graphicEvolutionUser = new Chart(
            document.getElementById('graphicEvolutionUser'),
            config
        );
    </script>
@endsection

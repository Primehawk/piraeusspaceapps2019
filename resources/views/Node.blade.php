@extends('layout.default')
@section('content')
    <div class="content-box">
        <div class="content-box-title">
            <span><h3>{!! config('svg-icons.nodes')  !!}Node : ~ {{ $_Node->name }} ~ </h3></span>
        </div>
        <div class="content-box-content">
            <div class="content-box" style="width: 100%;">
                <div class="content-box-title">
                    <span><h3><i class="fas fa-user-friends"></i>Uplinks</h3></span>
                </div>
                <div class="content-box-content">
                    <table id="Uplinks" style="width:100%;">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Date</th>
                            <th>aqi</th>
                            <th>h2</th>
                            <th>lgp</th>
                            <th>ch4</th>
                            <th>alcohol</th>
                            <th>air</th>
                            <th>o3</th>
                            <th>no2</th>
                            <th>so2</th>
                            <th>co</th>
                            <th>temp</th>
                            <th>battery</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($_Uplinks as $Uplink)
                            <tr>
                                <td>{{ $Uplink->id }}</td>
                                <td>{{ $Uplink->captured_at }}</td>
                                <td>{{ $Uplink->aqi }}</td>
                                <td>{{ $Uplink->h2 }}</td>
                                <td>{{ $Uplink->lgp }}</td>
                                <td>{{ $Uplink->ch4 }}</td>
                                <td>{{ $Uplink->alcohol }}</td>
                                <td>{{ $Uplink->air }}</td>
                                <td>{{ $Uplink->o3 }}</td>
                                <td>{{ $Uplink->no2 }}</td>
                                <td>{{ $Uplink->so2 }}</td>
                                <td>{{ $Uplink->co }}</td>
                                <td>{{ $Uplink->temp }}</td>
                                <td>{{ $Uplink->battery }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="content-box-content">
            <div class="content-box" style="width: 100%;">
                <div class="content-box-title">
                    <span><h3><i class="fas fa-user-friends"></i>Reading Graphs</h3></span>
                </div>
                <div class="content-box-content">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">aqi</a></li>
                            <li><a href="#tabs-2">h2</a></li>
                            <li><a href="#tabs-3">lgp</a></li>
                            <li><a href="#tabs-4">ch4</a></li>
                            <li><a href="#tabs-5">alcohol</a></li>
                            <li><a href="#tabs-6">air</a></li>
                            <li><a href="#tabs-7">o3</a></li>
                            <li><a href="#tabs-8">no2</a></li>
                            <li><a href="#tabs-9">so2</a></li>
                            <li><a href="#tabs-10">co</a></li>
                            <li><a href="#tabs-11">temp</a></li>
                            <li><a href="#tabs-12">battery</a></li>
                        </ul>
                        <div id="tabs-1">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div id="tabs-2">

                        </div>
                        <div id="tabs-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('endofpage')
    <script type="text/javascript">
        jQuery(document).ready(function () {

            jQuery('table tbody').on('click', 'tr', function () {
                $(".selected-row").removeClass("selected-row");
                $(this).addClass('selected-row');
            });

            jQuery("table tbody").dblclick(function () {
                var id = jQuery(".selected-row .id-index").text();
                window.location.href = "/Nodes/" + id;
            });

            jQuery('#Uplinks').DataTable({
                "columns": [
                    {"data": "id", "className": "id-index"},
                    {"data": "captured_at"},
                    {"data": "aqi"},
                    {"data": "h2"},
                    {"data": "lgp"},
                    {"data": "ch4"},
                    {"data": "alcohol"},
                    {"data": "air"},
                    {"data": "o3"},
                    {"data": "no2"},
                    {"data": "so2"},
                    {"data": "co"},
                    {"data": "temp"},
                    {"data": "battery"}
                ]
            });
            jQuery('#Uplinks').DataTable().ajax.url("{{route('Uplinks')}}/{{  $_Node->id }}");
            jQuery( "#tabs" ).tabs();

            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'My First dataset',
                        //backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [0, 10, 5, 2, 20, 30, 45]
                    }]
                },

                // Configuration options go here
                options: {}
            });


            var tid = setTimeout(mycode, 5000);
            function mycode() {
                jQuery('#Uplinks').DataTable().ajax.reload();
                tid = setTimeout(mycode, 2000); // repeat myself
            }




        });
    </script>
@stop

@extends('layout.default')
@section('content')
    <div class="content-box">
        <div class="content-box-title">
            <span><h3>{!! config('svg-icons.nodes')  !!}Nodes</h3></span>
        </div>
        <div class="content-box-content">
            <div class="action-box">
                <button id="deleteNode" type="button" class="btn btn-danger">Delete</button>
                <button id="viewNode" type="button" class="btn btn-success">View</button>
                <button data-toggle="modal" data-target="#newNodeModal" type="button" class="btn btn-primary">
                    New
                </button>
            </div>
            <table id="Nodes" style="width:100%">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($_Nodes as $Node)
                    <tr>
                        <td>{{ $Node->id }}</td>
                        <td>{{ $Node->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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

            jQuery('#Nodes').DataTable({
                "columns": [
                    {"data": "id", "className": "id-index"},
                    {"data": "name"}
                ]
            });
            jQuery('#Nodes').DataTable().ajax.url("{{route('Nodes')}}");
        });
    </script>
@stop

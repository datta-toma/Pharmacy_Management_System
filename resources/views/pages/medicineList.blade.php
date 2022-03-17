@extends('layouts.default')
<?php
$success=Session::get('success');
$error=Session::get('error');
?>
@section('title')
    Medicines List
@endsection

@section('stylesheet')
    <!-- Bootstrap -->
    <link href="{{ URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/vendors/build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/css/header.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/w3.css') }}">
    <style>

    </style>
@endsection

@section('content')
    <br/>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if($success!=null)<div align="center" ><h4>{{$success}}</h4></div>@endif
                @if($error!=null)<div align="center" ><h4>{{$error}}</h4></div>@endif
                <div align="center" class="panel-heading"><h3>List of Medicines</h3></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')


    <!--Datatable -->
    <script src="{{URL::asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('/js/bootstrap.js')}}"></script>
    <script src="{{URL::asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{URL::asset('/js/jquery.datatable.min.js')}}"></script>
    <script src="{{URL::asset('/js/datatable.bootstrap.js')}}"></script>


    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
        var $datatable = $('#datatable');

        $datatable.dataTable({
            'order': [[ 0, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [1,2,3,4,5,6,7] }
            ]
        });


        function confirmFunction(){

            var v=confirm("Do you want to delete ?\n If you delete data you can not get it.\nOtherwise you can edit data.");
            if ( v== true) {
                document.getElementById("deleteData").submit();
            } else {
                return false;
            }

        }
    </script>
@endsection

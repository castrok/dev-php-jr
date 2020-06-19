@extends('layout.index')

@section('stylesheet')
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Clientes</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Clientes</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('cliente.create')}}" class="btn btn-primary btn-xs float-right mt-0 mb-3"><i class="mdi mdi-plus-circle-outline mr-2"></i>Adicionar cliente</a>
                    <h4 class="mt-0 header-title">Listando <b>clientes</b></h4>
                    <div class="table-responsive">
                        <table id="tb-clients" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th style="width: 80px">Status</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th class="text-center no-sort" style="width: 80px">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Descomente os campos abaixo e popule com o resultado do banco de dados, de modo a exibir a lista de clientes. -->
                            @foreach($clients as $client)
                                <tr>
                                    <td class="text-center">{{$client->client_status}}</td>
                                    <td>{{$client->client_name}}</td>
                                    <td>{{$client->client_phone}}</td>
                                    <td>{{$client->client_email}}</td>
                                    <td class="text-center">
                                        <a href="{{route('cliente.edit', $client->client_id)}}" class="action" data-toggle="tooltip" title="Editar"><i class="fas fa-paint-brush"></i></a>
                                        <a href="javascript:void(0)" class="action delete" data-url="{{route('cliente.destroy', $client->client_id)}}" data-toggle="tooltip" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptsheet')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.datatable.init.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/delete.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#tb-clients').dataTable( {
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                "aoColumns": [
                    null,
                    null,
                    null,
                    null,
                    null
                ]
            });
        });
    </script>
@endsection

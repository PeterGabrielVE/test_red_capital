@extends('layouts.app')

@section('content')
<div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->
        @include('pages.documents.create')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                 @include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Documentos</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h6 class="m-0 font-weight-bold text-uft">Listado Documentos</h6>
                                    </div>
                                    <div class="pull-right">
                                        <a data-toggle="modal" data-target="#create" class="btn btn-uft" role="button"><i class="fas fa-plus pr-2"></i>Agregar Documento</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre Completo</th>
                                            <th>Documento</th>
                                            <th style="width:16%">Opciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($documents as $user)
                                        <tr>

                                            <td>{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</td>

                                            <td>{{ $user->email ?? '' }}</td>

                                            <td>@if(isset($user->rol_id))
                                                {{ $user->rol->name ?? '' }}
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-uft btn-sm" href="{{ route('documents.destroy',$user->id) }}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $("#form_document").on("submit", function (e) {
            let user = $('#id_user').val();
            let file = $('#form-file').val();

            if(user === '' || user === null){
                alert('Seleccione Usuario');
            }

            if(file === '' || file === null){
                alert('Suba archivo');
            }
        });
	function cerrarModal(){
		$('#create').modal('hide');
	}
</script>
@endsection

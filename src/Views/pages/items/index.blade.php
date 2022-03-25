@extends('nutech::layouts.app')
@section('css-third')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/masfahri/nutech/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/masfahri/nutech/assets/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('vendor/masfahri/nutech/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('vendor/masfahri/nutech/assets/plugins/toastr/toastr.min.css') }}">
    <style>
        .floating-container {
            position: fixed;
            width: 100px;
            height: 100px;
            bottom: 0;
            right: 0;
            margin: 35px 25px;
        }

        .floating-container:hover {
            height: 300px;
        }

        .floating-container:hover .floating-button {
            box-shadow: 0 10px 25px rgba(44, 179, 240, 0.6);
            -webkit-transform: translatey(5px);
            transform: translatey(5px);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .floating-container:hover .element-container .float-element:nth-child(1) {
            -webkit-animation: come-in 0.4s forwards 0.2s;
            animation: come-in 0.4s forwards 0.2s;
        }

        .floating-container:hover .element-container .float-element:nth-child(2) {
            -webkit-animation: come-in 0.4s forwards 0.4s;
            animation: come-in 0.4s forwards 0.4s;
        }

        .floating-container:hover .element-container .float-element:nth-child(3) {
            -webkit-animation: come-in 0.4s forwards 0.6s;
            animation: come-in 0.4s forwards 0.6s;
        }

        .floating-container .floating-button {
            position: absolute;
            width: 65px;
            height: 65px;
            background: #2cb3f0;
            bottom: 0;
            border-radius: 50%;
            left: 0;
            right: 0;
            margin: auto;
            color: white;
            line-height: 65px;
            text-align: center;
            font-size: 23px;
            z-index: 100;
            box-shadow: 0 10px 25px -5px rgba(44, 179, 240, 0.6);
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .floating-container .float-element {
            position: relative;
            display: block;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin: 15px auto;
            color: white;
            font-weight: 500;
            text-align: center;
            line-height: 50px;
            z-index: 0;
            opacity: 0;
            -webkit-transform: translateY(100px);
            transform: translateY(100px);
        }

        .floating-container .float-element .material-icons {
            vertical-align: middle;
            font-size: 16px;
        }

        .floating-container .float-element:nth-child(1) {
            background: #42A5F5;
            box-shadow: 0 20px 20px -10px rgba(66, 165, 245, 0.5);
        }

        .floating-container .float-element:nth-child(2) {
            background: #4CAF50;
            box-shadow: 0 20px 20px -10px rgba(76, 175, 80, 0.5);
        }

        .floating-container .float-element:nth-child(3) {
            background: #FF9800;
            box-shadow: 0 20px 20px -10px rgba(255, 152, 0, 0.5);
        }

    </style>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        @include('sweetalert::alert')
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Items
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <table class="table table-hover table-bordered data-table">
                                    <thead class="bg-secondary text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Image</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        @include('nutech::components.modal.items.add')
        @include('nutech::components.modal.items.edit')
    </section>
    <div class="floating-container" id="add">
        <div class="floating-button">+</div>
    </div>
    <!-- /.content -->
@endsection
@section('js-third')
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}">
    </script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}">
    </script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/masfahri/nutech/assets/dist/js/adminlte.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('vendor/masfahri/nutech/assets/plugins/toastr/toastr.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('vendor/masfahri/nutech/assets/dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>

    </script>
    <script src="{{ asset('vendor/masfahri/nutech/assets/dist/js/pages/items.js') }}"></script>
    <script>
        
    </script>
@endsection

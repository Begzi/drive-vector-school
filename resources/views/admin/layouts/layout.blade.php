<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Blank Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" target="_blank" class="brand-link">
            <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">На сайт</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">Admin</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Главная</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Сведения
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.common') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Основные сведения</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.struct') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Структура</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.document') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Документы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.education') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Образование</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.eduStandarts') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Образовательные стандарты и требования</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.employees') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Руководство. Педагогический (научно-педагогический) состав</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.objects') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Материально-техническое обеспечение и оснащенность образовательного процесса</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.grants') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Стипендии и меры поддержки обучающихся</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.paidEdu') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Платные образовательные услуги</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.budget') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Финансово-хозяйственная деятельность</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sveden.vacant') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Вакантные места для приема (перевода) обучающихся</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
<script>
    $('.nav-sidebar a').each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if (link == location) {
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });

    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

<script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>

<script>
</script>

</body>
</html>

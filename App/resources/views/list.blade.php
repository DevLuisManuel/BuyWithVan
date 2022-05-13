<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Lista de Usuarios</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/adminlte.min.css") }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{ asset("bower_components/admin-lte/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Prueba Tecnica</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://media-exp1.licdn.com/dms/image/C4D03AQGTZlKp-hSALg/profile-displayphoto-shrink_800_800/0/1651190574655?e=1657756800&v=beta&t=ZnoF4c6FAqI5PvmktG2_Z5xbuQWYxSsk-qYYePRnSbo"
                         class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Luis Zuñiga</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="https://github.com/DevLuisManuel" class="nav-link">
                            <i class="nav-icon fab fa-github"></i> Perfil de Github
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.linkedin.com/in/devluism/" class="nav-link">
                            <i class="nav-icon fab fa-linkedin"></i> Perfil de Linkedin
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><b>Listado de Usuarios:</b> Post incluidos</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($users as $user)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><b>{{ $user->name }} [{{ $user->username }}] -
                                            <small>{{ $user->email }}</small></b></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                    @foreach($user->Posts as $key=>$post)
                                        <div id="accordion">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4 class="card-title w-100">
                                                        <a class="d-block w-100" data-toggle="collapse"
                                                           href="#post{{ $post->id }}">
                                                            <b>{{ $post->title }} # {{ $key+1 }}</b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="post{{$post->id}}" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        {{ $post->body }}
                                                        <br/>
                                                        @if(count($post->Comments)>0)
                                                            <b>Comments:</b>
                                                        @endif
                                                        @foreach($post->Comments as $comment)
                                                            <blockquote>
                                                                <p>{{ $comment->body }}</p>
                                                                <small>{{ $comment->name }} - <cite
                                                                        title="Source Title">{{ $comment->email }}</cite></small>
                                                            </blockquote>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    @endforeach
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            @DevLuisManuel
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset("bower_components/admin-lte/plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
</body>
</html>

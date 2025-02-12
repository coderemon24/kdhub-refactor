<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Digital Agency - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    
    <style>
        .active {
            color: white !important;
            background: #1f41a7;
        }
        .active>i{
            color: white !important;
        }
        .rotate{
            transform: rotate(180deg) !important;
        }
        .fa-angle-down{
            transition: all 0.3s ease-in-out;
        }
    </style>
    
    @livewireStyles
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav overflow-hidden bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <a href="{{route('dashboard')}}"><img src="assets/image/logo.jpeg" alt="Logo" width="50"></a> --}}
                    <i class="fas fa-laugh-wink text-warning"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kaizen Digital<sup>Hub</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('admin.orders')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Orders</span></a>
            </li> --}}

            <!-- Divider -->
            {{-- <hr class="sidebar-divider"> --}}
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.clients')) active @endif" href="{{route("admin.clients")}}">
                    <i class="fas fa-file"></i>
                    <span>Manage Client Logo</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.team')) active @endif" href="{{route("admin.team")}}">
                    <i class="fas fa-users"></i>
                    <span>Manage Team</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('blog.*')) active @endif" href="{{route("blog.index")}}">
                    <i class="fas fa-users"></i>
                    <span>Manage Blogs</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" id="providedServices" class="nav-link @if(request()->routeIs('manage.page')||request()->routeIs('manage.section')||request()->routeIs('service.*') || request()->routeIs('content.*') || request()->routeIs('section.*') || request()->routeIs('page.*'))) active @endif">
                    <i class="fas fa-clipboard"></i>
                    <span class="mr-2">Service We Provide</span>
                    <i class="fas fa-angle-down down_angle"></i>
                </a>
                <ul class="sub-menu pl-0">
                    <li class="nav-item  list-unstyled">
                        <a class="nav-link pl-4 @if(request()->routeIs('service.category.*')) active @endif" href="{{route("service.category.index")}}">
                            <i class="fas fa-users"></i>
                            <span>Service Categories</span>
                        </a>
                    </li>
                    
                    <li class="nav-item  list-unstyled">
                        <a class="nav-link pl-4 @if(request()->routeIs('page.*')) active @endif" href="{{route("page.index")}}">
                            <i class="fas fa-users"></i>
                            <span>Pages</span>
                        </a>
                    </li>
                    
                    <li class="nav-item list-unstyled">
                        <a href="{{route("service.manage.show")}}" class="nav-link pl-4 @if(request()->routeIs('service.manage.*') || request()->routeIs('section.*')) active @endif">
                            <i class="fas fa-users"></i>
                            <span>Manage Page Section</span>
                        </a>
                    </li>
                    <li class="nav-item list-unstyled">
                        <a href="{{route("manage.page")}}" class="nav-link pl-4 @if(request()->routeIs('content.*')|| request()->routeIs('manage.section') || request()->routeIs('manage.page')) active @endif">
                            <i class="fas fa-users"></i>
                            <span>Section Contents</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.orders')) active @endif" href="{{route("admin.orders")}}">
                    <i class="fas fa-fw fa-bug"></i>
                    <span>Manage Orders</span></a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.whyus')) active @endif" href="{{route("admin.whyus")}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Why Us section</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.services') || request()->routeIs('admin.service_edit') || request()->routeIs('admin.service_create')) active @endif" href="{{route("admin.services")}}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Services section</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("company.stats")}}" class="nav-link @if(request()->routeIs('company.*')) active @endif" >
                    <i class="fas fa-fw fa-tools"></i>
                    <span>Company Stats</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.settings')) active @endif" href="{{route("admin.settings")}}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Settings</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            {{-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> --}}
                            <!-- Dropdown - Messages -->
                            {{-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <img class="img-profile rounded-circle"
                                        src="{{ Auth::user()->profile_photo_url }}">
                                @else
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('admin/img/undraw_profile.svg') }}">
                                @endif
                                {{-- <img class="img-profile rounded-circle"
                                        src="{{ Auth::user()->profile_photo_url }}"> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    {{$slot}}

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        {{-- <span>Copyright &copy; Quick Wash {{date('Y')}}</span> --}}
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST">
                        @csrf
                     </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.2/tinymce.min.js" integrity="sha512-lLE5tUMZXmDmyGWI5KDlFemVusXiALcU1lPibL4xkPbPvuOXfXcdoeU3KBDxWp18/KOzrfKkgsscN1t9740ciA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    
    <script>
        $( document ).ready(function() {
            let menu_item = $('#providedServices');
            if(menu_item.hasClass('active')) {
                $('.sub-menu').slideDown();
            }else{
                $('.sub-menu').slideUp();
            }
            
            $('#providedServices').click(function(){
                $('.sub-menu').removeClass('d-none').slideToggle();
                $('.down_angle').toggleClass('rotate');
            })
        })
    </script>
    
    

    @stack('scripts') 
    
    
@livewireScripts

</body>

</html>
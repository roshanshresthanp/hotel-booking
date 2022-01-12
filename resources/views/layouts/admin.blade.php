<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{__('Admin Dashboard')}} - {{__('Trimurti')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <!-- CK Editor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <!--Toastr  -->

        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    

    <!--Custom css-->
    <link rel="stylesheet" href="{{ asset('/css/admincss.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.eot">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.ttf">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.woff">
   

    {{-- Nepali date picker  --}}
    <link rel="stylesheet" href="{{asset('dist/css/nepaliDatePicker.min.css')}}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" target="_blank" class="nav-link">{{__('Home')}}</a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                  @if(app()->getLocale() == 'en')
                    <a href="/lang/np" class="nav-link px-1 cus-center" style="border-radius: 2px;">
                      <img src="/images/nepal-Icon1.png" alt="" class="img-fluid mr-1" style="max-width: 1.2rem;">
                      नेपाली
                    </a>
                  @elseif(app()->getLocale() == 'np')
                    <a href="/lang/en" class="nav-link px-1 cus-center" style="border-radius: 2px;">
                      <img src="/images/england-icon.png" alt="" class="img-fluid mr-1" style="max-height: 0.7rem;">
                      English
                    </a>
                  @endif
              </li> --}}
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user"></i>&nbsp;&nbsp; {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                {{-- <img src="{{asset('storage/hotel/logo.png')}}" alt="logo" style="max-width: 4rem;" class="rounded"> --}}
                <span class="brand-text font-weight-light"><b>{{__('Hotel Trimurti')}}</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
               {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                         @if(auth()->user()->exists())
                        <i class="fas fa-user"></i>
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{auth()->user()->name}}</a>
                    </div>
                </div> --}}
            


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{url('admin/dashboard')}}"
                                class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>
                                    {{__('Dashboard')}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.hotel.edit',1)}}" class="nav-link">
                              <i class="fas fa-hotel mr-1"></i>
                              <p>
                                {{__('Hotel')}}
                              </p>
                            </a>
                          </li>
                        
                        <li class="nav-item">
                          <a href="{{route('admin.categories.index')}}" class="nav-link">
                            <i class="fas fa-image mr-1"></i>
                            <p>
                              {{__('Category')}}
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.features.index')}}"
                                class="nav-link">
                                <i class="fas fa-tools mr-1"></i>
                                <p>
                                    {{__('Features')}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.room-details.index')}}"
                                class="nav-link">
                                <i class="fas fa-tools mr-1"></i>
                                <p>
                                    {{__('Room Details')}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.rooms.index')}}"
                                class="nav-link">
                                <i class="fas fa-bed mr-1"></i>
                                <p>
                                    {{__('Room')}}
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('admin.galleries.index')}}"
                                class="nav-link">
                                <i class="fas fa-image mr-1"></i>
                                <p>
                                    {{__('Image Gallery')}}
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('admin.bookings.index')}}"
                                class="nav-link">
                                <i class="fas fa-envelope mr-1"></i>
                                <p>
                                    {{__('Booking')}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.contacts.index')}}"
                                class="nav-link">
                                <i class="fas fa-inbox mr-1"></i>
                                <p>
                                    {{__('Feedback')}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-edit mr-1"></i>
                                <p>
                                    {{__('Pages')}}
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">5</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('admin.services.index')}}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-link mr-1"></i>
                                        <p>
                                            {{__('Our Services')}}
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('admin.about-us.index')}}"  class="nav-link">
                                        <i class="nav-icon fa fa-users mr" aria-hidden="true"></i>
                                        <p>
                                            {{__('About us')}}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.about-explore.index')}}"  class="nav-link">
                                        <i class="nav-icon fa fa-box mr" aria-hidden="true"></i>
                                        <p>
                                            {{__('About Explore')}}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.banners.index')}}" class="nav-link">
                                        <i class="far fa-square nav-icon"></i>
                                        <p>{{__('Banner')}}</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('admin.testimonials.index')}}" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            {{__('Testimonials')}}
                                        </p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="/{{app()->getLocale()}}/admin/vmo/edit" class="nav-link">
                                        <i class="nav-icon fas fa-eye"></i>
                                        <p>
                                            {{__('Strategy / Plan')}}
                                        </p>
                                    </a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a href="/{{app()->getLocale()}}/admin/organization-chart/" class="nav-link">
                                        <i class="far fa-square nav-icon"></i>
                                        <p>{{__('Organization Chart')}}</p>
                                    </a>
                                </li> --}}
                                
                                {{-- <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ Request::is('admin/officers') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user-tie"></i>
                                        <p>
                                            {{__('Officers')}}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ Request::is('admin/employees') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user-tie"></i>
                                        <p>
                                            {{__('Members')}}
                                        </p>
                                    </a>
                                </li> --}}
        
                            </ul>
                        </li>
                         <li class="nav-item">
                            <a href="{{route('admin.contacts.edit',1)}}" class="nav-link">
                              <i class="fas fa-phone mr-1"></i>
                              <p>
                                {{__('Contact')}}
                              </p>
                            </a>
                          </li>
                        

                            <ul class="nav nav-treeview">
                                {{-- <li class="nav-item">
                                    <a href="{{ route('admin.media-categories', app()->getLocale()) }}"
                                        class="nav-link {{ Request::is('admin/media-categories') ? 'active' : '' }}">
                                        <i class="fas fa-list"></i>
                                        <p>Available Media Categories</p>
                                    </a>
                                </li> --}}


                                {{-- <li class="nav-item">
                                    <a href="{{ route('admin.images', app()->getLocale()) }}"
                                        class="nav-link {{ Request::is('admin/images') ? 'active' : '' }}">
                                        <i class="far fa-image"></i>
                                        <p>Available Images</p>
                                    </a>
                                </li> --}}

                                {{-- <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="nav-icon fas fa-image"></i>
                                      <p>{{__('Image Gallery')}}</p>
                                  </a>
                                </li>

                                <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="nav-icon fas fa-video mr-1"></i>
                                      <p>{{__('Video Gallery')}}</p>
                                  </a>
                                </li>
                            </ul>
                        </li> --}}

                        

                       

                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.about-us', app()->getLocale()) }}"
                                class="nav-link {{ Request::is('admin/about-us') ? 'active' : '' }}">
                                <i class="fa fa-users mr-1" aria-hidden="true"></i>
                                <p>
                                    {{__('About Us')}}
                                </p>
                            </a>
                        </li> --}}
                        
                       
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.image-folders.index', app()->getLocale()) }}" class="nav-link">
                                <i class="far fa-file-alt"></i>
                                <p>License Report</p>
                            </a>
                        </li>

                          <li class="nav-item">
                              <a href="{{ route('admin.videos', app()->getLocale()) }}"
                                  class="nav-link">
                                  <i class="fas fa-bus"></i>
                                  <p>Vehicle Report</p>
                              </a>
                          </li> --}}

                        <!-- /.media-menu -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        {{-- ********************************************************** Page Content ******************************************************** --}}
        <div class="content-wrapper">

            @include('inc.messages')

            <section class="content mt-0">
                <div class="container-fluid spad-sm">
                    @yield('content')

                    <!-- /.content -->
                </div>
            </section>
        </div>

        {{-- ******************************************************************** End of Page Content ************************************************ --}}


        <!-- /.content-wrapper -->
        <footer class="main-footer">
            {{-- <div>
                {{__('© All Right Reserved: Department of Transport Management, Hetauda')}}
              </div> --}}
              <div>
                {{__('Developed by')}} -<a href="http://letitgrownepal.com/" class="text-black" target="_blank"> Let IT Grow</a>
              </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script> 
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('dist/js/nepaliDatePicker.min.js')}}"></script>
    <script src="{{ asset('dist/js/nepali-date-picker-custom.js')}}"></script>
    <script>
        $(function() {
            // $("#field_of_interest").DataTable({
            //     "responsive": true,
            //     "lengthChange": false,
            //     "autoWidth": false,
            //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            // }).buttons().container().appendTo('#field_of_interest_wrapper .col-md-6:eq(0)');

            $('#field_of_interest').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
<script>
          // ck-editor 5
      document.querySelectorAll('.ck-editor').forEach(element => {
        ClassicEditor
        .create(element,{
            ckfinder: {
            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        }
        })
        .catch( error => {
          console.error(error);
        });
      });
</script>
    @yield('scripts')

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <script>
        $('.dropify').dropify();
    </script>

{{-- 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/demo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/pages/dashboard3.min.js"></script>
 --}}

</body>

</html>

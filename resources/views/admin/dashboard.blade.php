<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>InQ - A Responsive Bootstrap 3 Admin Dashboard Template</title>
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <!-- Toastr style -->
        <link href="{{ asset('backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
        <!-- Gritter -->
        <link href="{{ asset('backend/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
        <!-- morris -->
        <link href="{{ asset('backend/css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/css/animate.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/css/forms/kforms.css')}}" rel="stylesheet">

    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side fixed-menu" role="navigation">
                <div class="sidebar-collapse">
                    <div id="hover-menu"></div>
                    <ul class="nav metismenu" id="side-menu">
                        <li>
                            <div class="logopanel" style="margin-left: 0px; z-index: 99999">
                                <div class="profile-element">
                                    <h2><a href="index.html">QTC ADMIN</a></h2>
                                </div>
                                <div class="logo-element">
                                    InQ
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="leftpanel-profile">
                                <div class="media-left">
                                    <a href="#">
                                        <img src="" alt="" class="media-object img-circle">
                                    </a>
                                </div>
                                <div class="media-body profile-name" style="white-space: nowrap;">
                                    <h5 class="media-heading"><?php $ten = Auth::user()->account_username;if($ten) echo $ten; ?><a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                                    <span>Software Engineer</span>
                                </div>
                            </div>
                            <div class="leftpanel-userinfo collapse" id="loguserinfo" style="position: absolute; background: #3b4354!important">
                                <h5 class="sidebar-title">Address</h5>
                                <address>
                                    Dumaguete Negros Is.
                                    Philippines 6200
                                </address>
                                <h5 class="sidebar-title">Contact</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <label class="pull-left">Email</label>
                                        <span class="pull-right">demo@softreliance.com</span>
                                    </li>
                                    <li class="list-group-item">
                                        <label class="pull-left">Home</label>
                                        <span class="pull-right">(032) 1234 567</span>
                                    </li>
                                    <li class="list-group-item">
                                        <label class="pull-left">Mobile</label>
                                        <span class="pull-right">+63012 3456 789</span>
                                    </li>
                                    <li class="list-group-item">
                                        <label class="pull-left">Social</label>
                                        <div class="social-icons pull-right">
                                            <a href="#"><i class="fa fa-facebook-official"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <!-- START : Left sidebar -->
                            <div class="nano left-sidebar">
                                <div class="nano-content">
                                    <ul class="nav nav-pills nav-stacked nav-inq">
                                        <li class="active">
                                            <a href="index.html"><i class="fa fa-home"></i> <span class="nav-label">Dashboards</span></a>
                                        </li>

                                        <li class="nav-parent">

                                            <a href="#"><i><img src=""></i> <span class="nav-label">Quản lý Tài Khoản</span></a>
                                            <ul class="children nav">
                                                <li><a href="{{ URL::to('admin/manage-account') }}">Danh sách Tài khoản</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-parent">

                                            <a href="#"><i><img src=""></i> <span class="nav-label">Quản lý sản phẩm</span></a>
                                            <ul class="children nav">
                                                <li><a href="{{ URL::to('admin/manage-product-category') }}">Danh mục sản phẩm</a></li>
                                                <li><a href="{{ URL::to('admin/manage-product-product') }}">Danh sách sản phẩmt</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-parent">
                                            <a href="#"><i><img src=""></i> <span class="nav-label">Quản lý các tầng</span></a>
                                            <ul class="children nav">
                                                <li><a href="{{ URL::to('admin/manage-floor-table') }}">Danh sách tầng</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-parent">
                                            <a href="#"><i><img src=""></i> <span class="nav-label">Quản lý khách hàng</span></a>
                                            <ul class="children nav">
                                                <li><a href="{{ URL::to('admin/manage-customer') }}">Danh sách khách hàng</a></li>\
                                                <li><a href="{{ URL::to('admin/manage-customer-level') }}">Cấp độ khách hàng</a></li>
                                            </ul>
                                        </li>





                                    </ul>
                                </div>
                            </div>
                            <!-- END : Left sidebar -->
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg">
                <!-- BEGIN HEADER -->
                <div id="header">
                    <nav class="navbar navbar-fixed-top white-bg show-menu-full" id="nav" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn" href="javascript:void(0)"><i class="fa fa-bars" style="font-size:27px;"></i> </a>
                            <form role="search" class="navbar-form-custom">
                                <div class="form-group">
                                    <div class="kform inq">
                                        <div>
                                            <label class="field append-icon">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown hidden-xs">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <i class="fa fa-envelope"></i>  <span class="label label-danger">4</span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="mailbox.html" class="animated animated-short fadeInUp">
                                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown hidden-xs">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <i class="fa fa-bell"></i>  <span class="label label-danger">5</span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="mailbox.html" class="animated animated-short fadeInUp">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <span class="pl15">Cristiano Khánh</span>
                                    <span class="caret caret-tp"></span>
                                </a>
                                <ul class="dropdown-menu animated m-t-xs">
                                    <li><a  class="animated animated-short fadeInUp">.........</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.html" class="animated animated-short fadeInUp"><i class="fa fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- END HEADER -->





                @yield('admin_content')




                <div class="footer">
               <div class="pull-right">
                  10GB of <strong>250GB</strong> Free.
               </div>
               <div>
                  <strong>Copyright</strong> Your Company &copy; 2015-2016
               </div>
            </div>



            </div>
            <!-- Mainly scripts -->
            <script src="{{ asset('backend/js/jquery-2.1.1.js')}}"></script>
            <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
            <script src="{{ asset('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
            <script src="{{ asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
            <!-- Morris -->

            <script src="{{ asset('backend/js/plugins/morris/morris.js')}}"></script>
            <!-- Chartist -->

            <!-- Custom and plugin javascript -->
            <script src="{{ asset('backend/js/main.js')}}"></script>
            <script src="{{ asset('backend/js/plugins/pace/pace.min.js')}}"></script>
            <!-- Jvectormap -->
            <script src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
            <script src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
            <!-- Sparkline -->
            <script src="{{ asset('backend/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
            <!-- Sparkline demo data  -->
            <script src="{{ asset('backend/js/demo/sparkline-demo.js')}}"></script>
            <script src="{{ asset('backend/js/plugins/chartJs/Chart.min.js')}}"></script>
    </body>
    <script>
        $(document).ready(function () {
            "use strict";
            // Add slimscroll to element
            $('.full-height-scroll').slimscroll({
                height: '100%'
            });
        });
        </script>
</html>

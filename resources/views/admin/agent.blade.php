@extends('admin.dashboard')
@section('admin_content')
   <body>
    <div style="clear: both; height: 61px;"></div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="inqbox float-e-margins">
                <div class="inqbox-content">
                    <h2>Project list</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Apps</a>
                        </li>
                        <li class="active">
                            <strong>Project list</strong>
                        </li>
                    </ol>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="inqbox">
                <div class="inqbox-title">
                    <h5>All projects assigned to this account</h5>
                    <div class="inqbox-tools">
                        <button id="create_account_customer" onclick="hhh()" class="btn btn-primary btn-xs">Thêm người dùng</button>
                    </div>
                </div>
                <div class="inqbox-content">
                    <div class="row m-b-sm m-t-sm">
                        <div class="col-md-1">
                            <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button>
                        </div>
                        <div class="col-md-11">
                            <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                            <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span>
                            </div>
                        </div>
                    </div>

                    <div class="project-list">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width:30px;"></th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th style="width:30px;"></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>


@endsection

@extends('admin.dashboard')
@section('admin_content')
   <body>
    {{-- <?php $idbussin = Auth::user()->id_business;
    ?> --}}
    <div style="clear: both; height: 61px;"></div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
               <div class="inqbox float-e-margins">
                  <div class="inqbox-content">
                     <h2>Business Store</h2>
                     <ol class="breadcrumb">
                        <li>
                           <a href="index.html">Home</a>
                        </li>
                        <li>
                           <a>Apps</a>
                        </li>
                        <li class="active">
                           <strong>Clients</strong>
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-8">
               <div class="inqbox">
                  <div class="inqbox-content">
                           <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2015</span>
                           <h2>Agent</h2>
                           <div class="input-group">
                              <input type="text" placeholder="Search client " class="input form-control">
                              <span class="input-group-btn">
                              <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                              </span>
                           </div>
                           <div class="clients-list">
                              <ul class="nav nav-tabs tab-border-top-danger">
                                 <li class="active"><a data-toggle="tab" href="#tab-account"><i class="fa fa-user"></i> Account</a></li>
                                 <li class="active"> <button type="button" name="x" id="x" data-toggle="modal" data-target="#add_account_Modal" class="btn btn-warning">Add</button></li>
                              </ul>
                              <div class="tab-content" >

                                 <div id="tab-account" class="tab-pane active" >
                                    <div class="full-height-scroll">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-hover">
                                             <tbody id="content-account">

                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-4">
               <div class="inqbox ">
                  <div class="inqbox-content">
                     <div class="tab-content" id="detail-account">

                     </div>
                  </div>
               </div>
            </div>
         </div>

    </div>
    <meta name="csrf-token-disable-account" content="{{ csrf_token() }}" />
    <meta name="csrf-token-detail" content="{{ csrf_token() }}" />
        <div id="add_account_Modal" class="modal fade">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Thêm Nhân Viên</h4>
              </div>
              <div class="modal-body">
                <meta name="csrf-token-insert" content="{{ csrf_token() }}" />
               <form method="post" id="insert_account_form">
                <input type="hidden" name="id_business" id="" value="{{Auth::user()->id_business}}">
                <label>Username</label>
                <input type="text" name="account_username" id="username" class="form-control" />
                <br />
                <label>Password</label>
                <textarea name="account_password" id="password"  class="form-control"></textarea>
                <br />
                <label>Họ và tên đầy đủ</label>
                <input type="text" name="account_fullname" id="fullname" class="form-control" />
                <br />
                <label>Email</label>
                <input type="text" name="account_email" id="email" class="form-control" />
                <br />
                <label>Số điện thoại</label>
                <input type="tel" id="phone" name="account_phone" class="form-control">
                <br />
                <label>Loại nhân viên</label>
                <select id="type_account" name="id_type">

                </select>
                <br />
                <input type="submit" name="insert" id="insert_account" value="Thêm" class="btn btn-success" />
               </form>
              </div>
              <div class="modal-footer">
               <button type="button" id="close_modol_insert" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
             </div>
            </div>
           </div>


           <div id="edit_account_Modal" class="modal fade">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Nhân Viên</h4>
              </div>
              <div class="modal-body">
                <meta name="csrf-token-edit" content="{{ csrf_token() }}" />
               <form id="edit_account_form">
                <label>Username</label>
                <input type="text" name="account_username" id="eusername" class="form-control" />
                <br />
                <label>Họ và tên đầy đủ</label>
                <input type="text" name="account_fullname" id="efullname" class="form-control" />
                <br />
                <label>Email</label>
                <input type="text" name="account_email" id="eemail" class="form-control" />
                <br />
                <label>Số điện thoại</label>
                <input type="tel" id="ephone" name="account_phone" class="form-control">
                <br />
                <label>Loại nhân viên</label>
                <select id="etype_account" name="id_type">

                </select>
                <br />
                <input id="id_edit_account" value="" type="hidden">
                <input type="submit" name="edit" id="edit_account" value="Cập nhật" class="btn btn-success" />
               </form>
              </div>
              <div class="modal-footer">
               <button type="button" id="close_modol_edit" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
             </div>
            </div>
           </div>


           <div id="author_account_Modal" class="modal fade">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Phân quyền nhân viên</h4>
              </div>
              <div class="modal-body">

                <form id="author_account_form">
                <meta name="csrf-token-author" content="{{ csrf_token() }}" />
                <div class="inqbox-content">
                    <table class="table table-striped">
                       <thead>
                          <tr>
                             <th></th>
                             <th></th>
                          </tr>
                       </thead>
                       <tbody id="account_permission">

                       </tbody>
                    </table>
                 </div>
                 <input id="id_author_account" value="" type="hidden">
                <br />
                <input type="submit" name="edit" id="btn_author_account" value="Cập nhật" class="btn btn-success" />
                {{-- <button type="button" id="btn-author_account" class="btn btn-success">Phân quyền</button> --}}
                </form>
              </div>
              <div class="modal-footer">
               <button type="button" id="close_modol_author" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
             </div>
            </div>
           </div>


           <div id="change_password_account_Modal" class="modal fade">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Đổi lại mật khẩu</h4>
              </div>
              <div class="modal-body">

                <form id="change_password_account_form">
                <meta name="csrf-token-change-password" content="{{ csrf_token() }}" />
                <div class="inqbox-content">
                    <label>Mật khẩu mới</label>
                    <input type="password" name="account_password" id="epassword_change" class="form-control" />
                    <br />
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" name="account_password" id="epassword_change2" class="form-control" />
                     <br />
                    </div>
                     <input id="id_change_password_account" value="" type="hidden">
                    <br />
                <input type="submit" name="edit" id="btn_change_password_account" value="Cập nhật" class="btn btn-success" />
                </form>
              </div>
              <div class="modal-footer">
               <button type="button" id="close_modol_changge_password" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
             </div>
            </div>
           </div>
    </body>
    <script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/main/admin_account.js') }}"></script>
@endsection

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
                                 <li class="active"><a data-toggle="tab"><i class="fa fa-user"></i> Khách hàng</a></li>
                                 <li class="active"> <button type="button" name="x" id="x" data-toggle="modal" data-target="#add_customer_Modal" class="btn btn-warning">Add</button></li>
                              </ul>
                              <div class="tab-content" >

                                 <div id="tab-account" class="tab-pane active" >
                                    <div class="full-height-scroll">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-hover">
                                            <tr>
                                                <td><a data-toggle="tab" class="client-link">Tên</a></td>
                                                <td>SDT</td>
                                                <td>Điểm</td>
                                                <td class="client-status"></td>
                                            </tr>
                                             <tbody id="content-customer">

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
    <meta name="csrf-token-customer-list" content="{{ csrf_token() }}" />
    <meta name="csrf-token-detail" content="{{ csrf_token() }}" />
        <div id="add_customer_Modal" class="modal fade">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Thêm khách hàng</h4>
              </div>
              <div class="modal-body">

               <form id="insert_customer_form">
                {{ csrf_field() }}
                <label>Tên khách hàng</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" />
                <br />
                <label>Số điện thoại</label>
                <input type="tel" id="customer_phone" name="customer_phone" class="form-control">
                <br />
                <label>Địa chỉ</label>
                <input type="tel" id="customer_address" name="customer_address" class="form-control">
                <br />
                <label>Email</label>
                <input type="text" name="customer_email" id="customer_email" class="form-control" />
                <br />
                <label>Ngày tháng năm sinh</label>
                <input type="date" name="customer_birthday" id="customer_birthday" class="form-control" />
                <br />
                <label>Giới tính</label>
                            <input class="form-check-input" type="radio" name="customer_sex" id="customer_sex_male" value="male" checked>
                            <label class="form-check-label" for="exampleRadios1">Nam</label>
                            <input class="form-check-input" type="radio" name="customer_sex" id="customer_sex_female" value="female" checked>
                            <label class="form-check-label" for="exampleRadios1">Nữ</label>
                <br />
                <br />
                <label>Mã số thuế</label>
                <input type="text" name="customer_taxcode" id="customer_taxcode" class="form-control" />
                <br />
                <label>Mã code</label>
                <input type="text" name="customer_code" id="customer_code" class="form-control" />
                <br />

                <input type="submit" name="insert" id="insert_customer" value="Thêm" class="btn btn-success" />
               </form>
              </div>
              <div class="modal-footer">
               <button type="button" id="close_modol_insert" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
             </div>
            </div>
           </div>


           <div id="edit_customer_Modal" class="modal fade">
            <div class="modal-dialog">
             <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Cập nhật thông tin khách hàng</h4>
              </div>
              <div class="modal-body">
                <meta name="csrf-token-edit" content="{{ csrf_token() }}" />
                <form id="edit_customer_form">
                    {{ csrf_field() }}
                    <input type="hidden" value=""  id="id_customer" name="id_customer">

                    <label>Tên khách hàng</label>
                    <input type="text" id="ecustomer_name" name="customer_name"  class="form-control" />
                    <br />
                    <label>Số điện thoại</label>
                    <input type="tel" id="ecustomer_phone" name="customer_phone" class="form-control">
                    <br />
                    <label>Địa chỉ</label>
                    <input type="tel" id="ecustomer_address" name="customer_address" class="form-control">
                    <br />

                    <label>Mã code</label>
                    <input type="text" id="ecustomer_code" name="customer_code" class="form-control" />
                    <br />
                    <input type="submit" name="edit" id="edit_customer" value="Cập nhật" class="btn btn-success" />
                   </form>
              </div>
              <div class="modal-footer">
               <button type="button" id="close_modol_edit" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
             </div>
            </div>
           </div>






    </body>
    <script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/main/admin_local.js') }}"></script>
    <script src="{{ asset('backend/js/main/admin_customer.js') }}"></script>
@endsection

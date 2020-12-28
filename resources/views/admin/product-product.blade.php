@extends('admin.dashboard')
@section('admin_content')
   <body>

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
                           <h2>Sản phẩm</h2>
                           <div class="input-group">
                              <input type="text" id="seach_auto" placeholder="Search client " class="input form-control">
                              <span class="input-group-btn">
                              <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
<<<<<<< HEAD
                              <input type="hidden" value="" id="category_seach_product">
                            </span>
=======
                              </span>
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
                           </div>
                           <div class="clients-list">
                              <ul class="nav nav-tabs tab-border-top-danger" id="content_category">


                              </ul>
                              <div class="tab-content" >

                                 <div id="tab-category" class="tab-pane active" >
                                    <div class="full-height-scroll">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-hover">
                                             <tbody id="content-product">

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
                     <div class="tab-content" id="detail-product">

                     </div>
                  </div>
               </div>
            </div>
         </div>

    </div>
<<<<<<< HEAD

    <meta name="csrf-token-disable-product" content="{{ csrf_token() }}" />
=======
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
    <meta name="csrf-token-delete-extra" content="{{ csrf_token() }}" />
    <meta name="csrf-token-product-detail" content="{{ csrf_token() }}" />
    <meta name="csrf-token-product-seach" content="{{ csrf_token() }}" />
    <meta name="csrf-token-seach-auto" content="{{ csrf_token() }}" />
    <div id="add_product_Modal" class="modal fade">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Thêm sản phẩm</h4>
          </div>
          <div class="modal-body">

            <meta name="csrf-token-category" content="{{ csrf_token() }}" />
           <form id="insert_product_form" enctype="multipart/form-data">
            {{ csrf_field() }}

<<<<<<< HEAD
            <label>Tên sản phẩm</label>
=======
            <label>Tên danh mục</label>
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
            <input type="text" name="product_title" id="product_title" class="form-control" />
            <br/>
            <label>Danh mục</label>
            <select name="id_category" id="id_category">
                <option value=""></option>
            </select>
            <br/>
            <br/>
            <label>Giá</label>
            <input type="number" name="product_sales_price" id="product_sales_price" class="form-control" />

            <br/>
            <label>Mô tả</label>
            <textarea name="product_description" id="product_description" class="form-control"></textarea>
            <br/>
            <br/>
            <label>Code</label>
            <input type="text" name="product_code" id="product_code" class="form-control" />

            <br/>
            <label>Đơn vị tính</label>
            <select name="id_unit" id="id_unit">

            </select>

            <br/>

            <br/>
            <label>Điểm tích lủy</label>
            <input type="text" name="product_point" id="product_point" class="form-control" />
            <br/>
            <label><label>Hình ảnh</label>
                <input type="file" id="product_img" onChange="return fileValidation()" name="select_file" class="form-control" multiple="multiple"  placeholder="Hình ảnh">
            </label>
            <br/>
            <span id="upload_ed_image"></span>
            <br/>
            <br/>
            <input type="submit" name="insert" id="insert_product" value="Thêm" class="btn btn-success" />
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" id="close_modol_insert" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
         </div>
        </div>
       </div>


<<<<<<< HEAD


       <div id="edit_product_Modal" class="modal fade">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Sửa sản phẩm</h4>
          </div>
          <div class="modal-body">

           <form id="edit_product_form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="0" name="check_upload_image" id="check_upload_image">
            <input type="hidden" value="" id="id_product" name="id_product">
            <label>Tên sản phẩm</label>
            <input type="text" name="product_title" id="eproduct_title" class="form-control" />
            <br/>
            <label>Danh mục</label>
            <select name="id_category" id="eid_category">
                <option value=""></option>
            </select>
            <br/>
            <br/>
            <label>Giá</label>
            <input type="number" name="product_sales_price" id="eproduct_sales_price" class="form-control" />

            <br/>
            <label>Mô tả</label>
            <textarea name="product_description" id="eproduct_description" class="form-control"></textarea>
            <br/>
            <br/>
            <label>Code</label>
            <input type="text" name="product_code" id="eproduct_code" class="form-control" />

            <br/>
            <label>Đơn vị tính</label>
            <select name="id_unit" id="eid_unit">

            </select>

            <br/>

            <br/>
            <label>Điểm tích lủy</label>
            <input type="text" name="product_point" id="eproduct_point" class="form-control" />
            <br/>
            <label><label>Hình ảnh</label>
                <input type="file" id="eproduct_img" onChange="return fileValidation2()" name="select_file" class="form-control" multiple="multiple"  placeholder="Hình ảnh">
            </label>
            <br/>
            <span id="eupload_ed_image"></span>
            <br/>
            <br/>
            <input type="submit" name="insert" id="edit_product" value="Cập nhật" class="btn btn-success" />
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" id="close_modol_edit" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
         </div>
        </div>
       </div>








=======
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
       <div id="add_product_extra_Modal" class="modal fade">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Thêm món ăn kèm</h4>
          </div>
          <div class="modal-body">

            <meta name="csrf-token-extra" content="{{ csrf_token() }}" />
           <form id="insert_product_extra_form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>Món ăn kèm</label>
            <select id="list_extra">

            </select>
            <div id="extra_content"></div>
            <br/>
            <input type="submit" name="insert" id="insert_product_extra" value="Thêm" class="btn btn-success" />
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" id="close_modol_insert" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
         </div>
        </div>
       </div>
    </body>
    <script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/main/admin_product_product.js') }}"></script>
@endsection

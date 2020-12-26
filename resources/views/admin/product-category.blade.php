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
                           <h2>Danh mục sản phẩm</h2>
                           <div class="input-group">
                              <input type="text" placeholder="Search client " class="input form-control">
                              <span class="input-group-btn">
                              <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                              </span>
                           </div>
                           <div class="clients-list">
                              <ul class="nav nav-tabs tab-border-top-danger">
                                 <li class="active"><a data-toggle="tab" href="#tab-category"><i class="fa fa-user"></i>Danh mục sản phẩm</a></li>
                                 <li class="active"> <button type="button" name="x" id="x" data-toggle="modal" data-target="#add_category_Modal" class="btn btn-warning">Add</button></li>
                              </ul>
                              <div class="tab-content" >

                                 <div id="tab-category" class="tab-pane active" >
                                    <div class="full-height-scroll">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-hover">
                                             <tbody id="content-category">

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
    <div id="add_category_Modal" class="modal fade">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Thêm danh mục sản phẩm</h4>
          </div>
          <div class="modal-body">
           <form id="insert_category_form" enctype="multipart/form-data">
            {{ csrf_field() }}

            <label>Tên danh mục</label>
            <input type="text" name="category_title" id="category_title" class="form-control" />
            <br/>
            <label><label>Icon danh mục</label>
                <input type="file" id="category_icon" onChange="return fileValidation()" name="select_file" class="form-control" multiple="multiple"  placeholder="Hình ảnh">
                </label>
            <br/>
                <span id="upload_ed_image"></span>
            <br/>
            <br/>
            <input type="submit" name="insert" id="insert_category" value="Thêm" class="btn btn-success" />
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
    <script src="{{ asset('backend/js/main/admin_product_category.js') }}"></script>
@endsection

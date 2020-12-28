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
            <div class="col-sm-6">
               <div class="inqbox">
                  <div class="inqbox-content">
                           <span class="text-muted small pull-right"><i class="fa fa-clock-o"></i> </span>
                           <h2>Danh sách tầng</h2>
                           <div class="clients-list">
                              <ul class="nav nav-tabs tab-border-top-danger">
                                 <li class="active"><a data-toggle="tab" href="#tab-category"><i class="fa fa-user"></i>Tầng</a></li>
                                 <li class="active"> <button type="button" name="x" id="x" data-toggle="modal" data-target="#add_floor_Modal" class="btn btn-warning">Add</button></li>
                              </ul>
                              <div class="tab-content" >

                                 <div id="tab-category" class="tab-pane active" >
                                    <div class="full-height-scroll">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-hover">
                                             <tbody id="content-floor">

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



            <meta name="csrf-token-show-floor-table" content="{{ csrf_token() }}" />
            <div class="col-sm-6">
                <div class="inqbox">
                   <div class="inqbox-content">
                            <span class="text-muted small pull-right"><i class="fa fa-clock-o"></i></span>
                            <h2>Danh sách Bàn</h2>
                            <div class="clients-list">
                               <ul class="nav nav-tabs tab-border-top-danger" id="select-all" >
                               </ul>
                               <ul class="nav nav-tabs tab-border-top-danger" id="select-floor" >
                            </ul>

                               <div class="tab-content" >

                                  <div id="tab-category" class="tab-pane active" >
                                     <div class="full-height-scroll">
                                        <div class="table-responsive">
                                           <table class="table table-striped table-hover">
                                              <tbody id="content-table">

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
         </div>

    </div>
    <div id="add_floor_Modal" class="modal fade">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Thêm tầng</h4>
          </div>
          <div class="modal-body">
           <form id="insert_floor_form" enctype="multipart/form-data">
            {{ csrf_field() }}

            <label>Tên tầng</label>
            <input type="text" name="floor_title" id="floor_title" class="form-control" />
            <br/>
            <label>Thứ tự ưu tiên</label>
            <input type="number" name="floor_priority" id="floor_priority" class="form-control" />
            <br/>
            <input type="submit" name="insert" id="insert_floor" value="Thêm" class="btn btn-success" />
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" id="close_modol_insert_floor" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
         </div>
        </div>
       </div>


       <div id="edit_floor_Modal" class="modal fade">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Thêm tầng</h4>
          </div>
          <div class="modal-body">
           <form id="edit_floor_form">
            {{ csrf_field() }}
            <input type="hidden" id="id_floor" value=""/>
            <label>Tên tầng</label>
            <input type="text" name="floor_title" id="efloor_title" class="form-control" />
            <br/>
            <label>Thứ tự ưu tiên</label>
            <input type="number" name="floor_priority" id="efloor_priority" class="form-control" />
            <br/>
            <input type="submit" name="edit" id="edit_floor" value="Cập nhật" class="btn btn-success" />
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" id="close_modol_edit_floor" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
         </div>
        </div>
       </div>
       <meta name="csrf-token-delete-table" content="{{ csrf_token() }}" />
       <meta name="csrf-token-delete-floor" content="{{ csrf_token() }}" />
    <div id="add_table_Modal" class="modal fade">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Thêm Bàn</h4>
          </div>
          <div class="modal-body">
           <form id="insert_table_form">

            {{ csrf_field() }}
            <input type="hidden" id="id_floor_table" name="id_floor" value=""/>
            <input type="hidden" id="id_floor" value=""/>
            <label>Tên bàn</label>
            <input type="text" name="table_title" id="table_title" class="form-control" />
            <br/>
            <input type="submit" name="edit-table" id="insert_table" value="Thêm" class="btn btn-success" />
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" id="close_modol_insert_table" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
         </div>
        </div>
       </div>

       <div id="edit_table_Modal" class="modal fade">
        <div class="modal-dialog">
         <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Cập nhật bàn</h4>
          </div>
          <div class="modal-body">

           <form id="edit_table_form">

            {{ csrf_field() }}
            <input type="hidden" id="id_table" name="id_table" value=""/>
            <label>Tên bàn</label>
            <input type="text" name="table_title" id="etable_title" class="form-control" />
            <br/>
            <input type="submit" name="edit-table" id="edit_table" value="Cập nhật" class="btn btn-success" />
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" id="close_modol_edit_table" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
         </div>
        </div>
       </div>

    </body>
    <script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/main/admin_floor_table.js') }}"></script>
@endsection

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
                           <h2>Agent</h2>
                           <div class="input-group">
                              <input type="text" placeholder="Search client " class="input form-control">
                              <span class="input-group-btn">
                              <button type="button" class="btn btn btn-primary" onclick="khanh2()"> <i class="fa fa-search"></i> Search</button>
                              </span>
                           </div>
                           <div class="clients-list">
                              <ul class="nav nav-tabs tab-border-top-danger">
                                 <span class="pull-right small text-muted">1406 Elements</span>
                                 <li class="active"><a data-toggle="tab" href="#tab-store"><i class="fa fa-user"></i> Store</a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-account"><i class="fa fa-briefcase"></i> Account</a></li>
                              </ul>
                              <div class="tab-content" >

                                 <div id="tab-store" class="tab-pane active" onclick="show_detail_store()">
                                    <div class="full-height-scroll">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-hover">
                                             <tbody id="content-store">
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="tab-account" class="tab-pane active" onclick="show_detail_store()">
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
                     <div class="tab-content" id="detail-store">

                     </div>
                  </div>
               </div>
            </div>
         </div>

    </div>
    </body>
    <script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/main/admin_store.js') }}"></script>
@endsection

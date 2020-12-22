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
                                 <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Contacts</a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-briefcase"></i> Companies</a></li>
                              </ul>
                              <div class="tab-content">

                                 <div id="tab-1" class="tab-pane active" onclick="addd()">
                                    <div class="full-height-scroll">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-hover">
                                             <tbody>
                                                <tr>
                                                   <td class="client-avatar"><img alt="image" src="{{asset('backend/img/ronaldo.jpg')}}"> </td>
                                                   <td><a data-toggle="tab" href="#contact-1" class="client-link">Anthony Jackson</a></td>
                                                   <td> Tellus Institute</td>
                                                   <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                   <td> gravida@rbisit.com</td>
                                                   <td class="client-status"><button class="label label-primary" onclick="khanh()">Active</button></td>
                                                </tr>
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
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script type="text/javascript">
       function addd(argument) {
         var output=`<div id="contact-1" class="tab-pane active">
                           
                                 <div class="row m-b-lg">
                                    <div class="col-lg-4 text-center">
                                       <h2>Nicki Smith</h2>
                                       <div class="m-b-sm">
                                          <img alt="image" class="img-circle" src="{{asset('backend/img/ronaldo.jpg')}}"
                                             style="width: 62px">
                                       </div>
                                    </div>
                                    <div class="col-lg-8">
                                       <strong>
                                       About me
                                       </strong>
                                       <p>
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua.
                                       </p>
                                       <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                          class="fa fa-envelope"></i> Send Message
                                       </button>
                                    </div>
                                 </div>
                                 <div class="client-detail">
                                    <div class="full-height-scroll">
                                       <strong>Last activity</strong>
                                       <ul class="list-group clear-list">
                                          <li class="list-group-item">
                                             <span class="pull-right"> 12:00 am </span>
                                             Write a letter to Sandra
                                          </li>
                                       </ul>
                                       <strong>Notes</strong>
                                       <p>
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua.
                                       </p>
                                       <hr/>
                                       <strong>Timeline activity</strong>
                                    </div>
                                 </div>
                        </div>`

          $('#detail-store').html(output  )     
       }
       function khanh()
       {
         console.log("âfafafafafaff");
       }
       function khanh2()
       {
         console.log("222222222222");
       }
    </script>


@endsection

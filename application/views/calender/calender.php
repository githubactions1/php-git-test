

<link href="assets/libs/@fullcalendar/core/main.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/@fullcalendar/daygrid/main.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/@fullcalendar/bootstrap/main.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/@fullcalendar/timegrid/main.min.css" rel="stylesheet" type="text/css" />
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-6">
            <div class="page-title-box">
              <h4>Calendar</h4>
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Calendar</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- end page title -->
        
        <div class="row mb-4">
          <div class="col-xl-4">
            <div class="card drag">
              <div class="card-body d-grid">
                <div class="card-body">
                  <h5 class="text-center pb-3">Task</h5>
                  <div class="row">
                    <div class="col-sm-7">
                      <form>
                        <input type="search" class="form-control form-control-sm" placeholder="Search Tasks" aria-controls="">
                      </form>
                    </div>
                    <div class="col-sm-5">
                      <button type="button" class="btn btn-light"><i class="mdi mdi-filter"></i> Filter</button>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary btn-block" id="btn-new-event"><i
                                class="mdi mdi-plus-circle-outline"></i> Create New Task</button>
                <div id="external-events"> <br>
                  <p class="text-muted">Drag and drop your event or click in the calendar</p>
                  <div class="external-event fc-event bg-success" data-class="bg-success">
                    <div class="col-xl-12 col-sm-6">
                      <div class="card drag">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-7">
                              <div class="row">
                                <div class="col-md-3"> <span class="badge rounded-pill bg-success servi">S1</span> </div>
                                <div class="col-md-9"> <span class="text-dark">Service Number</span>
                                  <h6 class="mb-4 text-dark"><a href="">123456789</a></h6>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="text-dark"> <span class="ordr">Order Number</span>
                                <p class="fsm text-dark">STT2013922</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <p class="text-dark">Type <span class="fsm">CS-LINK Down</span></p>
                            <p class="text-dark">Organization Unit <span class="fsm">FSM_GU</span></p>
                          </div>
                          <div class="col-md-12 bg-light">
                            <div class="assign">
                              <p>Assigned to <span class="fsm">Ikbal Hussan Choudhury</span></p>
                              <p>Action</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="external-event fc-event bg-info" data-class="bg-info">
                    <div class="col-xl-12 col-sm-6">
                      <div class="card drag">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-7">
                              <div class="row">
                                <div class="col-md-3"> <span class="badge rounded-pill bg-primary servi">S1</span> </div>
                                <div class="col-md-9"> <span class="text-dark">Service Number</span>
                                  <h6 class="mb-4 text-dark"><a href="">123456789</a></h6>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="text-dark"> <span class="ordr">Order Number</span>
                                <p class="fsm text-dark">STT2013922</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <p class="text-dark">Type <span class="fsm">CS-LINK Down</span></p>
                            <p class="text-dark">Organization Unit <span class="fsm">FSM_GU</span></p>
                          </div>
                          <div class="col-md-12 bg-light">
                            <div class="assign">
                              <p>Assigned to <span class="fsm">Ikbal Hussan Choudhury</span></p>
                              <p>Action</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="external-event fc-event bg-warning" data-class="bg-warning">
                    <div class="col-xl-12 col-sm-6">
                      <div class="card drag">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-7">
                              <div class="row">
                                <div class="col-md-3"> <span class="badge rounded-pill bg-orange servi">S1</span> </div>
                                <div class="col-md-9"> <span class="text-dark">Service Number</span>
                                  <h6 class="mb-4 text-dark"><a href="">123456789</a></h6>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="text-dark"> <span class="ordr">Order Number</span>
                                <p class="fsm text-dark">STT2013922</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <p class="text-dark">Type <span class="fsm">CS-LINK Down</span></p>
                            <p class="text-dark">Organization Unit <span class="fsm">FSM_GU</span></p>
                          </div>
                          <div class="col-md-12 bg-light">
                            <div class="assign">
                              <p>Assigned to <span class="fsm">Ikbal Hussan Choudhury</span></p>
                              <p>Action</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="external-event fc-event bg-danger" data-class="bg-danger"> <div class="col-xl-12 col-sm-6">
                      <div class="card drag">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-7">
                              <div class="row">
                                <div class="col-md-3"> <span class="badge rounded-pill bg-success servi">S1</span> </div>
                                <div class="col-md-9"> <span class="text-dark">Service Number</span>
                                  <h6 class="mb-4 text-dark"><a href="">123456789</a></h6>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="text-dark"> <span class="ordr">Order Number</span>
                                <p class="fsm text-dark">STT2013922</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <p class="text-dark">Type <span class="fsm">CS-LINK Down</span></p>
                            <p class="text-dark">Organization Unit <span class="fsm">FSM_GU</span></p>
                          </div>
                          <div class="col-md-12 bg-light">
                            <div class="assign">
                              <p>Assigned to <span class="fsm">Ikbal Hussan Choudhury</span></p>
                              <p>Action</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> </div>
                </div>
                <!--
                <div class="mt-5">
                  <h5 class="font-size-14 mb-4">Recent activity :</h5>
                  <ul class="list-unstyled activity-feed ml-1">
                    <li class="feed-item">
                      <div class="feed-item-list">
                        <div>
                          <div class="date">15 Jul</div>
                          <p class="activity-text mb-0">Responded to need “Volunteer Activities”</p>
                        </div>
                      </div>
                    </li>
                    <li class="feed-item">
                      <div class="feed-item-list">
                        <div>
                          <div class="date">14 Jul</div>
                          <p class="activity-text mb-0">neque porro quisquam est <a href=""
                                                    class="text-success">@Christi</a> dolorem ipsum quia dolor sit amet </p>
                        </div>
                      </div>
                    </li>
                    <li class="feed-item">
                      <div class="feed-item-list">
                        <div>
                          <div class="date">14 Jul</div>
                          <p class="activity-text mb-0">Sed ut perspiciatis unde omnis iste natus
                            error sit “Volunteer Activities”</p>
                        </div>
                      </div>
                    </li>
                    <li class="feed-item">
                      <div class="feed-item-list">
                        <div>
                          <div class="date">13 Jul</div>
                          <p class="activity-text mb-0">Responded to need “Volunteer Activities”</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
--> 
              </div>
            </div>
          </div>
          <!-- end col-->
          
          <div class="col-xl-8">
            <div class="card mt-4 mt-xl-0 mb-0">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3 pb-3">
                    <form>
                      <input type="search" class="form-control form-control-sm" placeholder="Search Team Members" aria-controls="">
                    </form>
                  </div>
                </div>
                <div id="calendar"></div>
              </div>
            </div>
          </div>
          <!-- end col --> 
          
        </div>
        <!-- end row --> 
        
    
      </div>
      <!-- container-fluid --> 
    </div>
    <!-- End Page-content --> 
  </div>
  
    <div class="modal fade" id="event-modal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header py-3 px-4 border-bottom-0">
                <h5 class="modal-title" id="modal-title">Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
              </div>
              <div class="modal-body p-4">
                <form class="needs-validation" name="event-form" id="form-event" novalidate>
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-3">
                        <label class="form-label">Task Name</label>
                        <input class="form-control" placeholder="Insert Event Name" type="text"
                                            name="title" id="event-title" required value="" />
                        <div class="invalid-feedback">Please provide a valid Task name</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-control custom-select" name="category" id="event-category">
                          <option selected> --Selected-- </option>
                          <option value="bg-danger">Danger</option>
                          <option value="bg-success">Success</option>
                          <option value="bg-primary">Primary</option>
                          <option value="bg-info">Info</option>
                          <option value="bg-dark">Dark</option>
                          <option value="bg-warning">Warning</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid Task category</div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-6">
                      <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                    </div>
                    <div class="col-6 text-end">
                      <button type="button" class="btn btn-light me-1"
                                        data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- end modal-content--> 
          </div>
          <!-- end modal dialog--> 
        </div>
  <div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" name="event-form" id="form-event" novalidate>
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Tak Name</label>
                  <input class="form-control" placeholder="Insert Event Name"
                                                            type="text" name="title" id="event-title" required value="" />
                  <div class="invalid-feedback">Please provide a valid Tak name</div>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Category</label>
                  <select class="form-control custom-select" name="category"
                                                            id="event-category">
                    <option selected> --Select-- </option>
                    <option value="bg-danger">Danger</option>
                    <option value="bg-success">Success</option>
                    <option value="bg-primary">Primary</option>
                    <option value="bg-info">Info</option>
                    <option value="bg-dark">Dark</option>
                    <option value="bg-warning">Warning</option>
                  </select>
                  <div class="invalid-feedback">Please select a valid Task category</div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-6"> 
                <!--                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>--> 
              </div>
              <div class="col-6 text-end"> 
                <!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
                <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
</div>



<script src="<?php echo base_url();?>assets/libs/moment/min/moment.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/jquery-ui-dist/jquery-ui.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/@fullcalendar/core/main.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/@fullcalendar/bootstrap/main.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/@fullcalendar/daygrid/main.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/@fullcalendar/timegrid/main.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/@fullcalendar/interaction/main.min.js"></script> 

<!-- Calendar init --> 
<script src="<?php echo base_url();?>assets/js/pages/calendar.init.js"></script>

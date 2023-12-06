
<style>

#load_div {
  position: fixed;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 50px;
  height: 50px;
  margin: 36px 0 0 36px;
  border: 8px solid #96be31;
  border-radius: 50%;
  border-top: 8px solid #f3f3f3;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

.bg-load{   
 background-color: rgb(0 0 0 / 48%);
    opacity: 0.7;
}
</style>

        <div id="preview_data">
	 
  <div class="main-content-scroll-dash">
    <div class="page-content">
			 <div class="row" id="">
        <div class="col-md-3 col-sm-12">
          <div id="sidebar">
					 <div class="panel">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-sm-8 col-xs-8">
                    <form>
                      <input type="text" id="searchInput" onkeyup="searchNames()" placeholder="Search for names..." class="form-control form-control-md">
                    </form>
                  </div>
                  <!--<div class="col-md-2 col-sm-4 col-xs-4">
                    <button type="button" class="btn btn-default pull-right"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-md1"><i class="mdi mdi-filter"></i></button>
                  </div>-->
                </div>
                <div class="assign-btn">
                  <div class="row bg-info">
                    <div class="col-md-8 col-sm-6">
                      <h5 class="loc text-white"><i class="fa fa-book" aria-hidden="true"></i> <?php echo $moitorlist[0]->unassigned_open_task;?> Unassigned Tasks</h5>
                    </div>
                    <div class="col-md-4 col-sm-6 mt-2">
                      <button type="button" class="btn btn-success pull-right"><span class="text-white">Assign</span></button>
                    </div>
                  </div>
                </div>
                <ul id="peopleList">
                </ul>
                <div class="list-footer">
                  <div class="page-size-select"> Show
                    <select id="page-size">
                      <option value="5">5</option>
                      <option value="10" selected="selected">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                  </div>
                  <span class="page-nav">
                  <button class="first page-button" title="First" disabled="disabled"> &nbsp;</button>
                  <button class="previous page-button" title="Previous" disabled="disabled">&nbsp;</button>
                  <span class="page-button-container">
                  <button class="mediumButton">1</button>
                  <button class="page-button">2</button>
                  <button class="page-button">3</button>
                  </span>
                  <button class="next page-button" title="Next"> &nbsp;</button>
                  <button class="last page-button" title="Last"> &nbsp;</button>
                  </span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-12">
        </div>
        </div>
        </div>
        </div>
				 
			<div  id="load_div" > </div>
		</div>

<script>

  setTimeout(function(){	
		$.ajax({
		type: "post",
		url:"<?php echo base_url()?>Monitor/monitor_ajax",
		data:$("#date_filters_form").serialize(),
		success:function(result)
		{		
		var jsondata=JSON.parse(result); 

		$('#preview_data').html(jsondata['dashboard_ajax_div']);
		}
		});	
  
  },6000);
  
  
  
</script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/combo.css">


<div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-8">
            <div class="page-title-box">
              <h4><?php echo $page_name;?> Bulk Members Import </h4>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="page-title-box">
              <ol class="breadcrumb add-rgt">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);"> Bulk Members Import</a></li>
              </ol>
            </div>
          </div>
        </div>
       
	   
	   
	   
	   
	     <div class="row" id="reports_search_div" >
          <div class="col-xl-8">
            <div class="card">
              <div class="accordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Upload </button>
                  </h2>
			<form action="<?php echo base_url()?>Bulk_emp_import/bulk_emp_import_ajax" method="post"  enctype="multipart/form-data" >

                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="mb-3 row">
                        <div class="col-md-12"> 
                          <a  href="<?php echo base_url()?>assets/images/bulk_import/sample-members-data.csv"><h4 class="set_report text-center"> Click Here  <i class="fa fa-download"></i></h4> &nbsp  &nbsp  </a>
                          <div class="form-group typebtn"> 
								<div class="row">
						        <div class="col-md-3 col-sm-12"></div>
            					<div class="col-md-2 col-sm-12 text-right">
            						<label>Choose File</label>
            					</div>
            					<div class="col-md-7 col-sm-12">
            						<input type="file" accept=".csv" id="import_excel" name="import_excel" value="" required>
            						<p><b>Note</b> : <a  href="<?php echo base_url()?>assets/images/bulk_import/sample-members-data.csv">Click Here </a> to Download Import customer file Format</p>
            					</div>

									<div class="col-md-12 col-sm-12 text-center" style="margin-top:10px;">
									<button type="button" id="commonupdate" onclick="return ValidateUpload();" name="commonupdate" class="btn btn-danger">Check Members List</button>
									<input type="submit" id="submit" name="submit" onclick="return confirmDialog();" class="btn btn-success waves-effect waves-light" value="Upload Data">
									</div>
							</div>
                          </div>
                        </div>
                      </div>
                      <!-- end row -->
                    
                      <!-- end row -->
                      
                    </div>
                  </div>
                  </form>
                </div>
				
				<div style="color:RED;font-size:20px;text-align:center" >
						<span id="msg_show" ></span>
						</div>
				
				<div style="color:RED;font-size:20px;text-align:center" >
						<?php echo $this->session->flashdata('success');?>
						<?php echo $this->session->flashdata('error');?>
						</div>
				
              </div>
            </div>
          </div>
          
          <!-- end col --> 
        </div>
	   
	   
	   
    </div>
    <!-- End Page-content --> 
    
  </div>
  </div>
  
  <script>
function confirmDialog() {
  var x=confirm("Are you sure to Continue upload ?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
</script>



<script>
function ValidateUpload(){
		var Upload_file = document.getElementById('import_excel');
		var myfile = Upload_file.value;
		if (myfile.indexOf("csv") > 0) {
			// alert('Valid Format');
			// var program_id2 = $("#import_excel").val();
			// alert(program_id2);
			var file_data = $('#import_excel').prop('files')[0];   
			var form_data = new FormData();                  
			form_data.append('file', file_data);
			// alert(form_data);    
			$.ajax({
				url: "<?php echo base_url();?>Bulk_emp_import/check_bulk_emp_upload",
				type: "POST",
				// dataType: "json",
				dataType: 'text',
				// data: {program_id2: program_id2},
				cache: false,
                contentType: false,
                processData: false,
                data: form_data,
				// dataType: "html",
					success: function(res) {
						alert(res);
						$("#msg_show").html(res);
						if(res!=0)
						{
							return false;
						}
					}
				});
		}
		else {
			alert('Invalid Format');
			myfile.value = '';
		}
		return false;
	}
</script>


<div class="login_form"> 
         
            <div class="form-group">
             	 <div class="table-responsive" style="border:1px solid #cccccc;border-radius:5px; padding:15px; ">
			  <table class="table">
			  <h3>Generator</h3>
			 	 <a href="" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" style="float:left!important;background:transparent;border:none;color:#428bca;">
			 	 	<span class="glyphicon glyphicon-sort-by-attributes">
			 	 		
			 	 	</span> Generate
			 	 </a>
					  
					<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content" id="generateFormWrapper" style="padding:50px;background:transparent;border:none;">
					    <div id = "generateFormWrapper">
					    <form role="form" id="generateForm"  action="<?php echo base_url() ?>code/generate" method="get">
						  <div class="form-group">
						    <label for="exampleInputValueofCode">Value of Codes</label>
						    <input type="text" class="form-control" id="count" name="count" placeholder="Enter value here">
						    <input type="submit" value="Generate" style="border:none;float:right;background:#428bca; margin:10px;">
						  </div><!--ends form-group-->
					  </form><!--ends form-->
				   </div>

				    </div><!--ends modal-content-->
				  </div><!--ends modal-dialog-->
				</div>
				

				<tr style="background:#428bca;">
					<th>#</th>
					<th>Code</th>
					<th>Date</th>
					<th>Status</th>
				</tr>
				<?php $counter = 1; ?>
				<?php foreach($codes as $code): ?>
				<tr>
					<td><?php echo $counter; ?></td>
					<td><?php echo $code->code; ?></td>
					<td><?php echo $code->createdOn; ?></td>
					<td><?php echo $code->status; ?></td>
				</tr>	
				<?php $counter++; ?>
			<?php endforeach; ?>
			  </table>
			   <center>
				  	<ul class="pagination">

					 	 <p><?php echo $links; ?></p>

					</ul>
				</center>
			</div>
         
        </div><!--ends login_form-->

<script src="<?php echo base_url() ?>public/js/jquery.form.js"></script> 
<script>


 $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#generateForm').ajaxForm(function() { 
            	 $('#generateFormWrapper').hide();
            	 //$('#finalizeFormWrapper').show();
                    ajax_download('<?php echo base_url() ?>code/printpreview', {'para1': 1, 'para2': 2}, 'dataname');

            }); 
        }); 



function ajax_download(url, data, input_name) {
    var $iframe,
        iframe_doc,
        iframe_html;

    if (($iframe = $('#download_iframe')).length === 0) {
        $iframe = $("<iframe id='download_iframe'" +
                    " style='display: none' src='about:blank'></iframe>"
                   ).appendTo("body");
    }

    iframe_doc = $iframe[0].contentWindow || $iframe[0].contentDocument;
    if (iframe_doc.document) {
        iframe_doc = iframe_doc.document;
    }

    iframe_html = "<html><head></head><body><form method='POST' action='" +
                  url +"'>" +
                  "<input type=hidden name='" + input_name + "' value='" +
                  JSON.stringify(data) +"'/></form>" +
                  "</body></html>";

    iframe_doc.open();
    iframe_doc.write(iframe_html);
    $(iframe_doc).find('form').submit();
}
</script>

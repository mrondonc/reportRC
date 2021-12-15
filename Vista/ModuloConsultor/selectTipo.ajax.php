<?php
	
	$cliente_partner=$_POST["cliente_partner"];

	if ($cliente_partner == 1) {
	    echo  
	    		'<div class="row">
				<div class="col-md-10">
					<div class="form-group">
					<label>1. Fecha de Reporte </label>
					<div class="form-group">
					<label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
					<div class="form-group">
					<input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="">
					</div>
					</div>
					</div>
				</div>
			</div>';
	 }else if ($cliente_partner == 2) {
	    echo '
    				<h4>Article Information</h4>
                    <div class="margin_between">
                        <div class="input_box space_between">
                            <label>Publication Date<span>*</span></label>
                            <input type="date" id="publicationDate"name="publicationDate">
                        </div>
                        <div class="input_box space_between">
                            <label>SSN <span>*</span></label>
                           <input type="text" id="ssn" name="ssn">
                       </div>
                    </div>';
	 }else if ($cliente_partner == 3) {
	    echo 
          '<h4>Presentation Information</h4>
            <div class="margin_between">
            <div class="input_box space_between">
                <label>Publication Date<span>*</span></label>
                <input type="date" id="publicationDate" name="publicationDate">
            </div>
            <div class="input_box space_between">
    	            <label>ISBN <span>*</span></label>
     	           <input type="text" id="isbn" name="isbn">
	            </div>
            </div>
            <div class="input_box">
   	 	       <label>Congress Name <span>*</span></label>
   		        <input type="text" id="congressName" name="congressName">
            </div>';
	 }

?>
<div id="tab2" class="tab-pane fade" style="height:1920px;background-color: #fff; padding:15px;">

    <div class="center-block text-center" style="border:1px solid #e6e6e6;padding-top:5px;padding-bottom:5px;">
		<label class="radio-inline" style="text-decoration: underline;">
            <input id="securityHome" type="radio" name="securityradio" checked>HOME
        </label>
        <label class="radio-inline" style="text-decoration: underline;">
            <input id="securityLog" type="radio" name="securityradio">LOGS
        </label>
    </div>

	<br>
    <section id="securityHomeSection">
	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Emergency Summary</h3>
	        <p style="text-align:justify;">These Emergency requests are grouped on the date they were originated on. </p>
	    </div>
		<br>
	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="Emergencysummarytable">
	            <thead>
	                <tr style="background-color: #5d99c6; color:#fff">
	                    <th>Date</th>
	                    <th># Of Emergency Requests Handled</th>
	                    <th># Of Emergency Requests Completed</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>

		<br>
		<hr>

	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Open Emergency Requests</h3>
	        <p style="text-align:justify;">These are the Emergency requests that are not handled as of now. </p>
	    </div>
		<br>
	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="openEmergencytable">
	            <thead>
	                <tr style="background-color: #5d99c6; color:#fff">
	                    <th>Date</th>
	                    <th>Category</th>
	                    <th>Responder's Name</th>
	                    <th>Status</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>
    </section>

    <section id="securityLogsSection" style="display: none">
	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Emergency Logs</h3>
	        <p style="text-align:justify;">These Emergency alerts are pulled chronologically </p>
	    </div>
		<br>
	    <div class="table table-responsive">
	        <table class="table table-bordered table-hovered" id="Emergencylogtable" style="table-layout:auto;word-break:normal">
	            <thead>
	                <tr style="background-color: #5d99c6; color:#fff">
	                    <!-- <th>Emergency #</th> -->
	                    <th>Date</th>
	                    <th>Name</th>
						<th>Gender</th>
						<th>Passport</th>
						<th>Bracelet</th>
						<th>Group</th>
						<th>Hamla</th>
						<th>E-POC</th>
						<th>E-CON</th>
	                    <!-- <th>Address</th> -->
	                    <th>Type</th>
	                    <th>Responder</th>
	                    <th>ClosureBy</th>
	                    <th>ClosureDate</th>
	                    <th>Status</th>
	                    <th style="display:none">Images</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>
    </section>

</div>
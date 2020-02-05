<div id="tab4" class="tab-pane fade" style="height:1920px;background-color: #EEEEEE;padding:15px;">

    <div class="center-block text-center" style="border:1px solid #333;padding-top:5px;padding-bottom:5px;">
		<label class="radio-inline" style="text-decoration: underline;">
            <input id="servicesHome" type="radio" name="servicesradio" checked>HOME
        </label>
        <label class="radio-inline" style="text-decoration: underline;">
            <input id="servicesLog" type="radio" name="servicesradio">LOGS
        </label>
    </div>

    <section id="servicesHomeSection">
	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Services Summary</h3>
	        <p style="text-align:justify;">These services are grouped on the date they were originated on. </p>
	    </div>

	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="servicessummarytable">
	            <thead>
	                <tr style="background-color: #333; color:#fff">
	                    <th>Date</th>
	                    <th># Of Services Requested</th>
	                    <th># Of Service Requests Completed</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>

	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Open Services</h3>
	        <p style="text-align:justify;">These are the services that are not handled as of now. </p>
	    </div>

	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="openservicestable">
	            <thead>
	                <tr style="background-color: #333; color:#fff">
	                    <th>Date</th>
	                    <th>Category</th>
	                    <th>Title</th>
	                    <th>Message</th>
	                    <th>Status</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>
    </section>

    <section id="servicesLogsSection" style="display: none">
	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Services Logs</h3>
	        <p style="text-align:justify;">These services are pulled chronologically </p>
	    </div>

	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="serviceslogtable">
	            <thead>
	                <tr style="background-color: #333; color:#fff">
	                    <th>Service #</th>
	                    <th>Service Date</th>
	                    <th>Name</th>
	                    <th>Address</th>
	                    <th>Service Type</th>
	                    <th>Status</th>
	                    <th>Closure Date</th>
	                    <th>Resource</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>
    </section>
</div>
<div id="tab3" class="tab-pane fade" style="height:1920px;background-color: #fff;padding:15px;">
    

    <div class="center-block text-center" style="border:1px solid #e6e6e6;padding-top:5px;padding-bottom:5px;">
		<label class="radio-inline" style="text-decoration: underline;">
            <input id="complaintsHome" type="radio" name="complaintsradio" checked>HOME
        </label>
        <label class="radio-inline" style="text-decoration: underline;">
            <input id="complaintsLog" type="radio" name="complaintsradio">LOGS
        </label>
    </div>

    <section id="complaintsHomeSection">
	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Feedbacks Summary</h3>
	        <p style="text-align:justify;">These complaints are grouped on the date they were originated on. </p>
	    </div>
		<br>
	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="complaintsummarytable">
	            <thead>
	                <tr style="background-color: #5d99c6; color:#fff">
	                    <th>Date</th>
	                    <th># Of Feedbacks Handled</th>
	                    <th># Of Feedbacks Completed</th>
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
	        <h3 style="margin: 0px;padding:0px;">Open Feedbacks</h3>
	        <p style="text-align:justify;">These are the feedbacks that are not handled as of now. </p>
	    </div>
		<br>
	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="opencomplaintstable">
	            <thead>
	                <tr style="background-color: #5d99c6; color:#fff">
	                    <th>Date</th>
						<th>Hamla</th>
						<th>Group</th>
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

    <section id="complaintsLogsSection" style="display: none">
	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Feedback Logs</h3>
	        <p style="text-align:justify;">These feedbacks are pulled chronologically </p>
	    </div>
		<br>
	    <div class="table table-responsive">
	        <table class="table table-bordered table-hovered" id="complaintlogtable" style="table-layout:auto;word-break:normal;">
	            <thead>
	                <tr style="background-color: #5d99c6; color:#fff">
	                    <th>Date</th>
	                    <th>Name</th>
						<th>Contact</th>
						<th>Passport</th>
						<th>Hamla</th>
						<th>Group</th>
	                    <th>Type</th>
						<th>Message</th>
	                    <th>Status</th>
	                    <th>Closure Date</th>
	                    <th style="display:none">Resource</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>
    </section>


</div>
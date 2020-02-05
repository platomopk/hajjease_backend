<div id="tab3_5" class="tab-pane fade" style="height:1920px;background-color: #EEEEEE;padding:15px;">
    

    <div class="center-block text-center" style="border:1px solid #333;padding-top:5px;padding-bottom:5px;">
		<label class="radio-inline" style="text-decoration: underline;">
            <input id="observationHome" type="radio" name="observationradio" checked>HOME
        </label>
        <label class="radio-inline" style="text-decoration: underline;">
            <input id="observationLog" type="radio" name="observationradio">LOGS
        </label>
    </div>

    <section id="observationHomeSection">
	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Observations Summary</h3>
	        <p style="text-align:justify;">These observations are grouped on the date they were originated on. </p>
	    </div>

	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="observationsummarytable">
	            <thead>
	                <tr style="background-color: #333; color:#fff">
	                    <th>Date</th>
	                    <th># Of Observations Handled</th>
	                    <th># Of Observations Completed</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>

	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Open Observations</h3>
	        <p style="text-align:justify;">These are the observations that are not handled as of now. </p>
	    </div>

	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="openobservationtable">
	            <thead>
	                <tr style="background-color: #333; color:#fff">
	                    <th>Date</th>
	                    <th>Category</th>
	                    <th>Title</th>
	                    <th>Message</th>
	                    <th>Status</th>
	                    <th>Type</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>
    </section>

    <section id="observationLogsSection" style="display: none">
	    <br>
	    <div>
	        <h3 style="margin: 0px;padding:0px;">Observation Logs</h3>
	        <p style="text-align:justify;">These observations are pulled chronologically </p>
	    </div>

	    <div>
	        <table class="table table-bordered table-reponsive table-hovered" id="observationlogtable">
	            <thead>
	                <tr style="background-color: #333; color:#fff">
	                    <th>ID</th>
	                    <th>Date</th>
	                    <th>Name</th>
	                    <th>Address</th>
	                    <th>Obser..</th>
	                    <th>Location</th>
	                    <th>Message</th>
	                    <th>Status</th>
	                    <th>Closure</th>
	                    <th>Resource</th>
	                    <th>Type</th>
	                    <th>Picture</th>
	                    
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
	    </div>
    </section>


</div>
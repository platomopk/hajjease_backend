
<div id="tab6" class="tab-pane fade" style="height:1920px;background-color: #EEEEEE;padding:15px;">
    <div>
        <h3 style="margin: 0px;padding:0px;">Find Users</h3>
        <p style="text-align:justify;">Please fill in the following information about the user you are about to find. </p>
    </div>

    <div>
        <div class="row">
            <label style="margin-left: 15px;">Find By Number</label>
            <input type="text" id="database_number" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;">    
        </div>
        <br>
        <div class="row">
            <label style="margin-left: 15px;">Find By Email</label>
			<input type="text" id="database_email" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;">
        </div>
        <br>
        <div class="row">
            <p style="text-align:justify; margin-left: 15px;">By pressing the following button, you agree that the information provided above is correct to the best to your knowledge.
            </p>
        </div>
        <div class="row">
            <input class="btn btn-default" id="database_find" type="button" value="Find" style="margin-left: 15px; background-color: #333;color:#fff">
        </div> 
    </div>
    <br><br>

    <div>
        <h3 style="margin: 0px;padding:0px;">User Details</h3>
        <p style="text-align:justify;">All the information regarding this user is as follows: </p>
    </div>

    <div>
        <table class="table table-bordered table-reponsive table-hovered" id="databaseusertable">
            <thead>
                <tr style="background-color: #333; color:#fff">
                    <th>Name</th>
                    <th>Gender</th>
                    <th>NIC</th>
                    <th>Cell</th>
                    <th>Landline</th>
                    <th>Address</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <br>
    <div>
        <h3 style="margin: 0px;padding:0px;">Registered Servants</h3>
        <p style="text-align:justify;">All the information regarding registered servants for this user are as follows: </p>
    </div>

    <div>
        <table class="table table-bordered table-reponsive table-hovered" id="databaseservantstable">
            <thead>
                <tr style="background-color: #333; color:#fff">
                    <th>Name</th>
                    <th>Gender</th>
                    <th>NIC</th>
                    <th>Cell</th>
                    <th>Landline</th>
                    <th>Address</th>
                    <th>Type</th>
                    <th>Activated</th>
                    <th>Entry Time</th>
                    <th>Exit Time</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <br>
    <div>
        <h3 style="margin: 0px;padding:0px;">Registered Cars</h3>
        <p style="text-align:justify;">All the information regarding registered cars for this user are as follows: </p>
    </div>

    <div>
        <table class="table table-bordered table-reponsive table-hovered" id="databasecarstable">
            <thead>
                <tr style="background-color: #333; color:#fff">
                    <th>Make</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>Reg #</th>
                    <th>Chasis #</th>
                    <th>Activated</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>




</div>
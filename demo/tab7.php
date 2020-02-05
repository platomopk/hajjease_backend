<div id="tab7" class="tab-pane fade" style="height:1920px;background-color: #EEEEEE;padding:15px;">

    <div>
        <h3 style="margin: 0px;padding:0px;">Create Administrator</h3>
        <p style="text-align:justify;">Please fill in the following information about the administrator you are about to create. </p>
    </div>

    <div>
        <form action="createnewadmin.php" id="createNewAdminForm" method="get" accept-charset="utf-8">
            <div class="row">
                <label style="margin-left: 15px;">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;">    
            </div>
            <br>
            <div class="row">
                <label style="margin-left: 15px;">Branch</label>
                <select name="branch" class="form-control" style="width:50%;margin-left: 15px;" required>
                    <option value="" disabled selected>Select</option>
                    <option value="informationtech">IT</option>
                    <option value="logistics">Logistics</option>
                    <option value="operations">Operations</option>
                    <option value="finance">Finance</option>
                </select>    
            </div>
            <br>
            <div class="row">
                <label style="margin-left: 15px;">Cell</label>
                <input type="text" name="cell" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;">    
            </div>
            <br>
            <div class="row">
                <label style="margin-left: 15px;">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;">    
            </div>
            <br>
            <div class="row">
                <label style="margin-left: 15px;">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;">    
            </div>
            <br>
            <div class="row">
                <label style="margin-left: 15px;">Password</label>
                <input type="text" name="password" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;">    
            </div>
            <br>
            <div class="row">
                <p style="text-align:justify; margin-left: 15px;">By pressing the following button, you agree that the information provided above is correct to the best to your knowledge.
                </p>
            </div>
            <div class="row">
                <input class="btn btn-default" type="submit" name="submit" value="Create New" style="margin-left: 15px; background-color: #333;color:#fff">
            </div>
        </form> 
    </div>

    <br>

    <div>
        <h3 style="margin: 0px;padding:0px;">Registered Admin Users</h3>
        <p style="text-align:justify;">All the information regarding administrators are as follows: </p>
    </div>

    <div>
        <table class="table table-bordered table-reponsive table-hovered" id="managementregisteredtable">
            <thead>
                <tr style="background-color: #333; color:#fff">
                    <th>Name</th>
                    <th>Cell</th>
                    <th>Branch</th>
                    <th>Email</th>
                    <th>Created On</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div id="tab9" class="tab-pane fade" style="height:1920px;background-color: #fff; padding:20px;">


    <div>
        <h3 style="margin: 0px;padding:0px; margin-bottom:10px;"><u>Add Schedule</u></h3>
        <label>Please Select Date</label>
        <input type="datetime-local" class="form-control" placeholder="Select Date" id="sc_dt" style="width:350px;">
        <label style="margin-top:10px;">Please Enter Details</label>
        <input type="text" class="form-control" placeholder="Enter Details" id="sc_desc" style="width:350px;">
        <div style="margin-top:10px;"><label>Please Select Category</label></div>
        <select id="ac_cat" class="form-control" style="width:350px;">
                <option value="" selected disabled>Please Select</option>
                <option value="Airport">Airport</option>
                <option value="Group">Group</option>
                <option value="Bus">Bus</option>
                <option value="Makkah">Makkah</option>
                <option value="Madina">Madina</option>
                <option value="Others">Others</option>
            </select>
            <div style="margin-top:10px;"><label>Please Select City</label></div>
            <select id="ac_cat" class="form-control" style="width:350px;">
                <option value="" selected disabled>Please Select</option>
                <option value="Airport">Jeddah</option>
                <option value="Group">Makkah</option>
                <option value="Bus">Asfan</option>
                <option value="Makkah">Madina</option>
            </select>
        <input type="button" value="Add Schedule" id="sc_addBtn" class="btn btn-primary" style="margin-top:10px;">        
        
    </div>

    <br>
    
    <hr>

    <br>

    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="25">DateTime</th>
                    <th width="20">City</th>
                    <th width="15">Category</th>
                    <th width="55">Description</th>
                    <th width="5">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>22/09/2019 02:00 PM</td>
                    <td>Jeddah</td>
                    <td>Airport</td>
                    <td>Flights land at Jeddah Intl. Airport</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>22/09/2019 03:00 PM</td>
                    <td>Jeddah</td>
                    <td>Bus</td>
                    <td>All hajjaj to reach the bus for departure to Makkah. (Bus # 2112)</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>22/09/2019 04:30 PM</td>
                    <td>Makkah</td>
                    <td>City</td>
                    <td>Arrival at Makkah.</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>22/09/2019 05:00 PM</td>
                    <td>Makkah</td>
                    <td>Hotel</td>
                    <td>Check in at the hotel (Please check your accomodation).</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>22/09/2019 06:30 PM</td>
                    <td>Makkah</td>
                    <td>Haram</td>
                    <td>Departure to Haram.</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>28/09/2019 02:00 PM</td>
                    <td>Madina</td>
                    <td>Bus</td>
                    <td>All hajjaj to reach the bus for departure to Madina. (Bus # 2112)</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>28/09/2019 05:30 PM</td>
                    <td>Asfan</td>
                    <td>RestStop</td>
                    <td>Rest at service area</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>28/09/2019 07:00 PM</td>
                    <td>Madina</td>
                    <td>City</td>
                    <td>Arrival at Madina</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>28/09/2019 08:00 PM</td>
                    <td>Madina</td>
                    <td>Hotel</td>
                    <td>Check in at the hotel (Please check your accomodation).</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
                <tr>
                    <td>28/09/2019 08:30 PM</td>
                    <td>Madina</td>
                    <td>Haram</td>
                    <td>Departure to Haram.</td>
                    <td><input class="btn btn-danger btn-xs" type="button" value="Del">&nbsp;<input class="btn btn-primary btn-xs" type="button" value="Edit"></td>
                </tr>
            </tbody>
        </table>
    </div>

    
</div>
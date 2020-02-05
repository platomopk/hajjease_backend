<br>
<div id="tab8" class="tab-pane fade" style="height:1920px;background-color: #fff; padding:20px;">


    <div>
        <h3 style="margin: 0px;padding:0px; margin-bottom:10px;"><u>Search Pilgrim</u></h3>
        <input type="text" class="form-control" placeholder="Enter Passport Number ..." id="acc_ppnumber" style="width:350px;">
        <input type="button" value="Search" id="acc_searchBtn" class="btn btn-primary" style="margin-top:5px;">        
    </div>

    <br><br>

    <div id="pilgrimfound" style="display:none">
        <h3 style="margin: 0px;padding:0px;margin-bottom:10px;"><u>Pilgrim Found</u></h3>
        <p class="lead">PK123456/Ahmed Jahangir Chohan</p>
        <table style="display:none" class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Package</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ahmad Jahangir Chohan</td>
                    <td>Umrah</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <br>

    <div id="managepackage" style="display:none">
        <h3 style="margin: 0px;padding:0px;margin-bottom:10px;text-decoration:underline">Manage Packages</h3>
        <p style="text-align:justify;">Please fill in the following information about the package</p>
    
        <div>
            <label style="margin-right:15px;">Packages </label>
            <select id="acc_package">
                <option value="" selected disabled>Please Select</option>
                <option value="Umrah">Umrah Package</option>
                <option value="Hajj">Hajj Package</option>
            </select>
        </div>
    </div>

    <br><br>

    <div id="manageaccomodation" style="display:none">
        <h3 style="margin: 0px;padding:0px;margin-bottom:10px;text-decoration:underline">Manage Accomodations</h3>
        <p style="text-align:justify;">Please fill in the following information about the accomodations</p>
    
    <br>

        <div>
            <label style="margin-right:15px;">Hotel In Makkah: </label>
            <select>
                <option value="" selected disabled>Please Select</option>
                <option value="Pullman Zamzam Makkah">Pullman Zamzam Makkah</option>
            </select>
            <select>
                <option value="" selected disabled>Please Select</option>
                <option value="Floor # 1">Floor # 1</option>
            </select>
            <select>
                <option value="" selected disabled>Please Select</option>
                <option value="Room # 101">Room # 101</option>
            </select>
        </div>
        <br>
        <div>
            <label style="margin-right:15px;">Hotel In Madina: </label>
            <select>
                <option value="" selected disabled>Please Select</option>
                <option value="Pullman Zamzam Madina">Pullman Zamzam Madina</option>
            </select>
            <select>
                <option value="" selected disabled>Please Select</option>
                <option value="Floor # 2">Floor # 2</option>
            </select>
            <select>
                <option value="" selected disabled>Please Select</option>
                <option value="Room # 201">Room # 201</option>
            </select>
        </div>
        <br>
        <div id="minacamp" style="display:none">
            <label style="margin-right:15px;">Camp In Mina: </label>
            <select>
                <option value="" selected disabled>Please Select</option>
                <option value="Maktab 009">Maktab 009</option>
            </select>
            <select>
                <option value="" selected disabled>Please Select</option>
                <option value="Camp 7/56">Camp 7/56</option>
            </select>
        </div>
    
        <br>
        <input type="button" value="Assign Accomodation" id="acc_assignBtn" class="btn btn-primary">
    </div>

    
</div>
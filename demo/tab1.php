<br>
<div id="tab1" class="tab-pane fade in active" style="height:1920px;background-color: #fff; padding:20px;">

    <div>
        <h3 style="margin: 0px;padding:0px;">Create Campaign</h3>
        <p style="text-align:justify;">Please fill in the following information about the campaign you are about to create. </p>
    </div>
    <br>

    <div>
        <form action="createnewcampaign.php" id="createNewCampaignForm" method="get" accept-charset="utf-8">
            <div class="row" style="display: none">
                <label style="margin-left: 15px;">Creater</label>
                <input type="text" name="creater" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;" value="<?php echo $_SESSION['name'];?>" >    
            </div>
            <div class="row">
                <label style="margin-left: 15px;">Campaign Name</label>
                <input type="text" name="campaignName" class="form-control" placeholder="Enter Here" required style="width:50%;margin-left: 15px;">    
            </div>
            <br>
            <div class="row">
                <label style="margin-left: 15px;">Category</label>
                <select name="category" class="form-control" style="width:50%;margin-left: 15px;" required>
                    <option value="" disabled selected>Select</option>
                    <option value="food">Food</option>
                    <option value="cleanliness">Cleanliness</option>
                    <option value="water">Water</option>
                    <option value="power">Power</option>
                    <option value="gas">Gas</option>
                    <option value="security">Security</option>
                    <option value="others">Others</option>
                </select>    
            </div>
            <br>
            <div class="row">
                <label style="margin-left: 15px;">Message</label>
                <textarea style="width:50%;margin-left: 15px;" class="form-control" name="message" rows="5" required placeholder="Enter Your Message Here"></textarea>  
            </div>
            <br>
            <div class="row">
                <p style="text-align:justify; margin-left: 15px;">By pressing the following button, you agree that the information provided above is correct to the best to your knowledge.
                </p>
            </div>
            <div class="row">
                <input class="btn btn-default" type="submit" name="submit" value="Send Notification" style="margin-left: 15px; background-color: #5d99c6;color:#fff">
            </div>
        </form> 
    </div>
    <br>

    <hr>

    <br>

    <div>
        <h3 style="margin: 0px;padding:0px;">CAMPAIGNS STATS</h3>
        <p style="text-align:justify;">All the statistical information regarding all campigns are as follows: </p>
    </div>
    <br>
    <div>
        <table class="table table-bordered table-reponsive table-hovered" id="notificationTable">
            <thead>
                <tr style="background-color: #5d99c6; color:#fff">
                    <th>Campaign Name</th>
                    <th>Category</th>
                    <th>Message</th>
                    <th>Sent On</th>
                    <th>Sent To</th>
                    <th>Total Seen</th>
                    <th>Total Ack'd</th>
                    <th>Total Reported</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>
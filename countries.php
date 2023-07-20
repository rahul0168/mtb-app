
<?php
include './api/api-function.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$country['id'] = "";
$country['name'] = "";
$country['static_rate'] = "";
$country['customised_rate'] = "";
$country['is_sending_active'] = "";
$country['is_receiving_active'] = "";
$title = "Add";
$active1 = "active";
$active2 = "";
if(!empty($id))
{
    $url1 = "http://localhost/mtb-app/api/countriesapi.php?id=$id";
    $country_data = CurlOperation($url1);
    $country = $country_data['data'];
$title = "Edit";

    // RFA($country);
}


include './header.php';

?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Country</h1>
                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $title ; ?> Country</h6>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="<?php echo $country['name']; ?>" id="name" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $country['static_rate']; ?>" name="staticRate" id="staticRate" placeholder="static Rate">
                                    </div>

                                    <div class="col-md-6 mt-4" >
                                
                                        <input type="text" class="form-control" value="<?php echo $country['customised_rate']; ?>" name="customisedRate" id="customisedRate" placeholder="customised Rate">
                                    </div>
                                    <div class="col-md-3 mt-4" >
                                    <?php if ($country['is_sending_active'] == 1) { $checked = 'checked'; } else { $checked = ""; } ?>
                                    <input type="checkbox" id="isSendingActive" name="isSendingActive" value="<?php echo $country['is_sending_active'] ?>"  <?php echo $checked ; ?>>
                                    <label for="isSendingActive">Show in Send List</label><br>
                                    </div>

                                    <div class="col-md-3 mt-4" >
                                    <?php if ($country['is_receiving_active'] == 1) { $checked = 'checked'; } else { $checked = ""; } ?>

                                    <input type="checkbox" id="isReceivingActive" name="isReceivingActive" value="<?php echo $country['is_receiving_active'] ?>"  <?php echo $checked ; ?>>
                                    <label for="isReceivingActive">Show in Receving List</label><br>
                                    </div>
                                   
                                  </div>
                                  <div class="col-md-3 mt-4" >
                                  <a class="btn btn-primary btn-user btn-block" onclick="saveCountry()">
                                  Submit
                                </a>
                                </div>
                                </div>
                            </div>

                        </div>

                      

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
<?php include './footer.php'; ?>

    <script>
        var valueSend; // Declare valueSend variable outside the event listener
           var valueRece; // Declare valueRece variable outside the event listener
           const isSendingActive = document.getElementById('isSendingActive')
           isSendingActive.addEventListener('change', function() {
             valueSend = this.checked ? 1 : 0;
           console.log(valueSend);
            });

            const isReceivingActive = document.getElementById('isReceivingActive')
            isReceivingActive.addEventListener('change', function() {
                 valueRece = this.checked ? 1 : 0;
           console.log(valueRece);
            });
            
        function saveCountry()
        {
           const name = document.getElementById('name').value
           const staticRate = document.getElementById('staticRate').value
           const customisedRate = document.getElementById('customisedRate').value
           
           const primaryKey = '<?php echo $id; ?>'; 
           if(valueSend == "")
           {
            const valueSend = document.getElementById('isSendingActive').value
           }

           if(valueRece == "")
           {
            const valueRece = document.getElementById('isReceivingActive').value
           }
           
        //    console.log(primaryKey);
           if(primaryKey !="")
           {
           
            var data = {id:primaryKey,name:name,staticRate:staticRate,customisedRate:customisedRate,isSendingActive:valueSend,isReceivingActive:valueRece};
            var type = "PUT";
            var msg = "Country added successfully";

           }else{
            var data = {name:name,staticRate:staticRate,customisedRate:customisedRate,isSendingActive:valueSend,isReceivingActive:valueRece};
            var type = 'POST';
            var msg = "Country updated successfully";
           }
            $.ajax({
            url: 'http://localhost/mtb-app/api/countriesapi.php',
            type: type,
            data: JSON.stringify(data),
            success: function(response) {
                var responseData = JSON.parse(response);
               alert(responseData.message)
              
            }
            });
           }
           
        
    </script>

</body>

</html>
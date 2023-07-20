<?php
include './api/api-function.php';

$url = "http://localhost/mtb-app/api/countriesapi.php";
$countrylist = CurlOperation($url);
$country = $countrylist['data'];
$active2 = "active";
$active1 = "";

include './header.php';
?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Country</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Country List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Static rate</th>
                                            <th>Customised rate</th>
                                          
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                        
                                    <tbody>
                                        <?php foreach ($country as $countrys) { ?>
                                        <tr>
                                            <td><?php echo $countrys['name'] ?></td>
                                            <td><?php echo $countrys['static_rate'] ?></td>
                                            <td><?php echo $countrys['customised_rate'] ?></td>
                                            <td><a class="btn btn-primary" href="http://localhost/mtb-app/countries.php?id=<?php echo $countrys['id']; ?>">Edit</a> <a class="btn btn-danger" onclick="deleteCountry(<?php echo $countrys['id'] ?>)">Delete</a></td>
                                            
                                        </tr>
                                        <?php } ?>
                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <?php include './footer.php'; ?>
    <script>
        var data=[];
        function deleteCountry(id){
             
            $.ajax({
            url: 'http://localhost/mtb-app/api/countriesapi.php',
            type: 'DELETE',
            data: {id: id},
            success: function(response) {
                var responseData = JSON.parse(response);
               alert(responseData.message)
              
            }
            });
           }
        
    </script>
</body>

</html>
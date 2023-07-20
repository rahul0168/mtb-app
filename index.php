<?php
include './api/api-function.php';

$url1 = "http://localhost/mtb-app/api/countriesapi.php?type=sending";
$country_data = CurlOperation($url1);
$country = $country_data['data'];

$url2 = "http://localhost/mtb-app/api/countriesapi.php?type=receiving";
$country_data2 = CurlOperation($url2);
$countryRece = $country_data2['data'];
// exit;
// Check if the data retrieval was successful

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Money Tranfer Business</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Money Tranfer</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                       <select class="form-control" id="country-send">

                                        <option>Select Sending Country</option>
                                       <?php  foreach ($country as $countrys) {
                                            echo '<option value='.$countrys['id'].' data-static-rate='.$countrys['static_rate'].'>' . $countrys['name'] . '</option>';
                                        } ?>
                                       </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="country-rece">
                                        <option>Select Receving Country</option>
                                            <?php  foreach ($countryRece as $countryReces) {
                                            echo '<option value='.$countryReces['id'].' data-custom-rate='.$countryReces['customised_rate'].'>' . $countryReces['name'] . '</option>';
                                        } ?>
                                           </select>
                                    </div>
                                </div>
                                <div id="result">

                                </div>
                             
                                <a class="btn btn-primary btn-user btn-block" onclick="calculateRate()">
                                  Calculate
                                </a>
                                <hr>
                             
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        function calculateRate(){

            const countrysendId = document.getElementById('country-send');
            const sendselectedOption = countrysendId.options[countrysendId.selectedIndex];
            const staticRate = sendselectedOption.getAttribute('data-static-rate');
            const sendValue = sendselectedOption.getAttribute('value');


            const countryreceId = document.getElementById('country-rece');
            const receselectedOption = countryreceId.options[countryreceId.selectedIndex];
            const customRate = receselectedOption.getAttribute('data-custom-rate');
            const receValue = receselectedOption.getAttribute('value');

            if(sendValue == receValue )
            {
                alert(" please select different country");
                return false;
            }
            
            const result =  Number(staticRate) + Number(customRate);
            document.getElementById('result').innerHTML = "<b>Result</b><br/>"+result+"<br/>";

        }
    </script>

</body>

</html>
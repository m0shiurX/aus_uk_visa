<?php
require_once "includes/headx.php";
require_once "includes/actions.php";
    $actions = new Actions($dbh);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>AUS UK Visa Application</title>
</head>

<body>
    <div class="container">
        <?php include "components/header.php"; ?>
                <!-- <button id="cmd">generate PDF</button> -->
        <main>
            <div class="find_visa">
                <h2>Find you Visa</h2>
                <h3>Find your visa status</h3>
                <p>Please complete the following details to view your visa entitlements. Fields marked * must be completed.</p>
                <form id="visastatus" action="" method="POST">
                    <div class="type">
                        <label for="type">Reference type</label>
                        <select name="reference" id="type" required>
                            <option value="">Please choose a Reference type</option>
                            <option value="1">Application Status</option>
                            <option value="2">Visa Status</option>
                            <option value="3">Visa Grant Notice Status</option>
                        </select>
                    </div>
                    <div class="type">
                        <label for="tracking">Tracking Number</label>
                        <input type="text" name="trackingNumber" id="tracking">
                    </div>
                    <div class="type">
                        <label for="dob">Date of Birth </label>
                        <input type="date" name="dob" id="dob">
                    </div>
                    <div class="type">
                        <label for="passport">Passport Number</label>
                        <input type="text" name="passport_number" id="passport">
                    </div>
                    <div class="type">
                        <label for="type">Country of Passport</label>
                        <select name="country" id="country" required>
                            <option value="">Select a Country</option>
                            <?php
                                $countries = $actions->fetchCountries();
                                if (isset($countries) && sizeof($countries) > 0){
                                    foreach ($countries as $country) { ?>
                                    <option value="<?=$country->ID?>"><?=$country->CountryName?></option>
                                <?php }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="button">
                        <input class="btn" type="submit" value="Check" >
                    </div>
                </form>
            </div>

        </main>
        <?php include "components/footer.php"; ?>
    </div>
    <script src="js/jquery.min.js"></script>
    <!-- <script src="js/jspdf.min.js"></script> -->
    <script>
    jQuery(document).ready(function() {
        $('form#visastatus').on('submit', function(e) {
            e.preventDefault();
            console.log("Submitted");
            $.ajax({
                type: 'post',
                url: 'visa_status.php',
                data: $('form#visastatus').serialize(),
                success: function (response) {
                    $('.find_visa').fadeOut();
                    $('main').html(response);
                }
            });
        });
    })
        // var doc = new jsPDF();
        // var specialElementHandlers = {
        //     '#survey_container': function (element, renderer) {
        //         return true;
        //     }
        // };

        // $('#cmd').click(function () {
        //     console.log("clicked");
        //     doc.fromHTML($('#survey_container').html(), 15, 15, {
        //         'width': 800,
        //             'elementHandlers': specialElementHandlers
        //     });
        //     doc.save('sample-file.pdf');
        // });
    </script>
</body>
</html>
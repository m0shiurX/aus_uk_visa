<?php
require_once "includes/headx.php";
require_once "includes/actions.php";
    $actions = new Actions($dbh);
    if (isset($_POST['reference']) && isset($_POST['passport_number']) && isset($_POST['trackingNumber']) && isset($_POST['dob'])){
        
        $ref_type = $_POST['reference'];
        $trackingNumber = $_POST['trackingNumber'];
        $dob =date ('Y-m-d',strtotime($_POST['dob']));
        $passport_number = $_POST['passport_number'];
        $country = $_POST['country'];
        $result = $actions->findVisa($passport_number, $trackingNumber, $dob, $country);
        if (!empty($result) && sizeof($result) > 0){
            $application = $result->ID;
            $cid = $result->Country;
            $appStatus = $result->approved;
            // Get Country Name
            $follow = $actions->getCountryName($cid);
            $cname = $follow->CountryName;
            if ($ref_type == 1) {
                $appDetails = $actions->findApplication($application);
                if (is_numeric($appDetails->Status) && $appDetails->Status == 0) {
                ?>
                    <div id="survey_container" class="wizard" novalidate="novalidate">
                        <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                            <h1>Your application is  yet to be Approved !</h1>
                        </div>
                    </div>
                <?php }elseif(!is_numeric($appDetails->Status)){
                    ?>
                    <div id="survey_container" class="wizard" novalidate="novalidate">
                        <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                            <h1>Your application is  Cancelled !</h1>
                        </div>
                    </div>
                    <?php
                }else{
                    include "app_status.php";
                }
            }elseif ($ref_type == 2 && $appStatus == 1) {
                $appDetails = $actions->findApplication($application);
                if (is_numeric($appDetails->Status) && $appDetails->Status<100) {
                    ?>
                        <div id="survey_container" class="wizard" novalidate="novalidate">
                            <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                                <h1>Your application is not yet 100% Complete.</h1>
                            </div>
                        </div>
                    <?php
                }elseif(!is_numeric($appDetails->Status)){
                    ?>
                    <div id="survey_container" class="wizard" novalidate="novalidate">
                        <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                            <h1>Your Visa Application is  Cancelled !</h1>
                        </div>
                    </div>
                    <?php
                }else{
                    include "visa_app_status.php";
                }
            }elseif ($ref_type == 3 && $appStatus == 1) {
                $appDetails = $actions->findApplication($application);
                if (is_numeric($appDetails->Status) && $appDetails->Status<100) {
                    ?>
                        <div id="survey_container" class="wizard" novalidate="novalidate">
                            <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                                <h1>Your visa is not yet Granted.</h1>
                            </div>
                        </div>
                    <?php
                }elseif(!is_numeric($appDetails->Status)){
                    ?>
                    <div id="survey_container" class="wizard" novalidate="novalidate">
                        <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                            <h1>Your application is  Cancelled !</h1>
                        </div>
                    </div>
                    <?php
                }else{
                        include "grant_notice.php";
                }
                ?>
            <?php
            }else{
                ?>
                    <div id="survey_container" class="wizard" novalidate="novalidate">
                        <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                            <h1>Your Visa is yet to be approved !</h1>
                        </div>
                    </div>
                <?php
            }
        }else{
            ?>
            <div id="survey_container" class="wizard" novalidate="novalidate">
                <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                    <h1>Not Found ! Check your data and <a href="find_visa.php">try again</a>!</h1>
                </div>
            </div>
        <?php
        }
    }
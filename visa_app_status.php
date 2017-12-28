                    <div id="survey_container" class="wizard" novalidate="novalidate">
                        <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="text-align:center;"><img src="assets/<?=$appDetails->LogoName?>"></div>
                                    <div style="text-align:center;font-weight:bold; font-size:15px; clear:both;"><?=$appDetails->Citizenship?> Government </div>
                                    <div style="border-top:1px solid #000; text-align:center; font-size:15px; margin-bottom:30px; color:#000;">Department of Immigration and Border Protection</div>
                                    <div style="text-align:center; font-size:20px; clear:both; color:#000; margin-bottom:20px;">
                                        <?php echo ($appDetails->Status !== 100)? "Applicaiton" : "Visa" ?> is approved</div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="submit step wizard-step current" id="complete" style="display: block;">
                                <!-- start sumit step -->
                                <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><b>Details of Application</b></td>
                                        </tr>
                                        <tr>
                                            <td>Application ID:</td>
                                            <td><?=$appDetails->TrackingNumber?></td>
                                        </tr>
                                        <tr>
                                            <td>Application Date:</td>
                                            <td><?=date('d F Y', strtotime($appDetails->ApplyDate))?></td>
                                        </tr>
                                        <tr>
                                            <td>File Number:</td>
                                            <td><?=($appDetails->FileNumber != '')? $appDetails->FileNumber : "Available After admin Review"?></td>
                                        </tr>
                                        <tr>
                                            <td>Payment Receipt Number:</td>
                                            <td><?=($appDetails->ReceiptNumber != '')? $appDetails->ReceiptNumber : "Available After Payment Completed"?></td>
                                        </tr>
                                        <tr>
                                            <td>Decision Date:</td>
                                            <td><?=($appDetails->DecisionDate != '0000-00-00')? date('d F Y', strtotime($appDetails->DecisionDate)) : "Available After admin Review"?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Primary Applicant</b></td>
                                        </tr>
                                        <tr>
                                            <td>Name : </td>
                                            <td><?=$appDetails->FirstName?>&nbsp;<?=$appDetails->LastName?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth:</td>
                                            <td><?=date('d F Y', strtotime($appDetails->DateOfBirth))?></td>
                                        </tr>
                                        <tr>
                                            <td>Application ID:</td>
                                            <td><?=$appDetails->TrackingNumber?></td>
                                        </tr>
                                        <tr>
                                            <td>Citizenship:</td>
                                            <td> <?=$cname?></td>
                                        </tr>
                                        <tr>
                                            <td>Passport Number:</td>
                                            <td><?=$appDetails->PassportNumber?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa Grant Number:</td>
                                            <td><?=($appDetails->VisaGrantNumber != '')? $appDetails->VisaGrantNumber : "Available after visa grant"?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa Stream: </td>
                                            <td><?=$appDetails->VisaType?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa Grant Date:</td>
                                            <td><?=($appDetails->VisaGrantDate != '0000-00-00')? date('d F Y', strtotime($appDetails->VisaGrantDate)) : "Available after visa grant"?></td>
                                        </tr>
                                        <tr>
                                            <td>Stay For/Until :</td>
                                            <td><?=($appDetails->StayFor != '')? $appDetails->StayFor : "Available after visa grant"?></td>
                                        </tr>
                                        <tr>
                                            <td>Entries:</td>
                                            <td><?=($appDetails->Entries != '')? $appDetails->Entries : "Available after visa grant"?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Date of Arrive:</td>
                                            <td><?=($appDetails->ArrivalDate != '0000-00-00')? date('d F Y', strtotime($appDetails->ArrivalDate)) : "Available after visa grant"?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="text-align:justify; color:#000; margin: 50px 0;">
                                    <b>Conditions</b>
                                    <br>
                                    <p>No visa label required .The Australian Government does not require you to have a visa label placed into your passport for travel to Australia.However, if you are training or exiting through another country , it is your responsibility to check with the relevant government authorities regarding requirement to show a visa label in your passport. The Australian Government cannot advise on other countries requirements. More information on travelling without a visa label and visa entitlement verification is available at http://aus-ukvisaprocess.com
                                        <br>
                                        <b>Visa conditions and entitlements</b>
                                        <br> If your visa has been granted subject to certain conditions and you do not comply with these conditions, there may be serious consequences including visa cancellation, detention and removal from Australia, More information on visa condition and entitlements is available at http://aus-ukvisaprocess.com
                                    </p>
                                </div>
                                <h3 class="wizard-header"  style="color:#ff0000; font-weight:bold; text-align:center">
                                    <font>
                                        <?php
                                            if ($appDetails->Status == 0) {
                                                echo "Application just Processed. Our Visa Processing Team Will Contact You Soon !";
                                            }elseif ($appDetails->Status == 100) {
                                                echo "Congratulations ! Your application is Successfully Completed !";
                                            }elseif ($appDetails->Status == "cancelled") {
                                                echo "Sorry, Your application is $appDetails->Status.";
                                            }else{
                                                echo "Your visa is $appDetails->Status % Processed.";
                                            }
                                        ?>
                                    </font>
                                </h3>
                            </div>
                            <!-- end submit step -->
                        </div>
                        <!-- end middle-wizard -->
                    </div>
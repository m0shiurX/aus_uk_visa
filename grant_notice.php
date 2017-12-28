                    <div id="survey_container" class="wizard" novalidate="novalidate">
                        <div id="middle-wizard" style="" class="wizard-branch wizard-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="text-align:center;"><img src="assets/<?=$appDetails->LogoName?>"></div>
                                    <div style="text-align:center;font-weight:bold; font-size:15px; clear:both;"><?=$appDetails->Citizenship?> Government </div>
                                    <div style="border-top:1px solid #000; text-align:center; font-size:15px; margin-bottom:30px; color:#000;">Department of Immigration and Border Protection</div>

                                    <div style="text-align:center; clear:both; color:#000; margin-bottom:20px;"><h1>VISA GRANT NOTICE</h1> </div>
                                    <div style="text-align:center; font-size:20px; clear:both; color:#000; margin-bottom:20px;"><h3><?=$appDetails->FirstName?>&nbsp;<?=$appDetails->LastName?></h3></div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="submit step wizard-step current" id="complete" style="display: block;">
                                <!-- start sumit step -->
                                <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><b>Application Details</b></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Visa Application</td>
                                            <td><?=date("d F Y", strtotime($appDetails->ApplyDate))?></td>
                                        </tr>
                                        <tr>
                                            <td>Transaction Reference Number (TRN)</td>
                                            <td><?=$appDetails->trn?> </td>
                                        </tr>
                                        <tr>
                                            <td>Application ID</td>
                                            <td><?=$appDetails->TrackingNumber?></td>
                                        </tr>
                                        <tr>
                                            <td>File Number</td>
                                            <td><?=($appDetails->FileNumber != '')? $appDetails->FileNumber : "Available After admin Review"?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa Application Charge Receipt Number</td>
                                            <td><?=($appDetails->ReceiptNumber != '')? $appDetails->ReceiptNumber : "Available After Payment Completed"?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="main_table">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" style="border:0px !important;"><b>Applicant Details</b></td>
                                        </tr>
                                        <tr>
                                            <td width="200">Applicant Type : </td>
                                            <td>Main Applicant</td>
                                        </tr>
                                        <tr>
                                            <td>Applicant Name : </td>
                                            <td><?=$appDetails->FirstName?>&nbsp;<?=$appDetails->LastName?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth:</td>
                                            <td><?=date('d F Y', strtotime($appDetails->DateOfBirth))?></td>
                                        </tr>
                                        <tr>
                                            <td>Client ID:</td>
                                            <td><?=$appDetails->OrderID?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="main_table">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" style="border:0px !important;"><b>Visa Grant Details</b></td>
                                        </tr>
                                        <tr>
                                            <td width="200">Visa Class</td>
                                            <td><?=$appDetails->v_class?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa Subclass</td>
                                            <td><?=$appDetails->v_subClass?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa Grant Number</td>
                                            <td><?=($appDetails->VisaGrantNumber != '')? $appDetails->VisaGrantNumber : "Available after visa grant"?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa Grant Date</td>
                                            <td><?=($appDetails->VisaGrantDate != '0000-00-00')? date('d F Y', strtotime($appDetails->VisaGrantDate)) : "Available after visa grant"?></td>
                                        </tr>
                                        <tr>
                                            <td>Travel Document Number</td>
                                            <td><?=$appDetails->t_doc?></td>
                                        </tr>
                                        <tr>
                                            <td>Travel Document Country</td>
                                            <td><?=$appDetails->t_country?></td>
                                        </tr>
                                        <tr>
                                            <td>Must Make First Entry to
                                                <br> Australia Before</td>
                                            <td><?=date('d F Y', strtotime($appDetails->DecisionDate))?></td>
                                        </tr>
                                        <tr>
                                            <td>Must Not Arrive After</td>
                                            <td><?=date('d F Y', strtotime($appDetails->ArrivalDate))?></td>
                                        </tr>
                                        <tr>
                                            <td>Stay Period</td>
                                            <td><?=($appDetails->StayFor != '')? $appDetails->StayFor : "Available after visa grant"?></td>
                                        </tr>
                                        <tr>
                                            <td>Travel Facility</td>
                                            <td><?=$appDetails->t_facility?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa Conditions</td>
                                            <td><?=$appDetails->v_condiitons?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="text-align:left; color:#000; position: relative">
                                    <p>
                                        <b>First Entry Date</b>
                                        <br>
                                        You must make your first entry to Australia before <?=date('d F Y', strtotime($appDetails->f_entry))?> . It is not possible to change this date
                                    </p>
                                    <p>
                                        <b>AUEP Address</b>
                                        <br> po box 4328 robina town center Queensland4230
                                        <br> phone:1300 365 688
                                        <br> +61 7 55933322 fax+61 7 5597 3701
                                        <br> E-mail:immg.govaus@gmail.com
                                        <br> Website: http://aus-ukvisaprocess.com
                                    </p>
                                    <div class="qrcode" style="position:  absolute;right: 0;top: 70px;width: 150px;height: 150px;">
                                        <img style="width: 100%;height: auto;" src="../assets/qr.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- end submit step -->
                        </div>
                        <!-- end middle-wizard -->
                    </div>
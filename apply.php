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
        <main>
          <div class="application">
            <h2>Apply Visa</h2>
            <div class="content">
                <form action="save.php" method="POST">
                    <div class="steps">
                        <div class="step active">
                            <div class="top"></div>
                            <p class="name">Step 1.</p>
                            <p class="stepname">Consent and Declaration</p>
                            <div class="bottom"></div>
                        </div>
                        <div class="step">
                            <div class="top"></div>
                            <p class="name">Step 2.</p>
                            <p class="stepname">Fill the Form</p>
                            <div class="bottom"></div>
                        </div>
                        <div class="step">
                            <div class="top"></div>
                            <p class="name">Step 3.</p>
                            <p class="stepname">Confirmation</p>
                            <div class="bottom"></div>
                        </div>

                    </div>
                    <fieldset>
                        <div class="note">
                            <p>- You must agree to the terms as below to apply for an Electronic Travel Authority.</p>
                        </div>
                        <div class="section">
                            <p class="content">I declare that the applicant is outside Australia.</p>
                            <div class="agree">
                                <label class="label">
                                    <input class="checkboxes" type="checkbox" value="yes"> I have read and understand the information and agree to these terms
                                </label>
                            </div>
                        </div>
                        <div class="section">
                                <iframe src="license.txt"></iframe>
                            <div class="agree">
                                <label class="label">
                                    <input class="checkboxes" type="checkbox" value="yes"> I agree with this license
                                </label>
                            </div>
                        </div>
                        <div class="section">
                            <p class="content">I declare that the applicant is outside Australia.</p>
                            <div class="agree">
                                <label class="label">
                                    <input class="checkboxes" type="checkbox" value="yes"> I have read and understand the information and agree to these terms
                                </label>
                            </div>
                        </div>
                        
                        <div class="button">
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="note">
                            <p class="alert">
                                 Be sure to check that there are no errors in the details you have typed and then please submit it. After the application
                                is sent you cannot change any of the information. If you need to change anything then you will have to pay to resubmit your
                                application and pay for the cost of having it processed as well as resubmit the application itself. We are unable to guarantee
                                your trip if there is a mistake in your application information. Please be sure to type in your information exactly as it
                                shows on your passport.
                            </p>
                        </div>
                        <div class="section">
                            <div class="agree">
                                <p>Personal Information</p>
                            </div>
                            <div class="content">
                                <div class="fg">
                                    <p> Visa Type</p>
                                    <span>
                                        <input type="radio" name="visatype" id="tourism" class="field" value="tourism" checked/>
                                        <label for="tourism">Tourism </label>
                                        <input type="radio" name="visatype" id="business" class="field" value="buisness"/>
                                        <label for="business">Business</label>
                                    </span>
                                </div>
                                <div class="fg">
                                    <label for="c2g">Country to Go</label>
                                    <select name="c2g" id="c2g" >
                                        <option value="">Select</option>
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
                                <div class="fg">
                                    <p> Processing Type</p>
                                    <span>
                                        <input type="radio" name="processing" id="std" class="field" value="standard" checked/>
                                        <label for="std">Standard </label>
                                        <input type="radio" name="processing" id="emmer" class="field" value="Emergency"/>
                                        <label for="emer">Emergency</label>
                                    </span>
                                </div>
                                <div class="fg">
                                   <label for="familyname"> Family name <i>(English-Only, Same as Passport)</i></label>
                                   <input type="text" name="familyname" id="familyname" >
                                </div>
                                <div class="fg">
                                   <label for="givenname"> Given name <i>(English-Only, Same as Passport)</i></label>
                                   <input type="text" name="givenname" id="givenname" >
                                </div>
                                <div class="fg">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" id="dob" >
                                </div>
                                <div class="fg">
                                    <label for="pob">Place of Birth</label>
                                    <select name="pob" id="pob" >
                                        <option value="">Select</option>
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
                                <div class="fg">
                                    <p> Sex</p>
                                    <span>
                                        <input type="radio" name="gender" id="male" class="field" value="male" />
                                        <label for="male">Male </label>
                                        <input type="radio" name="gender" id="female" class="field" value="female" />
                                        <label for="female">Female</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="section">
                            <div class="agree">
                                <p>Passport Information</p>
                            </div>
                            <div class="content">
                                <div class="fg">
                                    <label for="nationality">Nationality</label>
                                    <select name="nationality" id="nationality">
                                        <option value="">Select</option>
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
                                <div class="fg">
                                    <label for="countryofpassport">Country of Passport</label>
                                    <select name="countryofpassport" id="countryofpassport" >
                                        <option value="">Select</option>
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
                                <div class="fg">
                                   <label for="passport_number">Passport Number</label>
                                   <input type="text" name="passport_number" id="passport_number" >
                                </div>
                                <div class="fg">
                                    <label for="p_doi">Passport Date of Issue</label>
                                    <input type="date" name="p_doi" id="p_doi" >
                                </div>
                                <div class="fg">
                                    <label for="p_doe">Passport Date of Expiration</label>
                                    <input type="date" name="p_doe" id="p_doe" >
                                </div>
                                <div class="fg">
                                   <label for="issue_auth">Issuing Authority</label>
                                   <input type="text" name="issue_auth" id="issue_auth"  placeholder="Enter the full name of the issuing authority that issued the passport.">
                                </div>
                                <!-- <div class="fg">
                                    <p>Have Other Citizenship ?</p>
                                    <span>
                                        <input type="checkbox" name="citizenshipstatus" id="trigger" class="field" value="yes"/>
                                        <label for="trigger">yes </label>
                                    </span>
                                </div> -->
                                <div class="fg hidden_fields">

                                </div>
                                <!-- <div class="fg hidden_fields">
                                    <label for="citizenship2">Citizenship 2</label>
                                    <select name="citizenship2" id="citizenship2">
                                        <option value="">Select</option>
                                        <option value="1"> Bangladesh</option>
                                    </select>
                                </div>
                                <div class="fg hidden_fields">
                                    <label for="citizenship3">Citizenship 3</label>
                                    <select name="citizenship3" id="citizenship3">
                                        <option value="">Select</option>
                                        <option value="1"> Bangladesh</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>
                        <div class="section">
                            <div class="agree">
                                <p>Contact Information</p>
                            </div>
                            <div class="content">
                                <div class="fg">
                                   <label for="home">Home Address</label>
                                   <input type="text" name="home" id="home" >
                                </div>
                                <div class="fg">
                                   <label for="city">City/Town</label>
                                   <input type="text" name="city" id="city" >
                                </div>
                                <div class="fg">
                                   <label for="state">State/Province/Prefecture</label>
                                   <input type="text" name="state" id="state" >
                                </div>
                                <div class="fg">
                                    <label for="country">Country</label>
                                    <select name="country" id="country" >
                                        <option value="">Select</option>
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
                                <div class="fg">
                                    <p>Phone Number</p>
                                    <span>
                                        <div class="fg">
                                            <label for="ccode">Country Code</label>
                                            <select name="ccode" id="ccode" >
                                                <option value="">Select</option>
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
                                        <div class="fg">
                                            <label for="mobile">Mobile</label>
                                            <input type="tel" name="mobile" id="mobile" >
                                        </div>
                                        <div class="fg">
                                            <label for="tel">Home</label>
                                            <input type="tel" name="tel" id="tel" >
                                        </div>
                                    </span>
                                </div>
                                <div class="fg">
                                   <label for="passport_number">Passport Number</label>
                                   <input type="text" name="passport_number" id="passport_number" >
                                </div>
                                <div class="fg">
                                   <label for="emailaddress">Email Address</label>
                                   <input type="text" name="emailaddress" id="emailaddress" >
                                </div>
                            </div>
                        </div>

                        <div class="button">
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="jumbotron">
                            <h1>Please Check you data again and submit button to push your data</h1>
                        </div>
                        <div class="button">
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
          </div>
        </main>
    <?php include "components/footer.php"; ?>
    </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>
</body>
</html>
<?php

include 'top.php';
include 'email-handler.php';
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//       
print  PHP_EOL . '<!-- SECTION: 1 Initialize variables -->' . PHP_EOL;
// These variables are used in both sections 2 and 3, otherwise we would
// declare them in the section we needed them
print  PHP_EOL . '<!-- SECTION: 1a. debugging setup -->' . PHP_EOL;
// We print out the post array so that we can see our form is working.
// Normally i wrap this in a debug statement but for now i want to always
// display it. when you first come to the form it is empty. when you submit the
// form it displays the contents of the post array.
if (DEBUG){
    print '<p>Path Parts:</p><pre>';
    print_r($path_parts);
    print '<p>Post Array:<br></p><pre>';
    print_r($_POST);
    print '</pre>';
}
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
print PHP_EOL . '<!-- SECTION: 1b form variables -->' . PHP_EOL;
//
// Initialize variables one for each form element
// in the order they appear on the form
$name = "";
$phone = "";
$email = "";
$comments = "";
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
print PHP_EOL . '<!-- SECTION: 1c form error flags -->' . PHP_EOL;
//
// Initialize Error Flags one for each form element we validate
// in the order they appear on the form
$nameERROR = false;
$phoneERROR = false;
$emailERROR = false;
$commentsERROR = false;
////%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
print PHP_EOL . '<!-- SECTION: 1d misc variables -->' . PHP_EOL;
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();

// have we mailed the information to the user, flag variable?
$mailed = false;
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
print PHP_EOL . '<!-- SECTION: 2 Process for when the form is submitted -->' . PHP_EOL;
//
if (isset($_POST["btnSubmit"])) {
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    print PHP_EOL . '<!-- SECTION: 2a Security -->' . PHP_EOL;

    // the url for this form
    $thisURL = $domain . $phpSelf;
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    print PHP_EOL . '<!-- SECTION: 2b Sanitize (clean) data  -->' . PHP_EOL;
    // remove any potential JavaScript or html code from users input on the
    // form. Note it is best to follow the same order as declared in section 1c.
    $name = htmlentities($_POST["txtName"], ENT_QUOTES, "UTF-8");
    $phone = htmlentities($_POST["txtPhone"], ENT_QUOTES, "UTF-8");

    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $comments = htmlentities($_POST["txtComments"], ENT_QUOTES, "UTF-8");

    // YOU WILL NEED TO CHANGE THESE VALUES FOR YOUR OWN DATABASE CREDENTAILS

    $servername = "localhost";
    $username = "matthew_root";
    $password = "matthew";
    $dbname = "matthew_Halligan-Web-Development";
// Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO tblcontactpage (fldFirstName, fldPhone, fldEmail, fldComments)
VALUES ('". $name ."', '". $phone ."', '". $email ."', '". $comments ."')";
    if ($conn->query($sql) === TRUE) {
//        echo "New record created successfully";
    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
//    //end database stuff


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    print PHP_EOL . '<!-- SECTION: 2c Validation -->' . PHP_EOL;
    //
    // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1c and 1d). The if blocks should also be in the
    // order that the elements appear on your form so that the error messages
    // will be in the order they appear. errorMsg will be displayed on the form
    // see section 3b. The error flag ($emailERROR) will be used in section 3c.
    if ($name == "") {
        $errorMsg[] = "Please enter your name";
        $nameERROR = true;
    } elseif (!verifyAlphaNum($name)) {
        $errorMsg[] = "Your name appears to have extra character(s).";
        $nameERROR = true;
    }
    if ($phone == "") {
        $errorMsg[] = "Please enter your phone number";
        $lastNameERROR = true;
    } elseif (!verifyPhone($phone)) {
        $errorMsg[] = "Your phone number appears to have extra character(s).";
        $phoneERROR = true;
    }

    if ($email == "") {
        $errorMsg[] = 'Please enter your email address';
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = 'Your email address appears to be incorrect.';
        $emailERROR = true;
    }
    if ($comments == "") {
        $errorMsg[] = "Please enter your comments/questions";
        $comments = true;
    }
    // } elseif (!verifyAlphaNum($comments)) {
}   // ends if form was submitted.
//#############################################################################
//
print PHP_EOL . '<!-- SECTION 3 Display Form -->' . PHP_EOL;
//
?>



<?php
if (isset($_POST["btnSubmit"])){
    // Checking For Blank Fields..
    if($_POST["txtName"]==""||$_POST["txtEmail"]==""||$_POST["txtPhone"]==""||$_POST["txtComments"]==""){
        echo "Fill All Fields..";
    }else{
        // Check if the "Sender's Email" input field is filled out
        $email=$_POST['txtEmail'];
        // Sanitize E-mail Address
        $email =filter_var($email, FILTER_SANITIZE_EMAIL);
        // Validate E-mail Address
        $email= filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email){
            echo "Invalid Sender's Email";
        }
        else{
            $subject = "New Website Contact";
            $message = "Name: " . $_POST["txtName"] . "\n"
                ."Email: " . $_POST["txtEmail"] . "\n"
                ."Phone: " . $_POST["txtPhone"] . "\n"
                ."Comments: " . $_POST['txtComments'];
            $headers = 'From: '. $email . "\n"; // Sender's Email
            $headers .= 'Cc: '. $email . "\n"; // Carbon copy to Sender

            // Message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70);
            // Send Mail By PHP Mail Function
            mail("matt@halliganwebdevelopment.com", $subject, $message, $headers);
            echo "Your mail has been sent successfuly ! Thank you for your feedback";
        }
    }
}
?>
<main class="container-fluid" id="main-contact">
    <article class="contact-intro">
        <h2>Contact Us</h2>
        <p>
            Halligan Web Development is here to help educate and bring all of your ideas to fruition.
            Please fill out the form below and we can assure you that we will answer all of your questions as soon as we can.
        </p>
    </article>
    <article>
        <h6 class="hide" >Hello</h6>
        <?php
        //####################################
        //
        print PHP_EOL . '<!-- SECTION 3a  -->' . PHP_EOL;
        //
        // If its the first time coming to the form or there are errors we are going
        // to display the form.

        if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
            print '<h2>Thank you for reaching out to us! We will get back to you as soon as possible!</h2>';
        } else {
            //####################################
            //
            print PHP_EOL . '<!-- SECTION 3b Error Messages -->' . PHP_EOL;
            //
            // display any error messages before we print out the form

            if ($errorMsg) {
                print '<div id="errors">' . PHP_EOL;
                print '<h2>Your form has the following mistakes that need to be fixed.</h2>' . PHP_EOL;
                print '<ol>' . PHP_EOL;
                foreach ($errorMsg as $err) {
                    print '<li>' . $err . '</li>' . PHP_EOL;
                }
                print '</ol>' . PHP_EOL;
                print '</div>' . PHP_EOL;
            }
            //####################################
            //
            print PHP_EOL . '<!-- SECTION 3c html Form -->' . PHP_EOL;
            //
            /* Display the HTML form. note that the action is to this same page. $phpSelf
                is defined in top.php
                NOTE the line:
                value="<?php print $email; ?>
                this makes the form sticky by displaying either the initial default value (line ??)
                or the value they typed in (line ??)
                NOTE this line:
                <?php if($emailERROR) print 'class="mistake"'; ?>
                this prints out a css class so that we can highlight the background etc. to
                make it stand out that a mistake happened here.
           */
            ?>



            <form action = "<?php print $phpSelf; ?>"
                  id = "frmRegister"
                  method = "post">

                <fieldset class = "contact">
                    <legend>Contact Information</legend>
                    <p>
                        <label class="required" for="txtName">Name</label>
                        <input autofocus
                            <?php if ($nameERROR) print 'class="mistake"'; ?>
                               id="txtName"
                               maxlength="45"
                               name="txtName"
                               onfocus="this.select()"
                               placeholder="Enter your name"
                               tabindex="100"
                               type="text"
                               value="<?php print $name; ?>"
                        >
                    </p>

                    <p>
                        <label class="required" for="txtPhone">Phone Number</label>
                        <input
                            <?php if ($phoneERROR) print 'class="mistake"'; ?>
                                id="txtPhone"
                                maxlength="45"
                                name="txtPhone"
                                onfocus="this.select()"
                                placeholder="Enter your phone number"
                                tabindex="100"
                                type="text"
                                value="<?php print $phone; ?>"
                        >
                    </p>

                    <p>
                        <label class = "required" for = "txtEmail">Email</label>
                        <input
                            <?php if ($emailERROR) print 'class="mistake"'; ?>
                                id = "txtEmail"
                                maxlength = "45"
                                name = "txtEmail"
                                onfocus = "this.select()"
                                placeholder = "Enter your email address"
                                tabindex = "120"
                                type = "text"
                                value = "<?php print $email; ?>"
                        >
                    </p>

                    <!-- ##################### START TEXTAREA ################### -->
                    <p class ="textarea">
                        <label for="txtComments">Comments/Questions</label><br/>
                        <textarea <?php if ($commentsERROR) print 'class="mistake problem"'; ?>
                    id="txtComments"
                    name="txtComments"
                    onfocus="this.select()"
                    placeholder="Enter your comments/questions or concerns"
                    tabindex="460"><?php print $comments; ?></textarea>
                    </p>
                </fieldset> <!-- ends contact -->

                <fieldset class="buttons">
                    <legend></legend>
                    <input class = "button" id = "btnSubmit" name = "btnSubmit" tabindex = "900" type = "submit" value = "Submit" >
                </fieldset> <!-- ends buttons -->
            </form>
            <?php
        } // ends body submit
        ?>
    </article>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
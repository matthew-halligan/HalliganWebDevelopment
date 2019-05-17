<?php
//%^%^%^%^%^%^%^%^%^%^%//       
print  PHP_EOL . '<!-- SECTION: 1 Initialize variables -->' . PHP_EOL; // These variables are used in both sections 2 and 3, otherwise we would
// declare them in the section we needed them

print  PHP_EOL . '<!-- SECTION: 1a. debugging setup -->' . PHP_EOL;
// We print out the post array so that we can see our form is working.
// Normally i wrap this in a debug statement but for now i want to always
// display it. when you first come to the form it is empty. when you submit the
// form it displays the contents of the post array.
if ($debug){ 
    print '<p>Post Array:</p><pre>';
    print_r($_POST);
    print '</pre>';
}

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%//
print PHP_EOL . '<!-- SECTION: 1b form variables -->' . PHP_EOL;
//
// Initialize variables one for each form element
// in the order they appear on the form
$email = "";     

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%//
print PHP_EOL . '<!-- SECTION: 1c form error flags -->' . PHP_EOL;
//
// Initialize Error Flags one for each form element we validate
// in the order they appear on the form
$emailERROR = false;       

////%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
print PHP_EOL . '<!-- SECTION: 1d misc variables -->' . PHP_EOL;
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();       
 
// have we mailed the information to the user, flag variable?
$mailed = false;       

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@//
print PHP_EOL . '<!-- SECTION: 2 Process for when the form is submitted -->' . PHP_EOL;
//
if (isset($_POST["btnSubmitSignUp"])) {
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
    $email = filter_var($_POST["txtEmailSignUp"], FILTER_SANITIZE_EMAIL);
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
    if ($email == "") {
        $errorMsg[] = 'Please enter your email address';
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {       
        $errorMsg[] = 'Your email address appears to be incorrect.';
        $emailERROR = true;    
    }    
    
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    print PHP_EOL . '<!-- SECTION: 2d Process Form - Passed Validation -->' . PHP_EOL;
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //    
    if (!$errorMsg) {
        if ($debug)
                print '<p>Form is valid</p>';
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        print PHP_EOL . '<!-- SECTION: 2e Save Data -->' . PHP_EOL;
        //
        // This block saves the data to a CSV file.   
        
        // array used to hold form values that will be saved to a CSV file
        $dataRecord = array();       
        
        // assign values to the dataRecord array
        $dataRecord[] = $email;



    
$servername = "localhost";
$username = "harryptt_142user";
$password = "142user";
$dbname = "harryptt_CS142Final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tblEmails (fldEmails)
VALUES ('". $email ."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    
        // // setup csv file
        // $myFolder = 'data/';
        // $myFileName = 'registration';
        // $fileExt = '.csv';
        // $filename = $myFolder . $myFileName . $fileExt;
    
        // if ($debug) print PHP_EOL . '<p>filename is ' . $filename;
    
        // // now we just open the file for append
        // $file = fopen($filename, 'a');
    
        // // write the forms informations
        // fputcsv($file, $dataRecord);
    
        // // close the file
        // fclose($file);       
    
     
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        print PHP_EOL . '<!-- SECTION: 2f Create message -->' . PHP_EOL;
        //
        // build a message to display on the screen in section 3a and to mail
        // to the person filling out the form (section 2g).

        $message = '<h2>Your  information.</h2>';       

        foreach ($_POST as $htmlName => $value) {
            $message .= '<p>';
            // breaks up the form names into words. for example
            // txtFirstName becomes First Name       
            $camelCase = preg_split('/(?=[A-Z])/', substr($htmlName, 3));
            foreach ($camelCase as $oneWord) {
                $message .= $oneWord . ' ';
            }
            $message .= ' = ' . htmlentities($value, ENT_QUOTES, "UTF-8") . '</p>';
        }
        
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        print PHP_EOL . '<!-- SECTION: 2g Mail to user -->' . PHP_EOL;
        //
        // Process for mailing a message which contains the forms data
        // the message was built in section 2f.
        $to = $email; // the person who filled out the form     
        $cc = '';       
        $bcc = '';

        $from = 'WRONG site <customer.service@your-site.com>';

        // subject of mail should make sense to your form
        $subject = 'Groovy: ';

        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);

    } // end form is valid     

}   // ends if form was submitted.



//#############################################################################
//
print PHP_EOL . '<!-- SECTION 3 Display Form -->' . PHP_EOL;
//
?>       
<footer class="footer navbar-fixed-bottom">
        <article class="sign-up">
            <h6 class="hide" >Hello</h6>
            <p>Stay connected; join our newsletter</p>
    <?php
    //####################################
    //
    print PHP_EOL . '<!-- SECTION 3a  -->' . PHP_EOL;
    // 
    // If its the first time coming to the form or there are errors we are going
    // to display the form.
    
    if (isset($_POST["btnSubmitSignUp"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
        // print '<p>For your records a copy of this data has ';
        // if (!$mailed) {    
        //     print "not ";         
        // }
    
        // print 'been sent:</p>';
        // print '<p>To: ' . $email . '</p>';
    
        // print $message;
    } else {
     // print '<p class="form-heading">Your information will greatly help us with our research.</p>';
     
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
          id = "frmSignUp"
          method = "post"
          class = "sign-upForm">
          <p class="row">
            <input 
               <?php if ($emailERROR) print 'class="mistake"'; ?>
                                   id = "txtEmailSignUp"     
                                   maxlength = "45"
                                   name = "txtEmailSignUp"
                                   onfocus = "this.select()"
                                   placeholder = "Enter your email address"
                                   tabindex = "120"
                                   type = "text"
                                   value = "<?php print $email; ?>"
                            >
                            <input class = "button" id = "btnSubmitSignUp" name = "btnSubmitSignUp" tabindex = "900" type = "submit" value = "Sign Up" >
                    </p>
</form>     
<?php
    } // ends body submit
?>
        </article> 

<!-- END OF EMAIL SIGN UP -->

    <section class="row divFooter">
        <h6 class="hide" >Hello</h6>
        <article class="col-sm-4 ">
            <h4 class="">Contact Us</h4>
            <address>250 Colchester Ave, <br>
                Burlignton, VT,05405.
            </address>

            <ul>
                <li><a href="mailto:nana.nimako@uvm.edu" class="fa fa-envelope">help@tsnindustries.tech</a></li>

                <li><a href="#" class="fa fa-phone">(347) 430 - 2193</a></li>
            </ul>
            
        </article>
        <article class="col-sm-4 ">
            <h4 class="">Navigation</h4>
            <ul class="fNav">
                <?php
                if ($path_parts['dirname'] == "/cs142/dev-final/require_login") {
                    print '<li><a href="../index.php">Home</a></li>';
                    print '<li><a href="../portfolio.php">Portfolio</a></li>';
                    print '<li><a href="../about.php">About Us</a></li>';
                    print '<li><a href="../blog.php">Blog</a></li>';
                    print '<li><a href="../contact.php">Contact Us</a></li>';
                    print '<li><a href="../faq.php">FAQs</a></li>';
                    
                    if($isAdmin){
                        print '<li><a href="../admin.php">Admin</a></li>';
                    }
                
                }else{
                    print '<li><a href="index.php">Home</a></li>';
                    print '<li><a href="portfolio.php">Portfolio</a></li>';
                    print '<li><a href="about.php">About Us</a></li>';
                    print '<li><a href="blog.php">Blog</a></li>';
                    print '<li><a href="contact.php">Contact Us</a></li>';
                    print '<li><a href="faq.php">FAQs</a></li>';
                    
                    if($isAdmin){
                        print '<li><a href="require_login/admin.php">Admin</a></li>';
                    }
                }
                ?>
            </ul>
        </article>

            <hr>
        <article class="connect col-sm-4">
            <h4>Connect With Us:</h4>
            <ul class="row">
                <li class="col-sm-6"><a href="https://fb.com" class="fa fa-facebook"></a>facebook</li>
                <li class="col-sm-6"><a href="https://instagram.com" class="fa fa-instagram"></a>instagram</li>
            </ul>
            <ul class="row">
                <li class="col-sm-6"><a href="https://linkedin.com" class="fa fa-linkedin"></a>linkedin</li>
                <li class="col-sm-6"><a href="https://google.com" class="fa fa-google"></a>google</li>
            </ul>
        </article> 
    </section>
    <span>&COPY; Copyrights. All Rights Reserved</span> <br>
    <span><a href="require_login/admin.php" style="font-size:0.6em">Admin</a></span>  
</footer>
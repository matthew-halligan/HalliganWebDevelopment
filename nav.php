<!-- ######################     Main Navigation   ########################## -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    <!-- When the page resizes for a dropdown button -->
    <?php
    if ($path_parts['dirname'] == "/cs142/thecnbswapper/require_login") {
    print '<a href="../index.php"><img src="../images/logo.png" alt=""></a>';
    }  else {
    print '<a href="index.php"><img src="images/logo.png" alt="" class="width-limiter"></a>';
    } 
    ?>
    <button class="navbar-toggler float-right" type="button" 
            data-toggle="collapse" data-target="#navbarNavDropdown" 
            aria-controls="navbarNavDropdown" aria-expanded="false" 
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- End of dropdown button clicker -->

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ol class="navbar-nav justify-content-center">
            <?php
            // Repeat this if block for each menu item 
            // designed to give the current page a class but also allows
            // you to have more classes if you need them
            
            /*Home*/
            if ($path_parts['dirname'] == "/cs142/dev-final/require_login") {
                print '<li class="';
                if ($path_parts['filename'] == "index") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>';
                print '</li>';
                
                
                /*Portfolio*/
                print '<li class="';
                if ($path_parts['filename'] == "portfolio") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="../portfolio.php">Portfolio</a>';
                print '</li>';
                
                /*About US*/
                print '<li class="';
                if ($path_parts['filename'] == "about") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="../about.php">About Us</a>';
                print '</li>';
                
                /*Blog*/
                print '<li class="';
                if ($path_parts['filename'] == "blog") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="../blog.php">Blog</a>';
                print '</li>';

                /*Contact US*/
                print '<li class="';
                if ($path_parts['filename'] == "contact") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="../contact.php">Contact Us</a>';
                print '</li>';

                /*Central*/
                print '<li class="';
                if ($path_parts['filename'] == "faq") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="../faq.php">FAQs</a>';
                print '</li>';

                
            } else {

                /* This is where the code starts for actual nav. Upper is for CS Class */


                /*Home*/
                print '<li class="';
                if ($path_parts['filename'] == "index") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>';
                print '</li>';

                /*Portfolio*/
                print '<li class="';
                if ($path_parts['filename'] == "portfolio") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="portfolio.php">Portfolio</a>';
                print '</li>';
                
                /*About US*/
                print '<li class="';
                if ($path_parts['filename'] == "about") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="about.php">About Us</a>';
                print '</li>';
                
                /*Blog*/
//                print '<li class="';
//                if ($path_parts['filename'] == "blog") {
//                    print ' activePage ';
//                }
//                print ' nav-item">';
//                print '<a class = "nav-link" href="blog.php">Blog</a>';
//                print '</li>';

                /*Contact US*/
                print '<li class="';
                if ($path_parts['filename'] == "contact") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="contact.php">Contact Us</a>';
                print '</li>';

                /*faq*/
                print '<li class="';
                if ($path_parts['filename'] == "faq") {
                    print ' activePage ';
                }
                print ' nav-item">';
                print '<a class = "nav-link" href="faq.php">FAQs</a>';
                print '</li>';

                
        
                }
            ?>
        </ol>
    </div>
</nav>
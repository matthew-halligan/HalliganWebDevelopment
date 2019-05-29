<footer class="page-footer footer navbar-fixed-bottom">
  <section class="container-fluid text-center text-md-left">
    <section class="row">
      <section class="col-md-6">
        <h5 class="text-uppercase">Contact Us</h5>
        <address>10 Shelby Drive <br>
                Wallingford, CT,06492.
            </address>
        <li><a href="mailto:matt@halliganwebdevelopment.com"></p>matt@halliganwebdevelopment.com</a></li>
        <li><a href="tel:2036261748">(203) 626 - 1748</a></li>

      </section>
      <section class="col-md-3">

        <h5>Navigation</h5>

        <ul class="list-unstyled">
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
                    //print '<li><a href="blog.php">Blog</a></li>';
                    print '<li><a href="contact.php">Contact Us</a></li>';
                    print '<li><a href="faq.php">FAQs</a></li>';
                    
                    if($isAdmin){
                        print '<li><a href="require_login/admin.php">Admin</a></li>';
                    }
                }
                ?>
        </ul>

      </section>

      <section class="col-md-3">
      <ul class="row">
                <li class="col-sm-6 footer-social-icons"><a href="https://www.facebook.com/profile.php?id=100004473738754" class="fa fa-facebook fa-3x"></a></li>
                <li class="col-sm-6 footer-social-icons"><a href="https://instagram.com/halliganwebdev" class="fa fa-instagram fa-3x"></a></li>
            </ul>
            <ul class="row">
                <li class="col-sm-6 footer-social-icons"><a href="https://www.linkedin.com/in/matthew-halligan-a56002187/" class="fa fa-linkedin fa-3x"></a></li>
                <li class="col-sm-6 footer-social-icons"><a href="https://www.youtube.com/channel/UCZ8pkwlGqt-19A5z86P98tQ?view_as=subscriber" class="fa fa-youtube fa-3x"></a></li>
            </ul>
      </section>

    </section>

  </section>

  <section class="text-center copyright">© Copyright Halligan Web Development. All Rights Reserved </section>

</footer>

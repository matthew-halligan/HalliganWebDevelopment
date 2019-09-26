<?php
include "top.php";
?>
<main class="container-fluid" id="main-about">
<div class="services">
<h1>What We Do</h1>
</div>
<div class="servicesTable table-responsive">
<table class="table content-table">
    <thead id="services-table-header">
      <tr >
        <th><a href="#" id="seo" class="local-nav-font">SEO Education Package</a></th>
        <th><a href="#" id="web" class="local-nav-font">Web Design & Development</a></th>
        <th><a href="#" id="hosting" class="local-nav-font">Hosting Plans</a></th>
        <th><a href="#" id="maintain" class="local-nav-font">maintenance</a></th>
      </tr>
    </thead>
</table></div>
<div class="col-md-12 buildingYourPresence">
<article>
        <h2>Building Your Presence</h2>
        <p class="buildingYourPresenceText">
            Halligan Web Development has a lot to offer. Our Work is designed to be used easily by all age groups with varying
            degrees of computer abilities with accessibility and usability being the top priority.  We ensure that we
            will work our hardest to help you achieve your goals!
        </p>
</article>
</div><hr>
<div class="educationPackage">
    <div class="row">
        <div class="col-md-6 seoVideoClass">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6">
        <div class="seoEducationPackage">
            <article>
                <h2>SEO Education Package</h2>
                <p class="seoEducationPackageText">
                    Halligan Web Development has a lot to offer. Our Work is designed to be used easily by all age groups with varying
                    degrees of computer abilities with accessibility and usability being the top priority.  We ensure that we
                    will work our hardest to help you achieve your goals!
                </p>
            </article>
        </div>       
        </div>
    </div>
</div><hr>
<div class="webDesignAndDevelopment">
    <article>
        <h2>Web Design & Development</h2>
            <p class="webDesigAndDevelopmentText">
            Halligan Web Development has a lot to offer. Our Work is designed to be used easily by all age groups with varying
            degrees of computer abilities with accessibility and usability being the top priority.  We ensure that we
            will work our hardest to help you achieve your goals!
            </p>
    </article>
</div><hr>
<div class="hostingPlans">
<section class="pricing py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <h2>Hosting Plans</h2>
            <table class="table table-bordered">
            <thead>
              <tr>
                <th class="table-header">Features</th>
                <th class="table-header">Basic</th>
                <th class="table-header">Standard</th>
                <th class="table-header">Pro</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Hosting Files</td>
                <td><i class="fa fa-check check"></i></td>
                <td><i class="fa fa-check check"></i></td>
                <td><i class="fa fa-check check"></i></td>
              </tr>
              <tr>
                <td>Server Space</td>
                <td></i>2GB</td>
                <td></i>5GB</td>
                <td></i>15GB</td>
              </tr>
              <tr>
                  <td>Bandwidth Allotment</td>
                  <td>20GB/Month</td>
                  <td>50GB/Month</td>
                  <td>150GB/Month</i></td>
              </tr>
              <tr>
                <td>Cpanel Access</td>
                <td><i class="fa fa-check check"></i></td>
                <td><i class="fa fa-check check"></i></td>
                <td><i class="fa fa-check check"></i></td>
              </tr>
              <tr>
                  <td>Domain Management</td>
                  <td><i class="fa fa-check check"></i></td>
                  <td><i class="fa fa-check check"></td>
                  <td><i class="fa fa-check check"></i></td>
              </tr>
              <tr>
                <td>Performance Statistics</td>
                <td><i class="fa fa-times cross"></i></td>
                <td><i class="fa fa-check check"></td>
                <td><i class="fa fa-check check"></i></td>
              </tr>
              <tr>
                  <td>Domain Parking</td>
                  <td>0</td>
                  <td>5</td>
                  <td>Unlimited</td>
              </tr>
              <tr>
                  <td>Email Accounts</td>
                  <td>$5/Account</td>
                  <td>5</td>
                  <td>15</td>
              </tr>
              <tr>
                  <td>SSL Certifications</td>
                  <td><i class="fa fa-times cross"></i></td>
                  <td><i class="fa fa-check check"></td>
                  <td><i class="fa fa-check check"></i></td>
              </tr>
              <tr>
                  <td>Monthly Site Backups</td>
                  <td><i class="fa fa-times cross"></i></td>
                  <td><i class="fa fa-times cross"></td>
                  <td><i class="fa fa-check check"></i></td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="col-md-4">
      
      </div>
    </div>
  </div>
</section>
</div><hr>
<div class="maintenancePlan">
    <div class="row">
      <div class="col-md-6 maintenancePlanDiv">
        <article>
          <h2>Maintenance Plan</h2>
              <p class="maintenancePlanText">
              Halligan Web Development has a lot to offer. Our Work is designed to be used easily by all age groups with varying
              degrees of computer abilities with accessibility and usability being the top priority.  We ensure that we
              will work our hardest to help you achieve your goals!
              </p>
        </article>
        </div>
        <div class="col-md-6">
          <div class="maintainImage">
            <img src="images/maintain.jpg" alt="Maintenance Image" class="img-fluid">
          </div>
        </div>
    </div>
</div>
</main>
<?php include "footer.php"; ?>
<script>
        $(document).ready(function () {
        $('#seo').click(function() {
        $('html, body').animate({
        scrollTop: $("div.seoEducationPackage").offset().top
        }, 1000)
        });
        $('#web').click(function() {
        $('html, body').animate({
        scrollTop: $("div.webDesignAndDevelopment").offset().top
        }, 1000)
        });
        $('#hosting').click(function() {
        $('html, body').animate({
        scrollTop: $("div.hostingPlans").offset().top
        }, 1000)
        });
        $('#maintain').click(function() {
        $('html, body').animate({
        scrollTop: $("div.maintenancePlan").offset().top
        }, 1000)
        });
    });
</script>
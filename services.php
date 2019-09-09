<?php
include "top.php";
?>
<main class="container-fluid" id="main-about">
<div class="services">
<h1>What We Do</h1>
</div>
<div class="servicesTable table-responsive">
<table class="table content-table">
    <thead>
      <tr>
        <th><a href="#" id="seo">SEO Education Package</a></th>
        <th><a href="#" id="web">Web Design & Development</a></th>
        <th><a href="#" id="hosting">Hosting Plans</a></th>
        <th><a href="#" id="maintain">maintenance</a></th>
      </tr>
    </thead>
</table></div>
<div class="buildingYourPresence">
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
<h2>Hosting Plans</h2>
<section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-3">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Features</h5>
            <hr>
            <ul class="fa-ul">
              <li>Feature 1</li>
              <li>Feature 2</li>
              <li>Feature 3</li>
              <li>Feature 4</li>
              <li>Feature 5</li>
              <li>Feature 6</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-3">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Basic</h5>
            <h6 class="card-price text-center">$9<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Apply</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-3">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Standard</h5>
            <h6 class="card-price text-center">$9<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Apply</a>
          </div>
        </div>
      </div>
       <!-- Tier -->
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Premium</h5>
            <h6 class="card-price text-center">$49<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
              <li><i class="fas fa-check"></i></li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Apply</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div><hr>
<div class="maintenancePlan">
    <article>
        <h2>Maintenance Plan</h2>
            <p class="maintenancePlanText">
            Halligan Web Development has a lot to offer. Our Work is designed to be used easily by all age groups with varying
            degrees of computer abilities with accessibility and usability being the top priority.  We ensure that we
            will work our hardest to help you achieve your goals!
            </p>
    </article>
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
<?php
include "top.php";
?>






<main class="container-fluid" id="main-blog">
	<section id="blog-section" class="row">
    <h6 class="hide" >Hello</h6>
		<article class="col-sm-2">
      <h6 class="hide" >Hello</h6>
			<article class="card">
        <h6 class="hide" >Hello</h6>
			  	<img src="images/3ofuspic.jpeg" class="card-img-top round-image" alt="...">
			  	<article class="card-body">
            <h6 class="hide" >Hello</h6>
			    	<p class="card-text">Company Camping Trip Above - Hey! We'll be posting both written and video blogs here on a variaty of subjects. Check out the few we've got up right now, they are all video blogs but once we work on more projects we'll show off some new technology and techniques we use!</p>
			  	</article>
			</article>
		</article>

<!-- //THERE ARE A BUNCH OF H6 TAGS WITH HELLO PRINTED TO PASS VALIDATION -->

		<article class="col-sm-8">
      <h6 class="hide" >Hello</h6>

<!-- 
THIS IS A TEMPLATE OF EACH CARD, THEY WILL ALL COME OUT WITH THE HTML LOOKING LIKE THIS

			<article class="card mb-3">
        <h6 class="hide" >Hello</h6>
  				<article class="row no-gutters">
            <h6 class="hide" >Hello</h6>
				    <article class="col-md-4">
              <h6 class="hide" >Hello</h6>
				    	<iframe  src="https://www.youtube.com/embed/uaNTMtJxR1k"  allowfullscreen></iframe>  
			      	</article>
    				<article class="col-md-8">
              <h6 class="hide" >Hello</h6>
      					<article class="card-body">
        					<h5 class="card-title">Summer Internship Vlog</h5>
    						<p class="card-text">Check out my video about my summer internship with the UVM Wellness Environment. During my time there I advised on the UVM WE App used campus wide by thousands of students. Collaborated with other students to create an app for Dr. James Hudziak, creator and director of the Wellness Environment, for automatic attendance tracking.</p>

    						<a href="#">Read more...</a>
        				</article>
    				</article>
  				</article>
			</article> -->



<?php

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

$sql = "SELECT fnkId, fldUrl, fldTitle, fldDescription FROM tblBlogs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			echo '<article class="card mb-3">';
			echo '<h6 class="hide" >Hello</h6>';
			echo '<article class="row no-gutters">';
			echo '<h6 class="hide" >Hello</h6>';
			echo '<article class="col-md-4">';
			echo '<h6 class="hide" >Hello</h6>';
			echo '<iframe  src="' . $row["fldUrl"]. '"  allowfullscreen></iframe>'; //THE URL NEEDS TO BE AN EMBED URL LIKE https://www.youtube.com/embed/gFGuQp9Vde8
			echo '</article>';
			echo '<article class="col-md-8">';
			echo '<h6 class="hide" >Hello</h6>';
			echo '<article class="card-body">';
			echo '<h5 class="card-title">' . $row["fldTitle"]. '</h5>';
			echo '<p class="card-text">' . $row["fldDescription"]. '</p>';
			echo '<a href="' . $row["fldUrl"]. '">Read more...</a>';
			echo '</article>';
			echo '</article>';
			echo '</article>';
			echo '</article>';

        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();



?>


		</article>
	</section>
</main>

<?php include "footer.php"; ?>
</body>
</html>
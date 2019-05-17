<?php
include '../top.php';
//##############################################################################
//
// This page lists the records based on the query given
// 
//##############################################################################
$records = '';

$query = 'SELECT pmkContactId, fldFirstName, fldLastName, fldEmail, fldComments ';
$query .= 'FROM tblContactPage ORDER BY fldLastName';

if ($thisDatabaseReader->querySecurityOk($query, 0, 1)) {
    $query = $thisDatabaseReader->sanitizeQuery($query);
    $records = $thisDatabaseReader->select($query, '');
    
}

if (DEBUG) {
    print '<p>Contents of the array<pre>';
    print_r($records);
    print '</pre></p>';
}

if($isAdmin == true){
    print '<span>Welcome, ' . strtoupper(substr($adminUsername, 1)) .'</span>';
    print '<h3>List Of People That Have Filled Out Our Form</h3>';
    print '<table>';
        print '<thead>';
            print'<tr>';
                print'<th scope="col">First Name</th>';
                print'<th scope="col">Last Name</th>';
                print'<th scope="col">Email</th>';
                print'<th scope="col">Question/Comments</th>';
                print'<th scope="col">Status</th>';
            print'</tr>';
        print'</thead>';

        print '<tbody>';
            if (is_array($records)) {
                foreach ($records as $record) {
                    print '<tr>';
                        print '<td>' . $record[1] .'</td>';
                        print '<td>' . $record[2] .'</td>';
                        print '<td>' . $record[3] .'</td>';
                        print '<td>' . $record[4] .'</td>';
                        print '<td><a href="mailto:'; 
                        print  $record[3] . '">Reply</a></td>';
                    print '</tr>';
            }
        print'</tbody>'; 
        print '</table>';
    }
    }else{
        print'<article><h1>You Do Not Have Access To This Page!</h1></article>';
    }
    ?>
</body>

    <?php
include '../footer.php';
?>

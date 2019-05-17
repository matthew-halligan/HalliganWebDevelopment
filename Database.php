<?php
class Database {

    public $db;
    const DB_DEBUG = false;

    public function __construct($dbUserName, $whichPass, $dbName) {
        $this->db = null;
        $this->connect($dbUserName, $whichPass, $dbName);
    }

    private function connect($dbUserName, $whichPass, $dbName) {

        require('pass.php');

        switch ($whichPass) {
            case 'a':
                $dbUserPass = $dbAdmin;
                break;
            case 'r':
                $dbUserPass = $dbReader;
                break;
            case 'w':
                $dbUserPass = $dbWriter;
                break;
        }

        $query = NULL;

        $dsn = 'mysql:host=webdb.uvm.edu;dbname=';

        if (self::DB_DEBUG) {
            print '<p>Username: ' . $dbUserName;
            print '<p>DSN: ' . $dsn . $dbName;
            print '<p>PW: ' . $whichPass;
        }

        try {
            if (!$this->db)
                $this->db = new PDO($dsn . $dbName, $dbUserName, $dbUserPass);
            if (!$this->db) {
                if (self::DB_DEBUG)
                    echo '<p>You are NOT connected to the database!</p>';
                return 0;
            } else {
                if (self::DB_DEBUG)
                    echo '<p>You are connected to the database!</p>';
                return $this->db;
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            if (self::DB_DEBUG)
                echo "<p>A An error occurred while connecting to the database: $error_message </p>";
        }
        return $this->db;
    }

    // #########################################################################
    // counts the number of conditional statements in the query
    // its tricky since OR is in ORDER as is AND is in LAND etc.
    // AND, &&  Logical AND
    // NOT, !   Negates value
    // ||, OR   Logical OR
    // XOR
    private function countConditions($query) {
        $conditions = 0;
        $andCount = 0;
        $notCount = 0;
        $orCount = 0;
        $xorCount = 0;

        $andCount = substr_count(strtoupper($query), ' AND ');
        $andCount = $andCount + substr_count(strtoupper($query), ')AND');
        $andCount = $andCount + substr_count(strtoupper($query), '&&');
 $notCount = substr_count(strtoupper($query), ' NOT');
        $notCount = $notCount + substr_count(strtoupper($query), ')NOT');
        $notCount = $notCount + substr_count(strtoupper($query), '!');

        $orCount = substr_count(strtoupper($query), ' OR');
        $orCount = $orCount + substr_count(strtoupper($query), ')OR');
        $orCount = $orCount + substr_count(strtoupper($query), '||');

        $xorCount = substr_count(strtoupper($query), ' XOR');

        $countConditions = $andCount + $notCount + $orCount + $xorCount;

        return $countConditions;
    }

    // #########################################################################
    // counts the number of quotes, single and double  plus html entity
    // equivalents found in your query.
    private function countQuotes($query) {
        $quoteCount = 0;
        $singleCount = 0;
        $doubleCount = 0;
        $singleEntityCount = 0;
        $doubleEntityCount = 0;
        $HTMLentityCount = 0;

        $singleCount = substr_count(strtoupper($query), "'");
        $doubleCount = substr_count(strtoupper($query), '"');
        $singleEntityCount = substr_count(strtoupper($query), '#39');
        $doubleEntityCount = substr_count(strtoupper($query), '#34');
        $HTMLentityCount = substr_count(strtoupper($query), '&QUOT');

        $quoteCount = $singleCount + $doubleCount + $singleEntityCount + $doubleEntityCount + $HTMLentityCount;

        return $quoteCount;
    }


    // #########################################################################
    // counts the number of semi-colon' clause's in the query.
    //
    private function countSemiColons($query) {
        $semiColonCount = 0;

        $semiColonCount = substr_count($query, ';');

        return $semiColonCount;
    }


    // #########################################################################
    // counts the number of symbols, mostly < and > which would be convereted to
    // html entites in the method sanitize query if we dont flag them.
    private function countSymbols($query) {
        $symbolCount = 0;
        $ltCount = 0;
        $gtCount = 0;

        $ltCount = substr_count(strtoupper($query), '<');
        $gtCount = substr_count(strtoupper($query), '>');

        $symbolCount = $ltCount + $gtCount;

        return $symbolCount;
    }

    // #########################################################################
    // counts the number of where clauses in the query. a select in a select
    // will often have two where clauses (one for each query)
    private function countWhere($query) {
        $whereCount = 0;

        $whereCount = substr_count(strtoupper($query), ' WHERE ');
                                                                          
        return $whereCount;
    }

    // #########################################################################
    // Performs a delete query and returns boolean true or false based on
    // success of query.
    public function delete($query, $values = '') {
        $success = false;

        $statement = $this->db->prepare($query);

        if (is_array($values)) {
            $success = $statement->execute($values);
        } else {
            $success = $statement->execute();
        }

        $statement->closeCursor();

        return $success;
    }

    //############################################################################
    // Performs an insert query and returns boolean true or false based on success
    // of query.
    public function insert($query, $values = '') {
        $success = false;

        $statement = $this->db->prepare($query);

        if (is_array($values)) {
            $success = $statement->execute($values);
        } else {
            $success = $statement->execute();
        }

        $statement->closeCursor();

        return $success;
    }

    // #########################################################################
    // Used the get the value of the autonumber primary key on the last insert
    // sql statement you just performed
    public function lastInsert() {
        $query = 'SELECT LAST_INSERT_ID()';

        $statement = $this->db->prepare($query);

        $statement->execute();

        $recordSet = $statement->fetchAll();

        $statement->closeCursor();

        if ($recordSet)
            return $recordSet[0]['LAST_INSERT_ID()'];

        return -1;
    }

    // #########################################################################
    //
    // Hackers try to add more where clauses and conditions so this is an
    // attempt to not let them.
    //
    // $totalWhereClause is the total number of WHERE statements in the query,
    // generally you have one but a select in a select is common so you could
    // have more than one.
    //
    // $totalConditions is how many AND, &&, OR, ||, NOT, !, XOR are in the $query
    // however the nature i search for this the word ORDER counts as a condition
    //
                                                   public function querySecurityOk($query, $totalWhereClause = 1, $totalConditions = 0, $totalQuotes = 0, $totalSymbols = 0, $totalSemiColons=0) {
        if ($totalWhereClause != $this->countWhere($query)) {
            return false;
        }

        if ($totalConditions != $this->countConditions($query)) {
            return false;
        }

        if ($totalQuotes != $this->countQuotes($query)) {
            return false;
        }

        if ($totalSymbols != $this->countSymbols($query)) {
            return false;
        }

        if ($totalSemiColons != $this->countSemiColons($query)) {
            return false;
        }
        return true;
    }


    // #########################################################################
    // attempt to sanitize queries
    // An attempt to stop Hackers as they try to end statments with a semi colon
    // so I replace those with the letter Q (could be anything) which allows the
    // query to execute but it will fail returning nothing.
    // spaces in this conext refer to %20 and most likely will not be in your
    // query but is commonly seen in urls where a person named their file with
    //a blank space like bob erickson.php sometimes we need to have quotes in
    // our query but they are also a common entry point for hackers so be carefull
    function sanitizeQuery($query, $areSpacesAllowed = false, $areSemiColonAllowed = false, $areQuotesAllowed = false) {
        $replaceValue = 'Q'; // any character will work it just makes the query fail

        if (!$areSemiColonAllowed) {
            $query = str_replace(';', $replaceValue, $query);
        }

        if (!$areQuotesAllowed) {
            $query = htmlentities($query, ENT_QUOTES);
        }

        if (!$areSpacesAllowed) {
            $query = str_replace('%20', $replaceValue, $query);
        }

        return $query;
    }

    // #########################################################################
    // Performs a select query and returns an associtative array
    //
    // $query should be in the form:
    //       SELECT fieldNames FROM table WHERE field = ?
    //
    // $values is an array that holds the values for all the ? in $query.
    //
    public function select($query, $values = '') {

        $statement = $this->db->prepare($query);

        if (is_array($values)) {
            $statement->execute($values);
        } else {
            $statement->execute();
        }

        $recordSet = $statement->fetchAll();

        $statement->closeCursor();

        return $recordSet;
    }

    // #########################################################################
    public function testSecurityQuery($query, $totalWhereClause = 1, $totalConditions = 0, $totalQuotes = 0, $totalSymbols = 0, $totalSemiColons = 0) {

        print '<p>TEST Security Query: This method does not execute a query but it does print out all the information so you can see it. Generally you have a mistake with the parameters.</p>';

        print '<p>The first number represents the number you pass into the method. The second number represents what the method counted. If the numbers do not match the query will fail.</p>';

        print '<p>WHERE: ' . $totalWhereClause . ' = ' . $this->countWhere($query) . '</p>';
        if ($totalWhereClause != $this->countWhere($query)) {
            print '<p class="noticeMe">Failed where count. Sometimes you fail because you forgot a space so check to make sure your WHERE clause is not part of your table name like this: SELECT fldFirstName, fldLastName FROM tblPeopleWHERE fldLastName = ?</p>';
        }

        print '<p>CONDITIONS: ' . $totalConditions . ' = ' . $this->countConditions($query) . '</p>';
        if ($totalConditions != $this->countConditions($query)) {
            print '<p class="noticeMe">Failed conditions count.</p>';
        }

        print '<p>QUOTES: ' . $totalQuotes . ' = ' . $this->countQuotes($query) . '</p>';
        if ($totalQuotes != $this->countQuotes($query)) {
            print '<p class="noticeMe">Failed quote count.</p>';
        }

        print '<p>SYMBOLS: ' . $totalSymbols . ' = ' . $this->countSymbols($query) . '</p>';
        if ($totalSymbols != $this->countSymbols($query)) {
            print '<p class="noticeMe">Failed symbol count.</p>';
        }

        print '<p>SEMICOLONS: ' . $totalSemiColons . ' = ' . $this->countSemiColons($query) . '</p>';
        if ($totalSemiColons != $this->countSemiColons($query)) {
            print '<p class="noticeMe">Failed semicolon count.</p>';
        }

        print '<p>Query: ' . $query;

        return '';
    }

    // #########################################################################
    // Performs an update query and returns boolean true or false based on
    // success of query.
    public function update($query, $values = '') {
        $success = false;

        $statement = $this->db->prepare($query);

        if (is_array($values)) {
            $success = $statement->execute($values);
        } else {
            $success = $statement->execute();
        }

        $statement->closeCursor();

        return $success;
    }

} // end class
?>
                       
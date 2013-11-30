<?php
    if (isset($_POST['Form'])) 
    {
        $zForm = $_POST['Form'];
        $missingfields = array();
        $required = array("Email"=>"$zForm[Email]", "Password"=>"$zForm[Pwd]");
        
     }   
        
    while (list($var, $val) = each($required)) 
    {
        if ($var && $val)    
            {
                // check this value further here
            } 
        else 
            {
                $missingfields[$var] = $val;
            }

    }   

    /*echo "<pre>";
    print_r($missingfields);
    print_r($required);*/

    if (count($missingfields)) 
    {
        echo "You missed out one or more fields:<br>";
        while(list($var, $val) = each($missingfields)) 
        {
            echo $var . "<br>";
        }

    } 

    else 
    {
        $quriodb = mysqli_connect("localhost", "root", "root", "qurio");

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        mysqli_query($quriodb, "INSERT INTO speakers (Email, Password) VALUES('{$required[Email]}','{$required[Password]}');");
        
        $query = "SELECT Email FROM speakers WHERE Email !=' ';";

        if($results = mysqli_query($quriodb, $query))
        {
            if ($results){echo "<pre>"; print_r($results);}

            while($row = mysqli_fetch_assoc($results)){
                $new_array[] = $row;
            }
        }

        echo "<pre>";
        print_r($new_array);

        echo "Sign-Up Successful!<br>";
            
        while(list($var, $val) = each($required)) 
        {
            echo $val . "<br>";
        }
        
        exit;
    }

/*    mysql_connect("localhost", "root", "root");
    mysql_select_db("phpdb");
    $result = mysql_query("SELECT * FROM users");

    if ($result && mysql_num_rows($result)) {
        $numrows = mysql_num_rows($result);
        print "$numrows<br>";
        print "<br>";
        $rowcount = 1;
        print "There are $numrows people in usertable:<br /><br />";
    
        while ($row = mysql_fetch_assoc($result)) {
            print "Row $rowcount<br />";
            print "$row</br>";
    
            while(list($var, $val) = each($row)) {
                print "<B>$var</B>: $val<br />";
            }
    
            print "<br />";
            ++$rowcount;
*/
?>
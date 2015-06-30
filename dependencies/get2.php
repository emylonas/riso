<?php
session_start();
ob_start();
$colid = 38;
$database = "col38";
$_SESSION['colid'] = $colid;

$vars = array('verb','id');
include 'functions.php';
foreach ($vars as $var){
if (isset($_REQUEST["$var"])){
${$var} = $_REQUEST["$var"];
}
# else {${$var} = "";}
}

#print_r($_REQUEST);



require ('/var/www/common/guest_connect.php');

mysql_select_db('repository');
$query = "select top, bottom from collectionsWorf where id=$colid";
$result = mysql_query($query);
// var_dump($result);
if ($result)
{
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
	        $top = $row[top];
	        $bottom = $row[bottom];
	}
}
//echo $top;

//HTML for page is stored in the collectionsWorf database. to change the html I have 
//omitted top.

getHeader("","Resources");

mysql_select_db($database);
if ($verb=="get")
{
        $query3 = "select * from categories";
        $result3 = mysql_query($query3);
        
        while ($row3 = mysql_fetch_array($result3, MYSQL_ASSOC))
        {
                $_SESSION['yoursearch'] .= "$row3[category]";
        }
        $query2= "select * from objects2categories, $database.objects
        where objects2categories.categoryid=$id
        and objects2categories.metsid=$database.objects.metsid
        order by label";
        $hitlist = mysql_query($query2);
        $count = mysql_num_rows($hitlist);
        if ($count >0)
       {

                while($hitlistArray[] = mysql_fetch_assoc($hitlist));
                array_pop($hitlistArray);
                $_SESSION['hitlistArray'] = $hitlistArray;
                $_SESSION['count'] = $count;
                $start = 0;
                require("display2.php");
       }
       else
       {        
                //getHeader("","Resources");
                echo '<div class="container"><div class="row" style="text-align:center"><h3><em>Sorry, 0 Records Found.</em><a href="/cds/garibaldi/resources/illustrated_press.php"><br>Back</a></h3></div></div>';
                //footer();
       }
}
if ($verb == "display")
{
	require ("display2.php");
}
footer();
echo '<!--Isotope-->
        <script src="../js/jquery.infinitescroll.min.js"></script>
        <script src="../js/fake-element.js"></script>
        <script src="../js/jquery.isotope.min.js"></script>
        <script>
            $(window).load(function(){
            $(\'#items-container\').isotope({
                itemSelector: \'.entry\'
              });
            });
        </script>';

echo "$bottom";
?>

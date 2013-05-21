<?php

include_once ('database_connection.php');

if(isset($_GET['keyword'])){
$keyword = 	trim($_GET['keyword']) ;
$keyword = mysql_real_escape_string($keyword);

$tblname = 'sites';
$field1 = 'site_url';
$field2 = 'site_review';


$query = "SELECT * FROM $tblname where $field1 like '%$keyword%' or $field2 like '%$keyword%'";

//echo $query;
$result = mysql_query($query);
if($result){
    if(mysql_affected_rows($link)!=0){

      echo'<p><B>Results for : </B>'.$_GET['keyword'].'</p>';

          while($row = mysql_fetch_array($result)){
    // echo '<p> <b>'.$row[$field1].'</b> '.$row[$field2].'<BR>'.$row[$field3].'</p>'   ;

	echo '<div class="well">
           <h4>
             <b>URL: </b>  '. $row[$field1] .'</h4>
            <p> <b>Review</b> </p>
            <p> '. $row[$field2] .'</p>
            <p>Visit the site: <a href="'. $row[$field1] .'" target="_blank">'. $row[$field1] .'</a> </p>

        </div>';

    }
    }else {
        echo '<B>No Results for :"'.$_GET['keyword'].'" </B> <br>';
    }
  
}
}else {
    echo 'Parameter Missing';
}

?>
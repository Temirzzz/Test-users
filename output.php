<?php

require_once('core/config.php');
require_once('core/functions.php');
require_once('template/header.php');
$conn = connect();

$data = selectUserRolname($conn);
close ($conn);

?>

<div class="main-ul">
	<ul>
		<a href="./" class="main-link"><li>back</li></a>
	</ul>
</div>


<div class="wrapper">
    <div >
        <?php                
            $out = '';
            for ($i=0; $i < count($data); $i++){                               
                $out .= "<p class='out__p'>{$data[$i]['username']} - ";
                $out .= "<span class='out__span'>{$data[$i]['rolename']}</span></p>";                  
            }
            echo $out;            
        ?>
    </div>
</div>
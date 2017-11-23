<?php /*echo $this->html->link("Patient Login",array("controller"=>"patients","action"=>"login", "patient"=>true));?> | <?php echo $this->html->link("Doctor Login",array("controller"=>"doctors","action"=>"login", "doctor"=>true));?>
<br><br>
<?php
$start = strtotime("02:15");
$mins = range(0,86400,900); //Measured in seconds.
foreach($mins AS $min) {
 $time = date('H:i',$start+$min);
 echo "('" . $time . "'), ";
 echo "<br>";
}
*/
?>


        	<h1>Chat Online with a Doctor Today</h1>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas posuere, ligula quis aliquam fringilla, justo lorem fermentum nisi, vitae aliquam mauris sapien et metus. Suspendisse eu ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Sed dapibus lorem ut enim. Praesent auctor metus id enim. Phasellus sit amet ligula vel metus bibendum tristique. Nulla vehicula suscipit ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
        
    

<!DOCTYPE html>
<html>
	<head>
		<title>Citywise Donation Type Report</title>
		<style type="text/css">
			#thanksletter
			{	
				float:left;
				width:100%;
				font-size:13px;
				padding:0px;
				font-family:Times New Roman, Times, serif;
				margin:1px 5px;
			}
			#donation_receipt td
			{
				border:solid #000000 1px;
			}
		</style>
	</head>
	<body style="margin:0px auto;">
    	<div style="width:8.5in;height:11in;margin:0px auto 5px;padding:0px;">
        <div style="width:6.5in;height:10.8in;border:solid black 0px;margin:.1in 1in;padding:0px;">
            <div id="thanksletter">
                <?php $config=$this->mdl_general->GetInfoByRow('acs_configration','config_id',array('config_id'=>"1"));?>
                
                <div style="float:right;margin:0px;padding:0px;width:200px;text-align:right;">
                    <img src="<?=base_url().'assets/image/setUpwindow/'.$config->logo?>" height="65px"/>
                </div>
                <div style="float:right;margin:0px 5px;padding:0px; text-align:center;color:#00CC00;width:3.5in;">
                    <?php
                        echo"<b>".$config->cherity_name."</b><br />";
                        echo $config->address."<br />";
                        echo"Phone: ".$config->phone;
                        echo" Fax: ".$config->fax;
                    ?>
                </div>
                
            </div>
            <hr />
            <div style="text-align:center"><h2>Citywise Donation Type</h2></div>
            
            <div id="thanksletter">
                
                    <table cellspacing="0px">
                        <thead>
                            <tr>
                                <th align="left">Donation Type</th>
                                <th>Currency</th>
                                <th align="right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $city=0;
                            $donationtotal=0;
                            $allDonationSum=0;
                            $counter=0;
                            foreach($list as $row){
                                $allDonationSum=$allDonationSum + $row['donation_amount'];
                                if($home_city =="1"){
                                    if($city != trim($row['donor_homecityid'])){
                                        if($counter>0){
                                            echo "<tr bgcolor='#007CF9'><td></td><td>Total Amount :</td><td align='right'><b>".number_format($donationtotal,2)."</b></td></tr>";
                                        }
                                        echo "<tr bgcolor='#FFFFC4'><td ><b>".$row['city_name']."</b></td><td></td><td></td></tr>";
                                        $donationtotal=0;
                                    }
                                    $city=trim($row['donor_homecityid']);
                                }else{
                                    if($city != trim($row['donor_officecity'])){
                                        if($counter>0){
                                            echo "<tr bgcolor='#007CF9'><td></td><td>Total Amount :</td><td ><b>".number_format($donationtotal,2)."</b></td></tr>";
                                        }
                                        echo "<tr bgcolor='#FFFFC4'><td ><b>".$row['city_name']."</b></td><td></td><td></td></tr>";
                                        $donationtotal=0;
                                    }
                                    $city=trim($row['donor_officecity']);
                                }
                                $donationtotal=$donationtotal+$row['donation_amount'];    


                                if($counter%2==0)
                                    echo"<tr>";
                                else
                                    echo'<tr bgcolor="#EFEFEF">';
                            ?>
                            
                                <td align="left"><?=$row['dt_name']?></td>
                                <td width="10%"><?=$row['currency_name']?></td>
                                <td width="10%" align="right"><?=number_format($row['donation_amount'],2)?></td>
                            </tr>
                            
                            <?php $counter++;}
                            echo "<tr bgcolor='#007CF9'><td></td><td>Total Amount :</td><td align='right'> <b>".number_format($donationtotal,2)."</b></td></tr>";
                            echo "<tr bgcolor='#007CF9'><td></td><td >Grand Total Amount :</td><td> <b>".number_format($allDonationSum,2)."</b></td></tr>";
                            ?>

                            
                        </tbody>
                    </table>
                
            </div>
            <div id="thanksletter">
                <hr />

                <?php  echo"Printed on: ".date("d-m-Y"); ?>
            </div>
            
        </div>
    </div>
	</body>
</html>

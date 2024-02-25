<?php

$nama=$_POST['buyername'];
$email=$_POST['buyeremail'];
$telefon=$_POST['phoneno'];
$harga=$_POST['totalprice'];

$rmx100=($harga*100);
$some_data = array(
    'userSecretKey'=> 'sknfcw2c-u115-i9wv-p5iu-9vv4qc7ghg24',
    'categoryCode'=> 'uzfgbzwg',
    'billName'=> 'Pembayaran Pembersihan',
    'billDescription'=> 'Pembayaran Pembersihan sebanyak RM'.$harga,
    'billPriceSetting'=>1,
    'billPayorInfo'=>1,
    'billAmount'=>$rmx100,
    // 'billReturnUrl'=>'http://www.khirulnizam.com',
    // 'billCallbackUrl'=>'',
    // 'billExternalReferenceNo'=>'',
    'billTo'=>$nama,
    'billEmail'=>$email,
    'billPhone'=>$telefon,
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>0,
  );  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result,true);
  $billcode=$obj[0]['BillCode'];
?>
<!--SEND USER TO TOYYIBPAY PAYMENT-->
<script type="text/javascript">
    //redirect to payment gateway
   window.location.href="https://toyyibpay.com/<?php echo $billcode;?>"; 
 </script>
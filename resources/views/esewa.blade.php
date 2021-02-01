<?php 
// dd($form->colleges->merchant_no);
   $url = "https://esewa.com.np/epay/main";
   $data =[
       'amt'=> $form->colleges->form_charge,
       'pdc'=> 0,
       'psc'=> 0,
       'txAmt'=> 0,
       'tAmt'=> $form->colleges->form_charge,
       'pid'=> $form->pid,
       'scd'=> $form->colleges->merchant_no,
       'su'=> route('admin.forms.fraud-check',$form->id),
       'fu'=> route('home')
    //    'su'=> redirect('/home')->with('message','Success'),
    //    'fu'=> redirect('/home')->with('message','Failed')
   ];
   
       $curl = curl_init($url);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $response = curl_exec($curl);
       curl_close($curl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/backend/dist/css/adminlte.min.css')}}">

    <title>epay - eSewa</title>
</head>
<body style="background-color: black; align-items: center; text-align: center;">
<img src="{{asset('esewa_epay_logo.png')}}" alt="esewa-logo">
<form action="<?php echo $url?>" method="POST">
    @csrf
    <input value="<?php echo $data['tAmt']?>" name="tAmt" type="hidden">
    <input value="<?php echo $data['amt']?>" name="amt" type="hidden">
    <input value="<?php echo $data['txAmt']?>" name="txAmt" type="hidden">
    <input value="<?php echo $data['psc']?>" name="psc" type="hidden">
    <input value="<?php echo $data['pdc']?>" name="pdc" type="hidden">
    <input value="<?php echo $data['scd']?>" name="scd" type="hidden">
    <input value="<?php echo $data['pid']?>" name="pid" type="hidden">
    <input value="<?php echo $data['su']?>" type="hidden" name="su">
    <input value="<?php echo $data['fu']?>" type="hidden" name="fu">
    <input value="Pay with esewa" class="btn btn-xs btn-success" type="submit">
</form>
</body>
</html>
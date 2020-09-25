<?php

    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Amount=$_POST['Amount'];
    $Phone=$_POST['phone'];
    $purpose='Cancer Donation';
    
    include 'src/Instamojo.php';
    $api = new Instamojo\Instamojo('test_08787bfeb50f542cad64be66e75', 'test_8ffd846d7c79930cee80b9bd77f', 'https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purpose,
            "amount" => $Amount,
            "send_email" => true,
            "email" => $Email,
            "buyer_name" =>$Name,
            "phone"=>$Phone,
            "send_sms" => true,
            "allow_repeated_payments" =>false,
            "redirect_url" => "https://sumana-payment-gateway.000webhostapp.com/paythanks.html"
            )
        );
        $pay_url=$response['longurl'];
        header("location: $pay_url");
    	}
    	catch (Exception $e) {
    	    print('Error: ' . $e->getMessage());
    	}
?>
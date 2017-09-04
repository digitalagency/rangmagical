<?php
if (isset($_POST['btnsubmit'])) {
    //print_r($_POST);
    $regno = $_POST['regno'];
    $passcode = $_POST['passcode'];
    $uid = $mydb->getValue('id', 'tbl_user', "registration_number='" . $regno . "' AND passcode='" . $passcode . "'"); //the value of uid becomes null if the registration number doesnt exist.
    
    //Count Coupons    
    $no_of_coupon=0;
    for ($cnt=0;$cnt<count($_POST['couponumber']);$cnt++)
    {
      //echo $cnt." --> ".$_POST['couponumber'][$cnt];
      //echo "<br>";
      if(!empty($_POST['couponumber'][$cnt]))
        ++$no_of_coupon;
    }
    //echo $no_of_coupon;

    $couponumber_1 = $_POST['couponumber']['0'];
    if ($uid == '') {
        $message = "The Registration number " . $regno . " doesnt exist.";
        //echo $message;
        $url = SITEROOTFB . "register.php?message=" . $message;
        //$mydb->redirect($url);
    } 
    else if ($couponumber_1 == '') {
        $message = "You must enter your coupon number to participate in Nagadpati.";
        $url = SITEROOTFB . "register.php?message=" . $message;
        //echo $message;
        //$mydb->redirect($url);
    }
    else if($no_of_coupon<3)
    {
        $message = "You must enter at least three coupon numbers to participate in Nagadpati.";
        $url = SITEROOTFB . "register.php?message=" . $message;
        //$mydb->redirect($url);      
    }
    else {
        $imagename = $mydb->getValue('imagename', 'tbl_photo', 'user_id="' . $regno . '"');
        //echo $imagename;
        if ($imagename == "") 
        {
            //echo "imagename empty";
            $data['full_name'] = $_POST['fname'];
            //$data['coupon_qty'] = $_POST['couponqty'];
            //$data['coupon_no'] = $_POST['couponumber'];

            $couponumber='';
            $coupon_qty = 0;

            for($ii=0;$ii<count($_POST['couponumber']);$ii++)
            {
                if(!empty($_POST['couponumber'][$ii]))
                {
                    $couponumber = $couponumber.', '.$_POST['couponumber'][$ii];
                    ++$coupon_qty;
                }
            }
            
            $couponumber = substr($couponumber, 2);

            $data['coupon_no'] = $couponumber;            
            $data['coupon_qty'] = $coupon_qty;
            $data['shade'] = $_POST['shade'];            
            $data['pattern'] = $_POST['pattern'];
            $data['medium'] = 'facebook';

            //print_r($data);
            //exit();

            if (isset($_POST['city']))
                $data['city'] = $_POST['city'];

            if (isset($_POST['address']))
                $data['address'] = $_POST['address'];

            $data['registration_date'] = date("Y-m-d");
            //$colfile = $_FILE['colorfile'];

            $toName = $mydb->getValue('title', 'tbl_admin', 'id=1');
            //$to = $mydb->getValue('email', 'tbl_admin', 'id=1');
            $to="sanjeev@digitalagencycatmandu.com";

            $fromName = $_POST['fname'];
            $from = 'noreply@bergernepal.com';
            // subject
            $subject = 'A New Facebook Registeration has been made for Nagadpati Scheme';

            // message
            $message = '
            <html>
            <head>
              <title>Details of facebook Registeration for Nagadpati Scheme</title>
            </head>
            <body>
              <p>Dear Berger Paints Nepal Admin,<br>Please find details of the  facebook Registeration for Nagadpati below:</p>
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="160px;">Customers Name :</td><td>' . $_POST["fname"] . '</td>
                </tr>
                <tr>
                  <td>Coupon Qty. :</td><td>' . $coupon_qty . '</td>
                </tr>
                <tr>
                  <td>Coupon No. :</td><td>' . $couponumber . '</td>
                </tr>
              </table>
            </body>
            </html>
            ';

            // To send HTML mail, the Content-type header must be set
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
            $headers .= 'To: ' . $toName . ' <' . $to . '>' . "\r\n";
            $headers .= 'From: ' . $fromName . ' <' . $from . '>' . "\r\n";

            // Mail it
            //mail($to, $subject, $message, $headers);
            if ($_FILES['colorfile']['size'] > 0) {

                $address = trim($_POST['address']);
                $address = strtolower($_POST['address']);
                $ext = pathinfo($_FILES['colorfile']['name'], PATHINFO_EXTENSION);
                $filename = $regno . "_".$address."." . $ext;
//                $filename = $mydb->clean4imagecode(($_FILES['colorfile']['name']));
                $tmp_name = $_FILES['colorfile']['tmp_name'];
                $thumbsize = '200';
//                echo $filename;
                //UploadFile($filename,$tmp_name,$thumbsize='',$unlinkfilename='',$unlinkfilepath='')
                $file = $mydb->UploadFileFb($filename, $tmp_name, $thumbsize);
                //print_r($file);
                $imgdata['imagepath'] = $file['filepath'];
                $imgdata['imagename'] = $file['filename'];

                $imgdata['user_id'] = $regno;
                $imgdata['uploaded_date'] = date("Y-m-d");
                //print_r($imgdata);
                //echo "<br><br>";
                $uidd = $mydb->insertQuery('tbl_photo', $imgdata);
            }
            //print_r($data);
            $mydb->updateQuery('tbl_user', $data, "registration_number='" . $regno . "'");
            //echo $mydb->updateQuery('tbl_user', $data, "registration_number='" . $regno . "'",'1');
            //$url = SITEROOTFB . "register.php?m=succ";
            $url = SITEROOTFB . "register-successful.php";
            $check = '';
            $check = $mydb->getValue('full_name', 'tbl_user', "registration_number='" . $regno . "'");
            if (!empty($check)) {
                $_SESSION[CLIENT] = $regno;
            }
            //echo $message;
            $mydb->redirect($url);
        } else {
            //echo "imagename not empty";
            $url = SITEROOTFB . "register.php?message=You have already added your house image. Please contact Berger paints Nepal Admin for any confussion.";
            $mydb->redirect($url);
        }
    }
}
?>
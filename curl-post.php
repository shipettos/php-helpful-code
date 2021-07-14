    private function curlRequestPost($url, $model, $sessionToken, $encodeModel)
    {
        $ch = curl_init();
        if (!$ch) {
            return null;
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($model));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        if ($sessionToken!= null){
            $headers[] = 'x-auth-access-token: '.$sessionToken;
        }
//        echo "<hr/>";
//        if ($encodeModel){
//            echo sprintf('CURL: %s %s %s', $url, json_encode($model), json_encode($headers));
//        } else {
//            echo sprintf('CURL: %s %s %s', $url, $model, json_encode($headers));
//        }

        //echo "<hr/>";
        //exit();

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


        $data = curl_exec($ch);

//        $curlErrorNumber = curl_errno($ch);
//        if ($curlErrorNumber) {
//            $error_msg = curl_error($ch);
//            echo $error_msg;
//            echo "HAS ERROR<BR/>";
//        }
//        if (isset($error_msg)) {
//            echo $error_msg;
//            echo "MESSAGE<BR/>";
//        }


//        $data_decoded = json_decode($data);
//        if (isset($data_decoded->message)){
//            echo "<hr/>";
//            echo $data_decoded->message;
//            echo "<hr/>";
//        }
//        else{
//            echo var_dump($data_decoded);
//        }


        curl_close($ch);

        return $data;
    }

    private function curlRequestPostFile($url, $file_name, $sessionToken)
    {
        //file_name is the name of the file given for the post request.
        $ch = curl_init();
        if (!$ch) {
            return null;
        }

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('document'=> new CURLFILE($file_name)),
            CURLOPT_HTTPHEADER => array(
                'x-auth-access-token: ' . $sessionToken,
                'Content-Type: multipart/form-data'
            ),
        ));

        $data = curl_exec($ch);

        $curlErrorNumber = curl_errno($ch);
        if ($curlErrorNumber) {
            $error_msg = curl_error($ch);
            echo $error_msg;
            echo "HAS ERROR<BR/>";
        }
        if (isset($error_msg)) {
            echo $error_msg;
            echo "MESSAGE<BR/>";
        }

        var_dump($curlErrorNumber);

        curl_close($ch);

        return $data;
    }

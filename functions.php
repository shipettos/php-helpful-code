    private function deleteFile($file_name){

        // Use unlink() function to delete a file
        if (!unlink($file_name)) {
            echo ("$file_name cannot be deleted due to an error");
        }
        else {
            echo ("$file_name has been deleted");
        }
    }

    /*
    $type = success, error, debug, default is debug
    $logstring = what to log / write to file
    */
    private function logToFile($type, $logstring){
        $filename = "";
        if (strtolower($type) == "debug"){
            $filename = "Logger/Debug.log";
        } else if (strtolower($type) == "error"){
            $filename = "Logger/Error.log";
        } else if (strtolower($type) == "success"){
            $filename = "Logger/Success.log";
        } else{
            $filename = "Logger/Debug.log";
        }

        error_log("\n --------------START LOG------------------", 3, $filename);
        error_log("\n date and time: ".date('D M d, Y G:i') . $logstring , 3, $filename);
        error_log("\n ", 3, $filename);
    }

<?php
require_once "connection.php";
class MyClass
{
    public function update_status()
    {   
        global $argv;
        global $connect;   
            $result = mysqli_query($connect, "UPDATE transaction_table SET
            status = '$argv[2]' WHERE references_id = '$argv[1]' ");
            
            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' =>'Update Success'
                );
                return "Update Success";
            }
            else
            {
                $response=array(
                    'status' => 0,
                    'message' =>'Update Failed.'
                );
                return "Update Failed";
            }
        header('Content-Type: application/json');   
    }
}
$obj = new MyClass();
echo $obj->update_status();
?>
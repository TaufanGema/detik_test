<?php
require_once "connection.php";
    if(function_exists($_GET['function'])) {
         $_GET['function']();
      } 
    
    function get_transaction_alldata()
    {
        global $connect;      
        $query = $connect->query("SELECT * FROM transaction_table");            
        while($row=mysqli_fetch_object($query))
        {
        $data[] =$row;
        }
        $response=array(
                    'status' => 1,
                    'message' =>'Success',
                    'data' => $data
                    );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function get_transaction()
    {
        global $connect;   
        $check = array( 
        'merchant_id' => '',
        'references_id' => '',
        );
        $check_match = count(array_intersect_key($_POST, $check));
        if($check_match == count($check)){
            $query = $connect->query("SELECT references_id,invoice_id,status FROM transaction_table where
            merchant_id = '$_POST[merchant_id]' AND
            references_id = '$_POST[references_id]' 
            ");            
            while($row=mysqli_fetch_object($query))
            {
            $data[] =$row;
            }
            $response=array(
                        'status' => 1,
                        'message' =>'Success',
                        'data' => $data
            );
        }else{
            $response=array(
                        'status' => 0,
                        'message' =>'Wrong Parameter'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }  
    function create_transaction()
      {
        global $connect;   
        $check = array(
        'invoice_id' => '', 
        'item_name' => '', 
        'amount' => '', 
        'payment_type' => '', 
        'customer_name' => '', 
        'merchant_id' => '',

        );
        $check_match = count(array_intersect_key($_POST, $check));
        $type = $_POST['payment_type'];
        if($check_match == count($check)){
            if($type == "credit_card"){
                $result = mysqli_query($connect, "INSERT INTO transaction_table SET
                invoice_id = '$_POST[invoice_id]',
                item_name = '$_POST[item_name]',
                amount = '$_POST[amount]',
                payment_type = '$_POST[payment_type]',
                customer_name = '$_POST[customer_name]',
                merchant_id = '$_POST[merchant_id]',
                references_id = UUID_SHORT()
                ");
                if($result)
                {
                    $query = $connect->query("SELECT references_id,number_va,status FROM transaction_table WHERE invoice_id = $invoice_id");            
                    while($row=mysqli_fetch_object($query))
                    {
                    $data[] =$row;
                    }
                    $response=array(
                        'status' => 1,
                        'message' =>'Success',
                        'data' => $data
                    );
                }
                else
                {
                    $response=array(
                        'status' => 0,
                        'message' =>'Insert Failed.'
                    );
                }
            }else if($type == "virtual_account"){
                $result = mysqli_query($connect, "INSERT INTO transaction_table SET
                invoice_id = '$_POST[invoice_id]',
                item_name = '$_POST[item_name]',
                amount = '$_POST[amount]',
                payment_type = '$_POST[payment_type]',
                customer_name = '$_POST[customer_name]',
                merchant_id = '$_POST[merchant_id]',
                references_id = UUID_SHORT(),
                number_va = UUID_SHORT()
                ");
                if($result)
                {
                    $query = $connect->query("SELECT references_id,number_va,status FROM transaction_table WHERE invoice_id = $invoice_id");            
                    while($row=mysqli_fetch_object($query))
                    {
                    $data[] =$row;
                    }
                    $response=array(
                        'status' => 1,
                        'message' =>'Success',
                        'data' => $data
                    );
                }
                else
                {
                    $response=array(
                        'status' => 0,
                        'message' =>'Insert Failed.'
                    );
                }
            }
        }else{
        $response=array(
                    'status' => 0,
                    'message' =>'Wrong Parameter'
                );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }  
?>
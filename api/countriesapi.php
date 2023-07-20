<?php
include './db.php';

$type = isset($_GET['type']) ? $_GET['type'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$postData = json_decode(file_get_contents("php://input"), true);

if($_SERVER['REQUEST_METHOD'] == "GET" && $id != '')
{
      if($id)
        $query = mysqli_query($db,"select * from countries  where id = $id");

        if($query)
        {
        //$data = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $data = array( 
             "id"=>$row['id'],
             "name"=>$row['name'],
             "static_rate"=> $row['static_rate'],
             "customised_rate"=>$row['customised_rate'],
             "is_receiving_active"=>$row['is_receiving_active'],
             "is_sending_active"=>$row['is_sending_active'],
            );
        }

        if($data)
        {
            echo json_encode(array("flag"=>true,"code"=>200,"data"=>$data));
            exit;
        }
    }

    
}

if($_SERVER['REQUEST_METHOD'] == "GET")
{
        $query = mysqli_query($db,"select * from countries order by id desc");

        if($query)
        {
        $data = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = array( 
             "id"=>$row['id'],
             "name"=>$row['name'],
             "static_rate"=> $row['static_rate'],
             "customised_rate"=>$row['customised_rate'],
             "is_sending_active"=>$row['is_sending_active'],
             "is_receiving_active"=>$row['is_receiving_active'],
            );
        }

        if($data)
        {
            echo json_encode(array("flag"=>true,"code"=>200,"data"=>$data));
            exit;
        }
    }

    
}

if($_SERVER['REQUEST_METHOD'] == "GET" && $type =="sending")
	{
	
			$query = mysqli_query($db,"select * from countries  where is_sending_active = 1");
            if($query)
            {
            $data = array();

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = array( 
                 "id"=>$row['id'],
                 "name"=>$row['name'],
                 "static_rate"=> $row['static_rate'],
                 "customised_rate"=>$row['customised_rate'],
                 "is_sending_active"=>$row['is_sending_active'],
                );
         }

            if($data)
            {
                echo json_encode(array("flag"=>true,"code"=>200,"data"=>$data));
                exit;
            }
        }

		
	}

    if($_SERVER['REQUEST_METHOD'] == "GET" && $type =="receiving")
	{
	
			$query = mysqli_query($db,"select * from countries  where is_receiving_active = 1");
            if($query)
            {
            $data = array();

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = array( 
                 "id"=>$row['id'],
                 "name"=>$row['name'],
                 "static_rate"=> $row['static_rate'],
                 "customised_rate"=>$row['customised_rate'],
                 "is_sending_active"=>$row['is_sending_active'],
                );
         }

            if($data)
            {
                echo json_encode(array("flag"=>true,"code"=>200,"data"=>$data));
                exit;
            }
        }

		
	}

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $name = @$postData['name'];
        $staticRate = @$postData['staticRate'];
        $customisedRate = @$postData['customisedRate'];
        $isSendingActive = @$postData['isSendingActive'];
        $isReceivingActive = @$postData['isReceivingActive'];
   

      $query = "insert into countries (name, static_rate,customised_rate,type,is_sending_active,is_receiving_active) values ('$name', '$staticRate', '$customisedRate','$type','$isSendingActive','$isReceivingActive')";
      $res = $db->query($query);
      
      if($res)
      {
          echo json_encode(array("flag"=>true,"code"=>200,"message"=>"Country added successfully"));
          exit;
      }
    }

    if($_SERVER['REQUEST_METHOD'] == "PUT")
	{
        $pid = @$postData['id'];
        $name = @$postData['name'];
        $staticRate = @$postData['staticRate'];
        $customisedRate = @$postData['customisedRate'];
        $isSendingActive = @$postData['isSendingActive'];
        $isReceivingActive = @$postData['isReceivingActive'];
        // var_dump($name);exit;
   
        $query = "update  `countries` SET `name`='$name',`static_rate`='$staticRate',`customised_rate`='$customisedRate',`is_sending_active`='$isSendingActive',`is_receiving_active`='$isReceivingActive' where id = $pid";
        $res = $db->query($query);
        
        if($res)
        {
            echo json_encode(array("flag"=>true,"code"=>200,"message"=>"Country updated successfully"));
            exit;
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "DELETE")
	{   
        $pid = @$_POST['id'];
        var_dump($postData); exit;
        $query = "DELETE FROM `countries`  where id = $pid";
        $res = $db->query($query);
        
        if($res)
        {
            echo json_encode(array("flag"=>true,"code"=>200,"message"=>"Country Deleted successfully"));
            exit;
        }
    }




   

    ?>


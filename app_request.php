<?php
	require_once('../Connections/chroma.php');
	require_once('../includes/usedfunctions.php');

    if(isset($_GET['get']))
    {
        //*********************GETTING JOB APPROVED FROM ONLINE***************************************
            $ID= $_GET['job_id'];
            $STATUS=$_GET['job_status'];
            $HAS_ROW=false;
            $data=array();
            
            $sql= "SELECT * FROM job_auth where down_flag IS NULL";
            
            $stmt = $conn->prepare($sql);
    				$stmt->execute();
    				$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    				
    				for ($y = 0; $y < count($res); $y++) 
    				{
        				$JOB_ID=$res[$y]['job_id'];
        				$data[] = array("JOB_ID" => $JOB_ID);
                 
                    }
                    
                     echo json_encode($data);die;
            
    		 
    }else if(isset($_GET['post']))
    {
        
        //*******************************POSTING JOB IF AUTHORIZED*****************************
           
            $ID=$_GET['post'];
        	$sql= "UPDATE job_auth SET down_flag='Y' WHERE job_id='$ID'";
        	  
            $stmt = $conn->prepare($sql);
    		$res=$stmt->execute();
                  
                    
    }

?>
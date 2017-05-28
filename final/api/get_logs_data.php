<?php
    include_once('../config/init.php');

    session_start();

    //$result = array(array("xkey"=>"2017 Q1", "data"=>100), array("xkey"=>"2017 Q2", "data"=>150));
    $result = array();

    if($_SESSION['is_admin']){
        $logs_file = fopen("../config/logfile.txt", "r") or exit("Unable to open logfile.txt!");
        $pre_result = array();
        while(!feof($logs_file)){
            $line = trim(fgets($logs_file));
            if(strpos($line, '|') !== false){
                $line_parts = explode("|", $line);
                $date = DateTime::createFromFormat("Y-m-d", $line_parts[1]);

                if(isset($pre_result[$date->format("Y-m-d")])){
                    $pre_result[$date->format("Y-m-d")]++;
                }else{
                    $pre_result[$date->format("Y-m-d")] = 0;
                }
            }
        }        
        fclose($logs_file);

        //scalabilty decisions
        $min_date = DateTime::createFromFormat("Y-m-d", key($pre_result));//get first key
        end($pre_result);//place internal pointer at the end
        $max_date = DateTime::createFromFormat("Y-m-d", key($pre_result));//get last key
        reset($pre_result);//reset internal pointer

        $interval = $min_date->diff($max_date);//calculate date difference

        $date_format = "Y-m-d";//default, few entries show all days
        if($interval->years > 3){//if there is data for more than 3 years, hide months and days
            $date_format = "Y";
        }elseif($interval->months > 3){//if there is data for more than 3 months, hide days
            $date_format = "Y-m";
        }

        foreach($pre_result as $key => $value){
            $temp_date = DateTime::createFromFormat("Y-m-d", $key);//convert to date
            array_push($result, array("period"=>$temp_date->format($date_format), "people"=>$value));
        }
    }

    echo json_encode($result);
?>
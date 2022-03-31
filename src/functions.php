<?php 


    function query($sql){
        global $con;
        
        try{
            $ex = mysqli_query($con,$sql);
            if($ex){
                return $ex;
            }
        } catch(Exception $e){

        }
        return false;
    }

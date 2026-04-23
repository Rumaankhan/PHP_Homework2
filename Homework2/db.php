<?php
    $conn=new mysqli("localhost","root","","sdac_php");
    if(! $conn){
        echo("Connection Failed");
    }
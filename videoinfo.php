<?php
    $videoid = $_GET['vid']; 
    $query = $_GET['req']; 

    function curl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $return = curl_exec($ch);
        curl_close ($ch);
        return $return;
    }
    $string = curl('https://www.youtube.com/get_video_info?video_id='.$videoid); 
    $data = ""; 

    parse_str( $string,$data ); 
    
    echo "<pre>";
    if( $query == "len" ){
        echo $data['length_seconds']; 
    }else if( $query == null ){
        print_r( $data ); 
        echo "\n"; 
    }
    echo "</pre>";
?>
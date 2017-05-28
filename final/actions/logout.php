<?php  
   
    if(isset($_COOKIE["selector"])){
        setcookie("selector", "", -1, '/~lbaw1611/final');
        setcookie("validator", "", -1, '/~lbaw1611/final');
    }
    
    session_start();
    session_destroy();

    header('Location: https://gnomo.fe.up.pt/~lbaw1611/final/pages/');
?>
<?php

function getSecureParameter($method,$parameter,$sourcePage){
    if (empty($method[$parameter])){
        header("Location: $sourcePage");
        
    } else {
        $parameter = $method[$parameter];
        return $parameter;
    }
}
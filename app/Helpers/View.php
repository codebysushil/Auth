<?php

function view($file, $data=[]){
    if(file_exists($file)){
        require_once($file);
    }
}

<?php

function my_autoload($pClassName) 
{
        include('Entity/' . $pClassName . ".php");
}// my_autoload($pClassName)

spl_autoload_register("my_autoload");
?>
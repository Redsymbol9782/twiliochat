<?php

$status = implode(',',$_REQUEST) ;

$handle = fopen('public/twilio_log.txt','a');

fwrite($handle, $status);
?>
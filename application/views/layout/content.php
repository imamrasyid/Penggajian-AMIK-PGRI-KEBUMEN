<?php

if ($content)
{
    $this->load->view($content);
}
else
{
    echo "Failed To Load Content";
}
?>
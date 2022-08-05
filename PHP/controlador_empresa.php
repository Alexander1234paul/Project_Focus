<?php
    include("db.php");


    function ctrlVacios()
    {
        if(!empty($_POST['txt_ci_ruc']) && !empty($_POST['txt_password']))
        {
            return(TRUE);
        }
        return(FALSE);
    }

    function findAll_personas(){
        $sql = "SELECT * FROM tbl_personas";
    }




?>
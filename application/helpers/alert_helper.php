<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('test_method'))

{

    function show_alert($type = '', $msg= '')

    {

        $strSuccess = '<div class="alert alert-success a_success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ##msg##</div>';

        $strError = '<div class="alert alert-danger a_danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ##msg##</div>';

        $strWarning = '<div class="alert alert-warning a_warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>##msg##</div>';



        if($type=="success"){

        	$msg= str_replace('##msg##', $msg, $strSuccess);

        }elseif($type=="error"){

        	$msg= str_replace('##msg##', $msg, $strError);

        }elseif($type=="warning"){

        	$msg= str_replace('##msg##', $msg, $strWarning);

        }

        echo $msg;

    }   

}
if(!function_exists('arrayToSqlCsv'))
{
  function arrayToSqlCsv(array $array)
  {
    $stringgify = '';
    if(!empty($array))
    {
       
         
       $inc = 0;
        foreach ($array as $key => $value)
        {

          if($inc==0)
          {
            $stringgify.="'".$value."'";  
            
            
          }else
          {
            $stringgify.=", '".$value."'";
          }
          $inc++;

          
        }
       
      
    } 

    return $stringgify;
  }
}
if(!function_exists('clean_slug'))
{
        function clean_slug($string) {
       $string = trim($string); // remove start and end espace all spaces with hyphens.
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
       $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
       $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
       $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.

         $string =  preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
       $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
       $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
       $string = str_replace('--', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}



?>
<?php
namespace App\Framework;
class ViewAdmin
{

    public static function show( $templateName, $data = [] ) {

        include 'app/Views/header.view.php';


        if( file_exists('app/Views/'.$templateName.'.view.php') ) {
            include 'app/Views/admin/mainAdmin.view.php';
            include 'app/Views/'.$templateName.'.view.php';

        }
        else {
            throw new \Exception('File doesn\'t exist');
        }


        include 'app/Views/footer.view.php';
    }


}
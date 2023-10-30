<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Lang;

class HelperMessage{

    public static function create($message=''){
        return __($message."admin.notification_message.created_successfully");
    }
    public static function update($message=''){
        return __($message."Updated Successfully");
    }
    public static function delete($message=''){
        return __($message."admin.notification_message.deleted_successfully");
    }
    public static function restore($message=''){
        return __($message."admin.notification_message.restored_successfully");
    }
    public static function error($message=''){
        return __($message."admin.notification_message.some_error_occured");
    }
    public static function fetch($message=''){
        return __($message." Fetch Successfully");
    }
    public static function send($message=''){
        return __($message."admin.notification_message.send_successfully");
    }
    public static function notFound($message=''){
        return __($message."admin.notification_message.resource_not_found");
    }
    public static function success($message=''){
        return __($message."admin.notification_message.operation_successfull");
    }
    public static function accessDenied($message=''){
        return __($message."admin.notification_message.access_denied");
    }
    
}


?>
<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;
use Str;

class Helper
{

    public static function canonical_url()
    {

        // all string must be replaced with 
        // http://www., https://www. => https://yaksport.dk

        // $current = "http://www.yaksport.se/test dsft";

        $current = url()->current();

        $canonicalUrl = $current;

        if (Str::startsWith($current, 'https://www')) {
            $canonicalUrl = Str::replaceFirst('https://www.', 'https://', $current);
        }
        if (Str::startsWith($current, 'http://www')) {
            $canonicalUrl = Str::replaceFirst('http://www.', 'https://', $current);
        }
        
        // Change from .com, .se, .no, .de to .dk
        $canonicalUrl = Str::replaceFirst(".com", '.dk', $canonicalUrl);
        $canonicalUrl = Str::replaceFirst(".se", '.dk', $canonicalUrl);
        $canonicalUrl = Str::replaceFirst(".de", '.dk', $canonicalUrl);
        $canonicalUrl = Str::replaceFirst(".no", '.dk', $canonicalUrl);

        return  $canonicalUrl;

    }

    /**
     * used for json to send Response
     */
    public static function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    /**
     * used for json to send Error response
     */
    public static function sendError($error, $errorMessages = [], $code = 404)
    {

        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);

    }

    /**
     * get month and year as intenger and
     * return array of startDay and EndDate carbon object
     *
     * @param [integer] $month 1..12
     * @param [ineger] $year 4 digit number
     * @return array(CarbonDate object, Carbon date object)
     */
    public static function getStartEndTimeObject($month, $year) {

        $startDate = Carbon::now();

        // Set charge_date month start of month and end of month
        $startDate->setMonth($month)->setYear($year)->setDay(1)->startOfDay();

        $endDate = $startDate->copy();
        $endDate->endOfMonth()->endOfDay();

        return array($startDate->copy(), $endDate->copy());

    }

    /**
     * retuirn laravel response->json to array
     *
     * @param [type] $response
     * @return void
     */
    public static function jsonResponseToArray($response) {

        return json_decode($response->content(), true);

    }


    /**
     * used for json to send Response
     */
    public static function getPrice($price)
    {

        return $price . ' Kr.';
    }


}

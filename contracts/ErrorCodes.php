<?php
namespace Noorfarooqy\LaravelOnfon\Contracts;

enum ErrorCodes:string {
    case _001 = 'Default Error description';
    case _002 = 'SMS - Invalid format number ';

    public static function getErrorDescription($error)
    {
        if (!$error) {
            return '';
        }

        $cases = static::cases();
        foreach ($cases as $key => $case) {
            if ($case->name == $error) {
                return $case->value;
            }

        }

        return 'Uknown error description';
    }
}

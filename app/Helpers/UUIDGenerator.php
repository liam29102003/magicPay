<?php
namespace App\Helpers;

use App\Models\Transaction;
use App\Models\Wallet;

class UUIDGenerator {
    public static function accountNumber() {
        $number = mt_rand(100000000,999999999);
        if(Wallet::where("account_number", $number)->exists()) {
            self::accountNumber();
        }
        return $number;
    }
    public static function refNumber() {
        $number = mt_rand(100000000,999999999);
        if(Transaction::where("ref_no", $number)->exists()) {
            self::accountNumber();
        }
        return $number;
    }
}

?>
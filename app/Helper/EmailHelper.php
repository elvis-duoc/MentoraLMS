<?php

namespace App\Helper;

use Modules\EmailSetting\App\Models\EmailSetting;

class EmailHelper{


    public static function mail_setup(){

        $setting_data = EmailSetting::all();

        $email_setting = array();

        foreach($setting_data as $data_item){
            $email_setting[$data_item->key] = $data_item->value;
        }

        $email_setting = (object) $email_setting;


        $setting =  [
            'transport' => 'smtp',
            'host' => $email_setting->mail_host,
            'port' => $email_setting->mail_port,
            'encryption' => $email_setting->mail_encryption,
            'username' => $email_setting->smtp_username,
            'password' => $email_setting->smtp_password,
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN')
        ];

        config(['mail.mailers.smtp' => $setting]);
        config(['mail.from.address' => $email_setting->email]);
        config(['mail.from.name' => $email_setting->sender_name]);

    }
}

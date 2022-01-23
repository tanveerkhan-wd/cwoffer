<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Config;
use App\Models\Setting;
use Mail;
class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //SMTP DETAILS
        $smtp_det =Setting::where('text_key','smtp_mailer')
                ->orWhere('text_key','smtp_host')
                ->orWhere('text_key','smtp_port')
                ->orWhere('text_key','smtp_email')
                ->orWhere('text_key','smtp_password')
                ->orWhere('text_key','smtp_enc')->get();

        foreach($smtp_det as $smtp) {
            if($smtp->text_key=='smtp_mailer'){
                $setting['smtp']['mailer'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_host'){
                $setting['smtp']['host'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_port'){
                $setting['smtp']['port'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_email'){
                $setting['smtp']['email'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_password'){
                $setting['smtp']['password'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_enc'){
                $setting['smtp']['enc'] = $smtp->text_value ? $smtp->text_value : '';
            }
        }
        if (!empty($setting['smtp'])) //checking if table is not empty
        {
            $config = array(
                'driver'     => $setting['smtp']['mailer'],
                'host'       => $setting['smtp']['host'],
                'port'       => $setting['smtp']['port'],
                'from'       => array('address' => $setting['smtp']['email'], 'name' => 'City Worth Offer'),
                'encryption' => $setting['smtp']['enc'],
                'username'   => $setting['smtp']['email'],
                'password'   => $setting['smtp']['password'],
                'sendmail'   => '/usr/sbin/sendmail -bs',
                'pretend'    => false,
            );
            Config::set('mail', $config);
        }
    }
}

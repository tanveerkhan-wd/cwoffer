<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmailLog;
use App\Mail\SendCronEmail;
use Twilio\Rest\Client;
use Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send auto email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //SEND EMAILS AND SMS CRON 
        $getAllPendingEmail = EmailLog::where('email_status',2)->get();
        foreach ($getAllPendingEmail as $key => $value) {
            if ($value->type==2) {
                //SEND EMAILS
                $msg = $value->email_content;
                $subject = $value->subject;
                
                if (!empty($value->email_id)) {

                    try {
                        Mail::to($value->email_id)->send(new SendCronEmail($msg,$subject));
                    } catch (\Exception $e) {
                        $error_msg = $e->getMessage();    
                    }
                    if (isset($error_msg) && !empty($error_msg)) {
                        EmailLog::where('email_log_id',$value->email_log_id)->update(['email_status'=>3,'email_attempt'=>$value->email_attempt+1,'email_error_message'=>$error_msg]);    
                    }else{
                        EmailLog::where('email_log_id',$value->email_log_id)->update(['email_status'=>1,'email_attempt'=>$value->email_attempt+1]);   
                    }

                }else{
                    EmailLog::where('email_log_id',$value->email_log_id)->update(['email_status'=>3,'email_attempt'=>$value->email_attempt+1,'email_error_message'=>'No email_id found']);
                }
            }elseif ($value->type==1) {
                //SEND SMS
                if (!empty($value->phone)) {
                    try 
                    {
                        $msg = $value->email_content;
                        $account_sid = getenv("TWILIO_SID");
                        $auth_token = getenv("TWILIO_AUTH_TOKEN");
                        $twilio_number = getenv("TWILIO_NUMBER");
                        $client = new Client($account_sid, $auth_token);
                        $client->messages->create($value->phone,['from' => $twilio_number, 'body' => $msg] );
                    }
                    catch (\Exception $e) {
                        EmailLog::where('email_log_id',$value->email_log_id)->update(['email_status'=>3,'email_attempt'=>$value->email_attempt+1,'email_error_message'=>'Mobile number is wrong']);
                        continue;
                        $exception = true;
                    }
                    if (!isset($exception)) {
                        EmailLog::where('email_log_id',$value->email_log_id)->update(['email_status'=>1,'email_attempt'=>$value->email_attempt+1]);   
                    }
                }else{
                    EmailLog::where('email_log_id',$value->email_log_id)->update(['email_status'=>3,'email_attempt'=>$value->email_attempt+1,'email_error_message'=>'No Phone Number found']);   
                }

            }
        }

    }
}

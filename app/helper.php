<?php
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;



function ___mail_sender($email, $template_code, $data)
{
    $template = EmailTemplate::where('variable_name', $template_code)->first();
    if (!empty($template)) {
        $variables = explode(',', $template->variables);
        $subject = $template->subject;
        $body = $template->description;
        foreach ($variables as $item) {
            $subject = str_replace($item, $data[str_replace(array('{', '}'), '', $item)], stripslashes(html_entity_decode($subject)));
            $body = str_replace($item, $data[str_replace(array('{', '}'), '', $item)], stripslashes(html_entity_decode($body)));
        }
        Config::set(['port' => env("MAIL_PORT"), 'host' => env("MAIL_HOST"), 'username' => env("MAIL_USERNAME"), 'password' => env("MAIL_PASSWORD")]);

        $sender = ['subject' => $subject, 'email' => $email, 'from' => ['address' => 'satyam.kaushik@concentrix.com', 'name' => 'PMO']];
        if (!empty($body) && !empty($email)) {
            Mail::send('emails.default', ['body' => $body], function ($message) use ($sender, $data) {
                $message->to(
                    $sender['email']
                )
                    ->subject($sender['subject'])
                    ->from(
                        $sender['from']['address'],
                        $sender['from']['name']
                    );
                // Check if $data['pdf'] exists before attaching it
             
            });
        }
    }
}



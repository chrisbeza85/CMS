<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

class PHPMailerController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.sendemail');
    }

    public function store(Request $request)
    {
        $mail = new PHPMailer(true);

        try {
            // Set mailer to use SMTP
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST'); // smtp.gmail.com
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
            $mail->Port = 587; // Port for TLS

            // Set up OAuth
            $provider = new Google([
                'clientId'     => env('MAIL_OAUTH_CLIENT_ID'),
                'clientSecret' => env('MAIL_OAUTH_CLIENT_SECRET'),
            ]);

            $mail->setOAuth(
                new OAuth([
                    'provider'        => $provider,
                    'clientId'        => env('MAIL_OAUTH_CLIENT_ID'),
                    'clientSecret'    => env('MAIL_OAUTH_CLIENT_SECRET'),
                    'refreshToken'    => env('MAIL_OAUTH_REFRESH_TOKEN'),
                    'userName'        => env('MAIL_USERNAME'),
                ])
            );

            // Sender and recipient settings
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $request->subject;
            $mail->Body    = $request->body;

            // Send email
            $mail->send();

            return back()->with("success", "Email has been sent.");

        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }
}

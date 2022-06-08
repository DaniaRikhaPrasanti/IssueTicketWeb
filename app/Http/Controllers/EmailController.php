<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
 
class EmailController extends Controller
{
	public function index(){

        $email = 'daniarikha8@gmail.com';
        $data = [
            'title' => 'Selamat datang',
            'url' => 'https://issueticketweb.id',

        ];

		Mail::to($email)->send(new Email($data));
 
		return "Email telah dikirim";

        // Mail::to("testing@malasngoding.com")->send(new MalasngodingEmail());
 
		// return "Email telah dikirim";
 
	}
 
}
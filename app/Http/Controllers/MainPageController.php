<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Message;
use App\Models\Sub;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MainPageController extends Controller
{
    use GeneralTrait;
    public function newVisit(Request $request)
    {
        try {
            Visitor::create([
                "IP" => $ip = $request->ip(),
                "country" => Location::get($ip)->countryName ?? 'Local',
                "city" => Location::get($ip)->cityName ?? 'Local',
                "region" => Location::get($ip)->regionName ?? 'Local',
                "code" => Location::get($ip)->countryCode ?? 'SY',
            ]);
            return $this->success();
        } catch (\Exception $e) {
            return $this->fail($e->getMessage(), 500);
        }
    }

    public function subscribe(Request $request)
    {
        try {
            $validator = Validator::make($request->only('email'), [
                'email' => ['required', 'email', 'unique:subs,email', 'min:7', 'max:255',]
            ]);
            if ($validator->fails())
                return $this->fail($validator->errors()->first(), 400);
            $sub = Sub::create([
                'email' => $request->email,
                'key' => Hash::make((string)(Carbon::now()) . Str::random(32)), // to remove subscribtion
                'IP' => $ip = $request->ip(),
                "country" => Location::get($ip)->countryName ?? 'Local',
                "city" => Location::get($ip)->cityName ?? 'Local',
                "region" => Location::get($ip)->regionName ?? 'Local',
                "code" => Location::get($ip)->countryCode ?? 'SY',
            ]);
            $details = [
                "email" => $request->email,
                "key" => (string) $sub->key
            ];
            dispatch(new SendEmail($details, "subsecribeEmail"));
            return $this->success("Thanks for Subscribtion !", [], 201);
        } catch (\Exception $e) {
            return $this->fail($e->getMessage(), 500);
        }
    }

    public function sendMessage(Request $request)
    {
        try {
            $validator = Validator::make($request->only('email', 'name', 'subject', 'message_body'), [
                'name' => ['required', 'string', 'min:2', 'max:255'],
                'email' => ['required', 'email', 'min:7', 'max:255'],
                'subject' => ['required', 'string', 'min:2', 'max:255'],
                'message_body' => ['required', 'string', 'min:2', 'max:100000']
            ]);
            if ($validator->fails())
                return $this->fail($validator->errors()->first(), 400);
            Message::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'msg' => $request->message_body,
                'IP' => $ip = $request->ip(),
                "country" => Location::get($ip)->countryName ?? 'Local',
                "city" => Location::get($ip)->cityName ?? 'Local',
                "region" => Location::get($ip)->regionName ?? 'Local',
                "code" => Location::get($ip)->countryCode ?? 'SY',
            ]);
            return $this->success("Your message has been successfully sent, Thank you!", [], 201);
        } catch (\Exception $e) {
            return $this->fail($e->getMessage(), 500);
        }
    }

    public function getHomeData()
    {
        $data = [
            "personal_information" => [
                "full_name" => "Philip Marwan Droubi",
                "name" => "Philip Droubi",
                "firsy_name" => "Philip",
                "middle_name" => "Marwan",
                "last_name" => "Droubi",
                "address" => "Syria Damascus, Jaramana",
                "citizenship" => "Arab Syrian",
                "date_of_birth" => "August 29,2001",
                "recruitment_state" => "Exempted",
                "birth_year" => 2001,
                "age" => Carbon::parse('2001-08-29')->age
            ],
            "skills" => [
                "php",
                "Laravel",
                "SQL",
                "MySQL",
                "HTML",
                "CSS",
                "JavaScript",
                "java",
                "Git, GitHub & GitLab"
            ],
            "phone_num" => "+963 959 880 596",
            "email" => "philipdroubi@gmail.com",
            "socials" => [
                "facebook" => "https://www.facebook.com/philipp.droubi.1",
                "linkedIn" => "https://www.linkedin.com/in/philip-droubidsadassadsad",
                "github" => "https://github.com/Philip-Droubi"
            ],
        ];
        return $this->success('ok', $data);
    }

    public function fixVisitors(Request $request)
    {
        $visits = Visitor::query()->paginate(100);
        $i = 1;
        foreach ($visits as $visit) {
            // $location = Location::get($visit->IP);
            // while (!$location) {
            //     $location = Location::get($visit->IP);
            // }
            // $visit->country = $location->countryName ?? 'Local';
            // $visit->city = $location->cityName ?? 'Local';
            // $visit->region = $location->regionName ?? 'Local';
            // $visit->code = $location->countryCode ?? 'SY';
            $visit->id = $i;
            $visit->save();
            $i++;
        }
        return $this->success('ok', $i);
    }
}

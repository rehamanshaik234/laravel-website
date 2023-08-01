<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use GuzzleHttp\Client;


// use Orhanerday\OpenAi\OpenAi;

class CustomAuthController extends Controller
{
      public function login(){
        if(Session::has('loginId')){
          Session::pull('loginId');
        }
        return view('login');
      }

      public function registration(){

        return view("registration");
      }

      public function registerUser(REQUEST $request){
        $request->validate(
          [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            'prompt'=>'required',
          ]
          );
          $user= new User();
          $user->name= $request->name;
          $user->email= $request->email;
          $user->password=$request->password;
          $client = new Client();

          // $open_ai= new OpenAi('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');
          // $complete=$open_ai->image($data);
          // $ch= curl_init();
          // curl_setopt($ch,CURLOPT_URL,"https://api.openai.com/v1/images/generations");
          // curl_setopt($ch,CURLOPT_POST,1);
          // curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
          // curl_setopt($ch,CURLOPT_POSTFIELDS,$req);
          // $header =array();
          // $header[]='Content-Type: application/json';
          // $header[]='Authorization:Bearer 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';
          // curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
          // $result=curl_exec($ch);
          // curl_close($ch);
          // $decode=json_decode($result);
          $endpoint = 'https://api.openai.com/v1/images/generations';
          // API key
$api_key = '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';

// Request headers with API key
$headers = [
    'Authorization' => 'Bearer ' . $api_key,
    'Content-Type' => 'application/json',
];

// Request body (if required)
$data = [
    'prompt' => $request->prompt,
    'n' => 1,
    'size'=>'256x256',
];

// Make the POST request
$response = $client->post($endpoint, [
    'headers' => $headers,
    'json' => $data, // Use 'json' key to send JSON data in the request body
]);

// Get the response body
      $body = $response->getBody()->getContents();
           
          $user->url=$body;
          $res= $user->save();
          if($res){
            return back()->with('success','you have registered succesfully');
          }else{
            return back()->with('fail','registration failed');
          }
      }

      public function loginUser(REQUEST $request){
        $request->validate(
          [
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
          ]
          );
          $user= User::where('email','=',$request->email)->first();
          if($user){
            if($user->password==$request->password){
              $session=session()->put('loginId',$user->id);
            return redirect('/home');
            }else{
            return back()->with('fail','Password not matches');
            }
          }else{
            return back()->with('fail','Login failed');
          }
      }

      public function home(){
        $data =array();
        $registered=array();
        if(Session::has('loginId')){
          $registered=User::all();
          foreach($registered as $peoples){
            if($peoples->id!=Session::get('loginId')){
              $data[]=$peoples;
            }
          }
          return view('home',compact('data'));
        }
      }

      public function profile(Request $request){
        // $request->validate(
        //   [
        //     'prompt'=>'required'
        //   ]
        //   );

          return view('profile');
      }
    
}

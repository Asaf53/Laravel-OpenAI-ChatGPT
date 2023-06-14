<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chatController extends Controller
{
    public function gptPromt(Request $request)
    {
        if ($request->isMethod('get')) {
            echo 'REQUEST GET';
            return view('test');
        }

        if ($request->isMethod('post')) {
            echo 'REQUEST POST';
            echo '<br>';
            $message = $request->input('message');

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://openai80.p.rapidapi.com/chat/completions",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $message
                        ]
                    ]
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: openai80.p.rapidapi.com",
                    "X-RapidAPI-Key: 000e852219mshc8b90b252149f1fp1e9555jsnc2b66affc287",
                    "Content-Type: application/json"
                ],
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            if ($error) {
                echo "cURL Error #:" . $error;
            } else {
                $response_decoded = json_decode($response, true);

                $content = $response_decoded['choices'][0]['message']['content'];

                // if (isset($response_decoded['choices'][0]['message']['content'])) {
                //     $content = $response_decoded['choices'][0]['message']['content'];
                // } else {
                //     echo "Error: Could not find 'text' key in response.";
                // }

                // Debugging statement to inspect response from API
                // echo "<pre>" . print_r($response_decoded, true) . "</pre>";
                // dd($content);
            }
            $text = $content;


            return view('test', compact('text'));
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Pushnotification;
use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;


class PushnotificationController extends Controller
{
    public function saveSubscription(Request $request)
    {
        $subjson=json_encode($request->all());
        $subscription= Pushnotification::create([
            'subscriptions'=>$subjson,
        ]);
        

        return response()->json(['message'=>'added successfully'],200);
    }

    public function sendNotification(Request $request)
    {
        $auth = [
            'VAPID' => [
                'subject' => 'http://127.0.0.1:8001', // can be a mailto: or your website address
                'publicKey' => 'BOmVmyyKSWyCgGno4I7lMzghrLPUmXSSyyG2qwflnMGCUpgio4RC5En5jPhVZI2gOLAKv18JvVUkuGIq7K2NAPQ', // (recommended) uncompressed public key P-256 encoded in Base64-URL
                'privateKey' => '5S_yXFFg_vEoE3Gtuc6RdQ45HsSMCIU3StHOa8vi1Lw', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
                
            ],
        ];
        
        $webPush = new WebPush($auth);

        $payload=json_encode([
            'title'=>$request->title,
            'body'=>$request->description
        ]);
        $notifications = Pushnotification::all();
      
        foreach($notifications as $notification)
        {    
       $subscriptionsArray=json_decode($notification->subscriptions,true) ;  
            $webPush->sendOneNotification(
                Subscription::create($subscriptionsArray),
                $payload,['TTL'=>5000]
        );
        }
        return response()->json([
            'success' => true,
            'message' => 'Push notification sent successfully!'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\Code;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class MailController
{
    
    /**
     * 发送验证码
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function send(Request $request): array
    {
        $requestParams = $request::validate([
            'to'      => ['required', 'string'],
            'content' => ['required', 'string'],
            'subject' => ['required', 'string'],
        ]);
        
        $code = (new Code(
            $requestParams['content']
        ))->subject($requestParams['subject']);
        
        Mail::to($requestParams['to'])
            ->send($code);
        
        return [
            'code' => 0,
            'data' => [],
            'msg'  => '发送成功',
        ];
    }
    
}
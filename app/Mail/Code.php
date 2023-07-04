<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * 验证码
 *
 * @author beta
 */
class Code extends Mailable
{
    
    use Queueable, SerializesModels;
    
    /**
     * 内容
     *
     * @var string
     */
    private string $content;
    
    /**
     * 创建一个新的消息实例
     *
     * @return void
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }
    
    /**
     * 构建消息
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->view('code', [
            'content' => $this->content,
        ]);
    }
    
}

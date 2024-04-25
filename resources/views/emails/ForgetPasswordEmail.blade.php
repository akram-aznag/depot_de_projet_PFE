@component('mail::message')
<h1>Dear {{$user->name}}</h1>
<p>It seems you've requested a password reset for your account. No worries, we've got you covered!</p>
<p> To set a new password and regain access to your account, please follow the instructions below:</p>
<ol>
    <li>Click on the following link to reset your password:
    @component('mail::button',['url'=>route('Modify-Password',['token'=>$user->remember_token])])reset password @endcomponent
    </li>
    <li>If the link doesn't work, copy and paste it into your browser's address bar.</li>
    <li>Follow the prompts to create a new password. For security reasons, we recommend choosing a strong password that includes a combination of letters, numbers, and special characters.</li>
</ol>

<p>
    Once your password is reset, you'll be able to log in to your account and resume your activities as usual.
</p>
<p>
    If you didn't request this password reset or if you have any concerns about the security of your account, please contact our support team immediately at fictioncaze@email.com. We take the security of your account seriously and will investigate any suspicious activity promptly.
</p>
<p>
    Thank you for your attention to this matter. We appreciate your cooperation in ensuring the security of your account.
</p>
<p>
    Thank you for your attention to this matter. We appreciate your cooperation in ensuring the security of your account.
</p>
<p>
    Akram Aznag
    <br>
    App owner
    <br>
    InsightfulBlogs
     <br>
   </p>
    
@endcomponent
@component('mail::message')
    <h1>Dear {{$user->name}}</h1>
    <p>
        Welcome aboard! We're thrilled to have you join our community and embark on this journey with us. Your presence adds tremendous value, and we can't wait to see what we can achieve together.

Before you dive into all the exciting features and opportunities awaiting you, we kindly ask you to verify your email address. This step ensures the security of your account and allows us to keep you updated on the latest happenings within our community.

To verify your email and gain access to your account, simply click on the verification link provided below:
    </p>
    @component('mail::button',['url'=>route('VERIFYEMAIL',['token'=>$user->remember_token])])

    verify email
    @endcomponent
    <p>
        If the link doesn't work, you can copy and paste it into your browser's address bar.

Once your email is verified, you'll be able to explore everything our platform has to offer, connect with fellow members, and make the most of your experience.

If you have any questions or encounter any issues during the verification process, don't hesitate to reach out to our support team at fictioncaze@gmail.com. We're here to help!

Thank you for choosing to be a part of our community. We look forward to seeing you thrive and succeed with us.

Best regards,
    </p>
    <p>in case you have problems conact us thanks</p>
   <p>
    Akram Aznag
    <br>
    App owner
    <br>
    InsightfulBlogs
     <br>
   </p>
@endcomponent
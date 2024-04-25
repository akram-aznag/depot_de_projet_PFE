@component('mail::message')
    <h1>Dear {{ $post->user->name }},</h1>
    <p>Post title:{{$post->title}}</p>
    <p>Post description:{{$post->description}}</p>
   

  <p>We are pleased to inform you that your recent post has been approved by our admin team and will soon be published on our platform.</p>

  <p>Your post will be visible to our audience shortly. Should you have any questions or need further assistance, feel free to reach out to us.</p>

  <p>  If you have any questions or encounter any issues, please contact us at fictioncaze@gmail.com.</p>
  <p>Best regard</p>
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


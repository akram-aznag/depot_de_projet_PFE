@component('mail::message')
    <h1>Dear {{ $post->user->name }},</h1>
    <p>Your post details:</p>
    <table class="table table-bordered" border="1">
        <thead>
          <tr>
            <th scope="col">Post ID</th>
            <th scope="col">Post Title</th>
            <th scope="col">Post Description</th>
            <th scope="col">Post State</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->is_published=="no"?'in-review':'' }}</td>
          </tr>
        </tbody>
    </table>

  <p>We want to inform you that your post has been created successfully, but it requires admin authorization to be published. Thank you for your contribution.</p>

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


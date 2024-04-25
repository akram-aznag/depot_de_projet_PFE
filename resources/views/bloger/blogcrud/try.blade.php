<form action="{{url('/get-data')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="">
    <button type="submit">submit</button>

</form>
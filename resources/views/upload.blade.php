@include('./layouts/header')

<body>
    <div class="container">
        <form action="{{ url('/') }}/upload/save" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload your file here.....</label>
                <input name="data" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>
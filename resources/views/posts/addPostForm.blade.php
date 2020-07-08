@include('posts.includes.header')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Post</h4>
        <h6 class="card-subtitle">Please fill the form below to Add New Posts</h6>
        
        @if(count($errors)>0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form action="/insertPost" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Post title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Please Enter Title" required>

            </div>
            <div class="form-group">
                <label for="content">Content</label><br>
                <textarea name="content" id="content" cols="30" rows="5" required></textarea>

            </div>
            <div class="form-group">
                <label for="imgae">Please Provide Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>        

        @include('posts.includes.footer')

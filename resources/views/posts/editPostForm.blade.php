@include('posts.includes.header')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Post</h4>
        <h6 class="card-subtitle">Please fill the form below to update</h6>
        @if(count($errors)>0)
        <ul>
            @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form action="/updatePost" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="postId" value="{{$post->id}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">post Title</label>
                        <input type="text" name="title" class="form-control" required autofocus
                            value="{{$post->title}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" cols="30" rows="5" class="form-control"
                            required>{!!$post->content!!}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image"
                        data-default-file="../images/{{$post->image}}">
                    <img src="../../images/{{$post->image}}" height="100 px">
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">

                        <button type="submit" class="btn btn-success">Update</button>

                    </div>


        </form>
    </div>
</div>
@include('posts.includes.footer')

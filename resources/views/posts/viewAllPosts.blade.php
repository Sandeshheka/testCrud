@include('posts.includes.header')
@if (session('success'))
<div class="alert alert-primary" role="alert">
    {{session('success')}}

</div>
@endif

<div class="card">
    <a href="/addPost" data-toggle="tooltip" data-placement="top" title="Add Post " id="delete-btn"> <button
            class="btn btn-danger btn--icon"><i></i>Add New Post</button> </a>
    <div class="card-body">
        <h4 class="card-title">All Posts </h4>
        <h6 class="card-subtitle"></h6>

        <div class="table-responsive " style="padding: 10px">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Post Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key=>$p)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$p->title}}</td>
                        <td>{{$p->content}}</td>
                        <td><img src="../../images/{{$p->image}}" height="100 px"></td>


                        <td>
                            <a href="editPost/{{$p->id}}" data-toggle="tooltip" data-placement="top" title="Edit Post ">
                                <button class="btn btn-success btn--icon"><i></i>Edit</button> </a>
                            <a href="deletePost/{{$p->id}}" data-toggle="tooltip" data-placement="top"
                                title="Delete Post " id="delete-btn"> <button
                                    class="btn btn-danger btn--icon"><i></i>Delete</button> </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>

@include('posts.includes.footer')

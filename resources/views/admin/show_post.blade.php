<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
        .title_deg{
            font-size:30px;
            font-weight:bold;
            color:white;
            padding:30px;
            text-align:center;
        }
        .table_deg{
            border:1px solid white;
            width:80%;
            text-align:center;
            margin-left:70px;
        }
        .th_deg{
            background-color: skyblue;
        }

        .img_deg{
            height:100px;
            width:150px;
            padding:10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

        <div class="page-content">
            @if(session()->has('message'))

            <div class="alert alert-danger text-red-400">
                <button type="button" class="close bg-white" data-dismiss="alert"
                aria-hidden="true">x</button>

                {{session()->get('message')}}
            </div>

            @endif
            <h1 class="title_deg">All Post</h1>
            <table class="table_deg">
                <tr class="th_deg">
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Post By</th>
                    <th>Post status</th>
                    <th>UserType</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
                @foreach($post as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->usertype}}</td>
                    <td>
                        <img class="img_deg" src="postimage/{{$post->image}}">
                    </td>
                    <td>
                        <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure to Delete this?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @include('admin.footer')
  </body>
</html>


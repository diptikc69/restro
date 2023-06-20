<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
            .div_center
            {
                text-align: center;
                padding-top: 30px;

            }

            .h2_font
            {
                font-size: 30px;
                padding-bottom: 30px;
            }

            .input_color
            {
                color: black;
            }

            .center
            {
              margin: auto;
              width: 50%;
              text-align: center;
              margin-top: 30px;
              border: 3px solid white;

            }


        </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')

      <div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type"button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

          </div>

          @endif
          <div class="div_center">
          <h2 class="h2_font">Add Category</h2>
            <!--Form Action-->
          <form action="{{url('/add_category')}}" method="POST">
          @csrf
          <input class="input_color" type="text" name="category" placeholder="Write category name">
          
          <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
          </form>
            </div>

          <!--Table Action-->
          <table class="center">
            <tr>
              <td>Category Name</td>
              <td>Delete</td>
              <td>Edit</td>
             </tr>



          <!--Data from Database and Delete-->
          @foreach($data as $data)
            <tr>
              <td>{{$data->category_name }}</td>
              <td>
                <a onclick="return confirm('Are you sure to delete this category?')"class="btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
              </td>

              <td>
                <a onclick="return confirm('Are you sure to edit this category?')"class="btn-success" href="{{url('update_category',$data->id)}}">Edit</a>
              </td>
            </tr>

            @endforeach

          </div>
        </div>

       
    @include('admin.script')
  </body>
</html>
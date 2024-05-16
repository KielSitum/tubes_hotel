<!DOCTYPE html>
<html>
  <head>
    
<base href = "/public">
    @include('admin.css')

    <style>
        label
        {
            display: inline-block;
            width: 200px;
        }

        .div_design
        {
            padding-top: 20px;
        }

        .div_center
        {
            padding-top: 40px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Update Room</h1>
            <div class="div_center">

                <form action="{{url('edit_room', $data->id)}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label for="">Room Title</label>
                        <input type="text" name="title" value="{{$data->room_title}}">
                    </div>
                    <div class="div_design">
                        <label for="">Description</label>
                        <textarea name="description">{{$data->description}}
                        </textarea>
                    </div>
                    <div class="div_design">
                        <label for="">Price</label>
                        <input type="number" name="price" value ="{{$data->price}}">
                    </div>
                    <div class="div_design">
                        <label for="">Room Type</label>
                        <select name="type">

                            <option selected value = "{{$data->room_type}}">{{$data->room_type}}</option>
                            
                            <option value="reguler">Reguler</option>
                            <option value="superior">Superior</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>
                    <div class="div_design">
                        <label for="">Wifi</label>
                        <select name="wifi">

                            <option selected value = "{{$data->wifi}}">{{$data->wifi}}</option>

                            <option selected value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="div_design">
                        <label>Current Image</label>
                        <img style="margin: auto;" width ="100" src="/room/{{$data->image}}">
                    </div>

                    <div class="div_design">
                        <label>Upload Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_design">
                        <input class="btn btn-primary" type="submit" value="Update Room">
                    </div>
                </form>

            </div>
          </div>
        </div>
    </div>

    @include('admin.footer')
  </body>
</html>
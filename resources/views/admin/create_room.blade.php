<!DOCTYPE html>
<html>
  <head> 
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
            <h1>Add Room</h1>
            <div class="div_center">

                <form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label for="">Room Title</label>
                        <input type="text" name="title">
                    </div>
                    <div class="div_design">
                        <label for="">Description</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div class="div_design">
                        <label for="">Price</label>
                        <input type="number" name="price">
                    </div>
                    <div class="div_design">
                        <label for="">Room Type</label>
                        <select name="type">
                            <option selected value="reguler">Reguler</option>
                            <option value="superior">Superior</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>
                    <div class="div_design">
                        <label for="">Wifi</label>
                        <select name="wifi">
                            <option selected value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="div_design">
                        <label>Upload Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_design">
                        <input class="btn btn-primary" type="submit" value="Add Room">
                    </div>
                </form>

            </div>
          </div>
        </div>
    </div>

    @include('admin.footer')
  </body>
</html>
<!DOCTYPE html>
<html>
  <head> 

    <base href="/public">
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
      <!-- Sidebar Navigation end-->
    
    
  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">

      <center>

        <h1 style="font-size: 30px; font-weight: bold">Mail send 
        to {{$data->name}}</h1>

        <form action="{{url('mail',$data->id)}}" method="Post">
                    @csrf
                    <div class="div_design">
                        <label for="">Greeting</label>
                        <input type="text" name="greeting">
                    </div>
                    <div class="div_design">
                        <label for="">Mail Body</label>
                        <textarea name="body"></textarea>
                    </div>
                    <div class="div_design">
                        <label for="">Action Tect</label>
                        <input type="text" name="action_text">
                    </div>

                    <div class="div_design">
                        <label for="">Action Url</label>
                        <input type="text" name="action_url">
                    </div>


                    <div class="div_design">
                        <label for="">End Line</label>
                        <input type="text" name="endline">
                    </div>
                    
                   

                    <div class="div_design">
                        <input class="btn btn-primary" type="submit" value="Send Mail">
                    </div>
                </form>

      </center>


      </div>
    </div>
  </div>

      
   
        

        @include('admin.footer')
  </body>
</html>
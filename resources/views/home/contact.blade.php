<div id="contact" class="contact">
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="titlepage">
                   <h2>Contact Us</h2>
                   @if(session()->has('message'))
                       <div class="alert alert-success">
                           <button type="button" class="close" data-bs-dismiss="alert">X</button>
                           {{ session()->get('message') }}
                       </div>
                   @endif
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6">
               <form id="request" class="main_form" action="{{ url('contact') }}" method="POST">
                   @csrf
                   
                   <div class="row">
                     <div class="col-md-12">
                    </div>
                       <div class="col-md-12">
                           <input class="contactus" placeholder="Name" type="type" name="name"
                                   @if(Auth::id()) value="{{ Auth::user()->name }}" @endif required>
                       </div>
                       <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="email" name="email"
                                    @if(Auth::id())value="{{ Auth::user()->email }}" @endif required>
                       </div>
                       <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="number" name="phone"
                                    @if(Auth::id()) value="{{ Auth::user()->phone }}" @endif required>
                       </div>
                       <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="text" name="message"></textarea>
                       </div>
                       <div class="col-md-12">
                           <button type="submit" class="send_btn">Send</button>
                       </div>
                   </div>
               </form>
           </div>
           <div class="col-md-6">
               <div class="map_main">
                   <div class="map-responsive">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.17390531965!2d55.2720696957389!3d25.19735715902953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43348a67e24b%3A0xff45e502e1ceb7e2!2sBurj%20Khalifa!5e0!3m2!1sid!2sid!4v1716527278570!5m2!1sid!2sid"
                           width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                           referrerpolicy="no-referrer-when-downgrade"></iframe>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

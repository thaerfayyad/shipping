  <!-- slider -->
    <div id="" class="carousel slide wow shake" data-ride="carousel">

       <div class="carousel-inner">
        @foreach($slider_about as $key => $value)
          <div class="carousel-item   @if($key == 0) active @endif active-skew" style="background-image: url({{ URL::route('image.view', array('width' => 500, 'filename' => $value->image_file_name)) }})" >
             <img class="" src="{{ URL::route('image.view', array('width' => 500, 'filename' => $value->image_file_name)) }}" alt="First slide">
             @if($value->mask == '1')  <div class="skew" >
             </div> @endif
          </div>
          @endforeach

       </div>
    </div>

 <!-- End slider -->

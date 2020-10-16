@php 
    $main_one=DB::table('sliders')->where('main_slider_one',1)->orderBy('id','DESC')->first();
    $main_two=DB::table('sliders')->where('main_slider_two',1)->orderBy('id','DESC')->first();
@endphp

<!-- banner -->
<div class="banner-grid">
    <div id="visual">
            <div class="slide-visual">
                <!-- Slide Image Area (1000 x 424) -->
                <!-- imase size nia problem -->
                <ul class="slide-group">
                    <li><img class="img-responsive" src="{{asset($main_one->image_one)}}" style="height: 500px; width: 1000px;" alt="Dummy Image" /></li>
                    <li><img class="img-responsive" src="{{asset($main_one->image_two)}}" style="height: 500px; width: 1000px;" alt="Dummy Image" /></li> 
                    <li><img class="img-responsive" src="{{asset($main_one->image_three)}}"style="height: 500px; width: 1000px;" alt="Dummy Image" /></li>                  
                </ul>

                <!-- Slide Description Image Area (316 x 328) -->
                <div class="script-wrap">
                   <ul class="script-group">
                        <li><div class="inner-script"><img style="height: 285px; width: 276px;" class="img-responsive" src="{{asset($main_two->image_one)}}" alt="Dummy Image" /></div></li>
                        <li><div class="inner-script"><img style="height: 285px; width: 276px;" class="img-responsive" src="{{asset($main_two->image_two)}}" alt="Dummy Image" /></div></li>
                        <li><div class="inner-script"><img style="height: 285px; width: 276px;" class="img-responsive" src="{{asset($main_two->image_three)}}" alt="Dummy Image" /></div></li>
                    </ul>
                   
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    <script type="text/javascript" src="{{asset('fontend/js/pignose.layerslider.js')}}"></script>
    <script type="text/javascript">
    //<![CDATA[
        $(window).load(function() {
            $('#visual').pignoseLayerSlider({
                play    : '.btn-play',
                pause   : '.btn-pause',
                next    : '.btn-next',
                prev    : '.btn-prev'
            });
        });
    //]]>
    </script>

</div>
<!-- //banner -->
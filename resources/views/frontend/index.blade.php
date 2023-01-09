@extends('frontend.layout.app')
@section('title','A Mobile')
@push('style')
    <style>
       .sub-title{
        height: 100px;
        display: flex;
        align-items: center;
       }

       .sub-title-inner-width{
         width: 90%;
       }

       .tab-inner-width{
         width: 20%;
       }


       /* Style the tab */
.tab {
  overflow: hidden;

  display: flex;
}

/* Style the buttons inside the tab */
.tab .tablinks {
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  border: 1px solid #ccc;
  width: 100px;
  height: 20px;
  text-align: center;
  
}

/* Change background color of buttons on hover */
.tab .tablinks:hover {
    border: 1px solid #6899d2;
}

/* Create an active/current tablink class */
.tab .tablinks.active {
    border: 2px solid #6899d2;
}

/* Style the tab content */
.tabcontent {
  
  padding: 6px 12px;
  /* border: 1px solid #ccc; */
  border-top: none;
}
.tabcontent-2{
    display: none;
}

@media screen and (max-width: 991px) {
    .sub-title-inner-width{
         width: 55%;
       }
    .tab-inner-width{
        width: 100%;
    }
    .tab .tablinks {
        width: 100px;
        height: 20px;
    }
}


    </style>
@endpush
@section('content')
    <section class="row justify-content-center">
       <div class="col-lg-10 col-12 px-3 px-lg-5">
          @include('frontend.layout.swiper_slider.slider')

          <div class="row sub-title">
            <div class="col-12 py-3">
                <div class="px-1 d-flex justify-content-between align-items-lg-center ">
                   <div class="sub-title-inner-width d-block d-lg-flex justify-content-between align-items-center ">
                    <h3 class="mb-3 font-weight-bolder">Our New Arrivals</h3>
                    <div class="tab p-lg-2 tab-inner-width d-lg-flex justify-content-between mt-2"> 
                        <div class="tablinks rounded-4 active" onclick="opemTab(event, 'Phone')">London</div>
                        <div class="tablinks rounded-4 " onclick="opemTab(event, 'Laptop')">Paris</div>
                    </div>
                    
                   </div>
                   <a href="http://" class="font-weight-bolder">See All</a>
                </div>
            </div>
          </div>
          <div class="row new-arrivals-product">
            <div class="col-12 py-3">
                <div id="Phone" class="tabcontent">
                  <div class="row">
                   <div class="col-6 mb-2 p-1 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <span>Header</span>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, 
                        </div>
                    </div>
                   </div>
                   <div class="col-6 mb-2 p-1 col-lg-3">
                     <div class="card">
                            <div class="card-header">
                                <span>Header</span>
                            </div>
                            <div class="card-body">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                     </div>
                    </div>
                   </div>
                   <div class="col-6 mb-2 p-1 col-lg-3">
                     <div class="card">
                        <div class="card-header">
                            <span>Header</span>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, 
                        </div>
                     </div>
                   </div>
                   <div class="col-6 mb-2 p-1 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <span>Header</span>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis, 
                        </div>
                    </div>
                   </div>
                </div>
                  </div>

                <div id="Laptop" class="tabcontent tabcontent-2">
                   <h3>Paris</h3>
                   <p>Paris is the capital of France.</p> 
                </div>
            </div>
          </div>
       </div>
    </section>
@endsection
@push('script')
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
               el: ".swiper-pagination",
            },
            autoplay: {
              delay: 3000,
            },
         });

        function opemTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endpush
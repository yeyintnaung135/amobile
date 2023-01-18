@extends('frontend.layout.app')

@push('style')
<style>
  a:hover {
    color: #000;
  }
  h3, h4, .bold {
    font-weight: 600;
  }
  .sn-contact input {
    height: 45px;
  }
  .sn-contact textarea {
    height: 120px;
  }
  .contact-button {
    color: #fff;
    border: 1px solid #101d30;
    background: #101d30;
    width: 100%;
    padding: 10px;
  }
  .contact-button:hover {
    color: #101d30;
    border: 1px solid #101d30;
    background: transparent;
  }
  .contact-banner-container{
    display: flex;
    justify-content: center;
  }
  .contact-banner, .overlay {
    width: 80%;
    height: 500px;
    margin-left: 5%;
    border-radius: 5px;
  }
  .overlay {
    position: absolute; 
    bottom: 0; 
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.3); /* Black see-through */
    color: #f1f1f1; 
    height: 100%;
    transition: .5s ease;
    opacity:1;
    color: white;
    font-size: 20px;
    padding: 20px;
    text-align: center;
  }
  /* Tablet */
  @media (max-width: 767px) {
    
  }

  /* Mobile */
  @media screen and (max-width: 480px) {
    
  }
</style>
@endpush

@section('content')
<section class="row justify-content-center px-3 px-lg-5 py-5">
  <div class="container">
    <div class="row sn-contact">
      <div class="col-sm col-md-6 mb-4 pe-5">
        <h3>Contact Us</h3>
        <p class="text-secondary">Our Friendly team would love to hear from you!</p>
        <form action="" class="mt-4">
          @csrf
          <div class="form-group mb-3">
            <label for="phone" class="bold">Phone Number</label>
            <input type="number" class="form-control mt-1 bg-white" id="phone" aria-describedby="" placeholder="">
          </div>
          <div class="form-group mb-3">
            <label for="email" class="bold">Email</label>
            <input type="email" class="form-control mt-1 bg-white" id="email" aria-describedby="" placeholder="">
          </div>
          <div class="form-group mb-3">
            <label for="address" class="bold">Address</label>
            <textarea class="form-control mt-1 bg-white" id="address" rows="3"></textarea>
          </div>
          <button type="submit" class="btn contact-button mt-2">Submit</button>
        </form>
      </div>
      <div class="col-sm col-md-6 mb-4 ps-2 ">
        <div class="position-relative contact-banner-container">
          <img src="{{ asset('images/assets/contact.jpeg')}}" alt="" class="contact-banner">
          <div class="overlay"></div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
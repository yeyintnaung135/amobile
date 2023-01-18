@extends('frontend.layout.app')

@push('style')
<style>
  a:hover {
    color: #000;
  }
  h3, h4, .bold {
    font-weight: 600;
  }
  .sn-bar div {
    height: 3px;
    background: #ddd;
    width: 11%;
    border-radius: 10px;
  }
  .sn-bar .active {
    background: #101d30;
  }
  .billing-form input, .billing-form select {
    height: 45px;
    background: #f8f8f8;
    border: #f8f8f8;
    border-radius: 5px;
  }
  .billing-form .back-button, .billing-form .continue-button:hover {
    background: none;
    color: #101d30;
  }
  .billing-form .continue-button, .billing-form .back-button:hover {
    background: #101d30;
    color: #fff;
  }
  .billing-form .back-button,
  .billing-form .continue-button {
    border: 1px solid #101d30;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  }
  .fa-chevron-down {
    right: 40px;
    position: absolute;
    top: 40px;
    color: #8d8d8d;
  }
  .order-summary {
    background: #f8f8f8;
  }
  .order-summary h4 span {
    color: #8d8d8d;
    font-size: 18px;
  }
  .pro-info img {
    width: 75px;
    aspect-ratio: 1/1;
    background: #ddd;
  }
  .pro-info h5, .sub-total h5, .price-total h5 {
    width: 90%;
    font-weight: 900;
  }
  .pro-info span, .sub-total span {
    color: #686868;
  }
  .pro-info .price, .sub-total .price, .price-total .price {
    font-weight: 900;
    text-align: right;
    font-size: 17px;
    width: 90px;
  }
  .price-total .price {
    font-size: 19px;
  }
  .sub-total {
    border-bottom: 1px solid #ddd;
    padding: 15px 0;
  }
  /* Tablet */
  @media (max-width: 767px) {
    
  }

  /* Mobile */
  @media screen and (max-width: 480px) {
    .billing-form input, .billing-form select {
      background: #fff !important;
      border: 1px solid #9e9e9e !important;
    }
    .sn-bar div {
      width: 15%;
    }
    .pro-info h5, .pro-info .price {
      font-size: 16px;
    }
  }
</style>
@endpush

@section('content')
<section class="row justify-content-center px-3 px-lg-5 py-5">
  <div class="container">
    <form action="" method="" class="row billing-form">
      @csrf
      <div class="col-12 col-md-6">
        <div class="d-flex justify-content-center align-items-center sn-bar">
          <div class="me-3 active"></div>
          <div class="me-3"></div>
          <div></div>
        </div>
        <div class="mt-4 mt-md-5">
          <p class="text-secondary mb-1">Step 01</p>
          <h3 class="mb-4 mb-md-5">Billing Address</h3>
          <div class="form-group mb-3 mb-md-4">
            <label for="name" class="bold">Full Name</label>
            <input type="text" class="form-control mt-1" id="name" aria-describedby="" placeholder="">
          </div>
          <div class="form-group mb-3 mb-md-4">
            <label for="number" class="bold">Phone Number</label>
            <input type="number" class="form-control mt-1" id="number" aria-describedby="" placeholder="">
          </div>
          <div class="row mb-3 mb-md-4">
            <div class="form-group col-6 position-relative">
              <label for="state" class="bold">State</label>
              <i class="fas fa-chevron-down"></i>
              <select id="state" class="form-select mt-1" aria-label="Default select example">
                <option selected>State</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-6 position-relative">
              <label for="city" class="bold">City</label>
              <i class="fas fa-chevron-down"></i>
              <select id="city" class="form-select mt-1" aria-label="Default select example">
                <option selected>City</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-group mb-3 mb-md-4">
            <label for="building" class="bold">Apt, Suite, Building</label>
            <input type="text" class="form-control mt-1" id="building" aria-describedby="" placeholder="">
          </div>
        </div>
        <div class="d-none d-md-block">
          <div class="d-flex justify-content-between mt-5">
            <a class="back-button" href="{{ url('/') }}"><i class="fas fa-arrow-left me-2"></i> Back</a>
            <a class="continue-button" href="{{ url('/payment') }}">Continue to Payment</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="m-0 ms-md-5 p-4 p-md-5 my-3 order-summary">
          <h4>Order Summary <span>( 2 Items )</span></h4>
          <div class="d-flex align-items-start pro-info mt-5 mb-4">
            <img src="{{ url('images/products/samsung.png')}}" alt="" class="sn-product-image me-3 me-md-4 flex-fill">
            <div class="flex-fill me-2">
              <h5>Samsung Galaxy ZFold</h5>
              <span>Color : Purple</span>
            </div>
            <div class="flex-fill price">
              <p>$ 2500</p>
            </div>
          </div>
          <div class="d-flex align-items-start pro-info mt-5 mb-4">
            <img src="{{ url('images/products/samsung.png')}}" alt="" class="sn-product-image me-3 me-md-4 flex-fill">
            <div class="flex-fill me-2">
              <h5>Samsung Galaxy ZFold</h5>
              <span>Color : Purple</span>
            </div>
            <div class="flex-fill price">
              <p>$ 2500</p>
            </div>
          </div>
          <div class="d-flex align-items-between sub-total">
            <h5>Subtotal</h5>
            <div class="flex-fill price">
              <p>$ 2500</p>
            </div>
          </div>
          <div class="my-4">
            <p class="bold" style="color: green;">Use Discount Code</p>
          </div>
          <div class="d-flex align-items-between price-total">
            <h5>Total</h5>
            <div class="flex-fill price">
              <p>$ 2500</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 d-block d-md-none">
        <a class="continue-button w-100 mt-3" href="{{ url('/payment') }}">Continue to Payment</a>
      </div>
    </form>
  </div>
</section>
@endsection
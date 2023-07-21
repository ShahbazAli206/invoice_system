@extends('layouts.user_type.auth')
@section('content')
<div>
    <div class="row">
        <div class="col-12">
            <h1 class="page-title">Create New Estimate</h1>
<div class="container">
              <div class="row mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h5>New Estimate</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('adminpanel.Estimates.store')}}" method="post" enctype="multipart/form-data">
                                @csrf                                
                                <div class="row mb-3">
                                  <div class="col-md-5">
                                    <label for="category_id">Add Customer</label>
                                    <select name="customer_name" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                        <option value="{{$customer->name}}" style="color: rgb(6, 5, 5); font-size: 18px;" >{{$customer->name}}</option>       
                                    @endforeach 

                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>                                   
                                    @enderror
                                  </div>
          
          
                                 <div class="col-md-6">
                                   <div class="row mb-3">

                                    <div class="col-md-6">


                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="name">Estimate Date</label>
                                                <input type="date" name="estimate_date" id="price" class="form-control @error('price') is_invalid @enderror" >
                                                @error('price')
                                                <span class="invalid-feedback">
                                                    <strong>{{$message}}</strong> 
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="name">Estimate Number</label>
                                                <input type="text" name="estimate_no" id="price" class="form-control @error('price') is_invalid @enderror" value="{{$estno}}" readonly>
                                                @error('price')
                                                <span class="invalid-feedback">
                                                    <strong>{{$message}}</strong> 
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
            
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Expiray Date</label>
                                            <input type="date" name="expiray_date" id="price" class="form-control @error('price') is_invalid @enderror" >
                                            @error('price')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong> 
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                   </div>                                   
                                   </div>
                                 </div> 
                                </div>


                              
<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Choose a Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('attach.jpg') }}" class="img-fluid" alt="template-1" onclick="selectImage(this, 'template-1')">
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('attach.jpg') }}" class="img-fluid" alt="template-2" onclick="selectImage(this, 'template-2')">
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('attach.jpg') }}" class="img-fluid" alt="template-3" onclick="selectImage(this, 'template-3')">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 d-flex align-items-center">
                        <input type="checkbox" id="default_mark" name="radioOption" onclick="toggleRadio()">
                        <label for="default_mark" class="ms-2">Mark as default</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function selectImage(image, imageName) {
        var images = document.querySelectorAll('.img-fluid');
        images.forEach(function (img) {  img.classList.remove('selected'); });
        image.classList.add('selected');
        document.getElementById('buttonName').value = imageName;
        var button = document.getElementById('imageButton');
        button.textContent = imageName;
        var modal = bootstrap.Modal.getInstance(document.getElementById('imageModal'));  }

    function updateAmount() {
        var quantity = parseFloat(document.getElementById('quantity').value);
         console.log("Quantity: ", quantity);
         var quantity2 = parseFloat(document.getElementById('pric').value);
         var amount = quantity || 0;
         document.getElementById('amount').value = amount * quantity2 ;
        document.getElementById('subtotal').value = amount * quantity2 ;
        document.getElementById('totalamount').value = amount * quantity2 ;
    } 

</script>
                                  <!-- .row  -->
                                  <div class="row mb-3">
                                    <div class="col-md-5">
                                      <label for="category_id">Add Items</label>
                                      <select name="item" id="category_id" name="item"  class="form-control @error('category_id') is-invalid @enderror">
                                          <option value="">Select Item</option>
                                          @foreach ($Items as $item)
                                          <option value="{{$item->name}}"style="color: rgb(6, 5, 5); font-size: 18px;" >{{$item->name}}</option>       
                                      @endforeach 
  
                                      </select>
                                      @error('category_id')
                                          <span class="invalid-feedback">
                                              <strong>{{$message}}</strong>
                                          </span>                                   
                                      @enderror
                                    </div>
    
                                          <div class="col-md-2">
                                              <div class="form-group mb-3">
                                                  <label for="quantity">Quantity</label>
                                                  <input type="number" id="quantity" name="quantity" onchange="updateAmount()" placeholder="1" class="form-control" >
                                                  
                                                
                                              </div>
                                          </div>
                                          <div class="col-md-2">
                                              <div class="form-group mb-3">
                                                <label for="quantity">Price</label>
                                                <input type="number" id="pric" name="price" onchange="updateAmount()" placeholder="1" class="form-control" >
                                                  
                                              </div>
                                          </div>
                                          
                                        <div class="col-md-2">
                                          <div class="form-group mb-3">
                                              <label for="name">Amount</label>
                                              <input type="text" id="amount" name="amount" class="form-control" value="$ 0.00" readonly  >
                                             
                                          </div>
                                      </div>
                                    
                                   </div>  
          
                                 <div class="row mb-3">
          
                                  <div class="col-md-6" >
                                      <div class="form-group mb-3">
                                          <label for="description">Notes</label>
                                          <textarea name="notes" id="notes" cols="25" rows="10" class="form-control @error('description') is_invalid @enderror" placeholder="Description about technicians ........"></textarea>
                                          @error('description')
                                              <span class="invalid-feedback">
                                                  <strong>{{$message}}</strong>
                                              </span>                                   
                                          @enderror                                                             
                                      </div> 
                                  </div>

                                  <div class="col-md-5" style=" background-color:rgb(240, 244, 244)">
                                    <div class="form-group mb-3" >
                                        <label for="description">.</label>

                                        <div style="display: flex; align-items: center; background-color:rgb(240, 244, 244)">
                                            <label for="inputField" style="margin-right: 10px;">Sub Total</label>
                                            <input type="text" id="subtotal" name="subtotal"  class="form-control "  style="margin-left: auto; border: none; background-color: rgb(240, 244, 244); width:90px" value="$ 0.00" readonly>


                                        </div> 
                                        <div style="display: flex; align-items: center; margin-top:10px; background-color:rgb(240, 244, 244)">
                                            <label for="inputField" style="margin-right: 10px;">Discount</label>
                                            <input type="text" id="discount" name="discount" class="form-control "  style="margin-left: auto; background-color: rgb(240, 244, 244); width:90px" value="$ 0.00" readonly>
                                            {{-- <input type="subtotal" id="subtotal" class="form-control "  style="margin-left: auto; background-color: rgb(240, 244, 244); width:90px" value="" readonly> --}}
                                            

                                        </div>    
                                        <div style="display: flex; align-items: center;margin-top:10px; background-color: rgb(240, 244, 244)">
                                            <div style="margin-left: auto; margin-right: 10px;">
                                                <a>
                                                    <h6 style="color: rgb(89, 89, 220)">+ Add Tax</h6>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        
                                        <hr style="border: none; height: 1px; background-color: #000; margin: 0px 0;">

                                        <div style="display: flex; align-items: center; margin-top:20px; background-color:rgb(240, 244, 244)">
                                            <label for="inputField" style="margin-right: 10px;">Total Amount:</label>
                                            <input type="text" id="totalamount" name="totalamount" class="form-control "  style="margin-left: auto; border: none; color:rgb(89, 89, 220); background-color: rgb(240, 244, 244); width:90px" value="$ 0.00" readonly>


                                        </div>                                                       
                                    </div> 
                                </div>
                                </div> 
          
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Select Template * </label>
                                                         
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="buttonName" name="template" hidden>
                                            <button id="imageButton" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal">image_1</button>
                                                         
                                        </div> 
                                    </div>

                                <div class="form-group text-end">

                                    <button type="submit" class="btn btn-primary">Save Estimate</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
    
            </div>
            
  </div>
        </div>
    </div>
</div>
 
<style>
    .img-fluid.selected {
        border: 2px solid blue;
    }
</style>

@endsection
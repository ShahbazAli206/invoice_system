@extends('layouts.user_type.auth')
@section('content')
<div>
    <div class="row">
        <div class="col-12">
            <h1 class="page-title">Create New Item</h1>
<div class="container">
              <div class="row mb-5">
                <div class="col-md-6 offser-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>New Item</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('adminpanel.items.store')}}" method="post" enctype="multipart/form-data">
                                @csrf                                
                                <div class="row mb-3">
                                  <div class="col-md-6">
                                      <div class="form-group mb-3">
                                          <label for="name">Name</label>
                                          <input type="text" name="name" id="title" class="form-control @error('title') is_invalid @enderror"">
                                          @error('title')
                                          <span class="invalid-feedback">
                                              <strong>{{$message}}</strong>
                                          </span>
                                          @enderror
                                      </div>
                                  </div>
          
          
                                  <div class="col-md-6">
                                      <div class="form-group mb-3">
                                          <label for="name">Price</label>
                                          <input type="number" name="price" id="price" class="form-control @error('price') is_invalid @enderror" >
                                          @error('price')
                                          <span class="invalid-feedback">
                                              <strong>{{$message}}</strong> 
                                          </span>
                                          @enderror
                                      </div>
                                  </div>
                                </div> 
                                <!-- .row  -->
          
                                <div class="row mb-3">
          
                                  <div class="col-md-6">
                                      <div class="form-group mb-3">
                                          <label for="category_id">Unit</label>
                                          <select name="unit" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                              <option value="">Select Unit</option>
                                              <option value="box">box</option>
                                              <option value="cm">cm</option>
                                              <option value="ft">ft</option>
                                              <option value="inch">inch</option>
                                              <option value="km">km</option>
             
                                          </select>
                                          @error('category_id')
                                              <span class="invalid-feedback">
                                                  <strong>{{$message}}</strong>
                                              </span>                                   
                                          @enderror
                                          
                                      </div> 
                                  </div>        
               
                                </div>   
          
                                 <div class="row mb-3">
          
                                  <div class="col-md-6">
                                      <div class="form-group mb-3">
                                          <label for="description">Description</label>
                                          <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is_invalid @enderror" placeholder="Description about technicians ........"></textarea>
                                          @error('description')
                                              <span class="invalid-feedback">
                                                  <strong>{{$message}}</strong>
                                              </span>                                   
                                          @enderror                                                             
                                      </div> 
                                  </div>
                                </div> 
          
                                <div class="form-group text-end">
                                    <button type="submit" class="btn btn-primary">Save Item</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
    
            </div>
            
  </div>
        </div>
    </div>
</div>
 
@endsection
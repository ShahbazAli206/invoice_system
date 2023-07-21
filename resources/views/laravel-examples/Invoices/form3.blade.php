@extends('layouts.user_type.auth')

@section('content')
<h3>Preview</h3>
<h6>Template 3</h6>

    <div class="container-fluid bg-light">
          {{-- section 1 --}}
        <div class="row px-0 mt-4">
          <div class="col-md-5 mx-0 px-0 mt-4">
            <strong style="color:rgb(86, 81, 188); font-size: 32px; font-weight:bold;">Crater Invoice, Inc.</strong>
          </div>
          <div class="col text-end mx-0 px-0">
            <strong style="font-size: 20px;">Crater Invoice, Inc.</strong>
            <div style="font-size: 19px;">
              <p>United States</p>
            </div>
          </div>
        </div>
        <hr style="border: none; height: 1px; background-color: #5c5b5b; margin: 0px 0;">
        {{-- section 2 --}}        

        <div class="row mx-0 px-0 mt-4 mb-4">
            <div class="col-md-5 mx-0 px-0 float-start">
                <div >
                    <strong style=" font-size: 20px; font-weight:bold;">Bill To,</strong>
                    <div style=" font-size: 22px; font-weight:bold;  ">
                       <p>ASD</p>
                    </div>
                    <div style=" font-size: 19px; margin-bottom:-9px;  ">
                     <p> 608 CALLE MANUEL ACUA OTE </p>
                    </div>
                    <div style=" font-size: 19px; margin-bottom:-9px;  ">
                     <p> 608 CALLE MANUEL ACUA OTE </p>
                    </div>
                    <div style=" font-size: 19px; margin-bottom:-9px;">
                     <p>ZARAGOZA S </p>
                    </div>
                    <div style=" font-size: 19px; margin-bottom:-9px;  ">
                     <p>Albania 26450 </p>
                    </div>
                </div>     
            </div>
            <div class="col text-end mx-0 px-0 float-end">
                <div >
                    <div style="margin-bottom: 9px " >
                      <span style="margin-right: 2px " >Invoice Numbe:</span> <span style="margin-right: 11px " >{{$item->invoice_no}}</span>
                  </div>
                  <div style="margin-bottom: 9px" >
                    <span  style="margin-right: 21px " >Invoice Date:</span> <span>{{$item->date}}</span>
                </div>
                  <div >
                      <span style="margin-right: 45px ">Due date:</span> <span>{{$item->due_date}}</span>
                    </div>       
                  </div>
            </div>
          </div>

        



          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 mt-4" >
                <thead>
                    <tr>
                       
                        <th class="text-center  text-uppercase  text-xxs ">
                          <h6>#</h6>  
                        </th>
                        <th class="text-uppercase  text-xxs " style=" font-weight:bold;  ">
                            <h6>Items</h6>
                        </th>
                        <th class="text-center text-uppercase  text-xxs " style=" font-weight:bold;  ">
                            <h6>Quantity</h6>
                        </th>
                       
                        <th class="text-center text-uppercase  text-xxs " style=" font-weight:bold;  ">
                            <h6>Price</h6>
                        </th>
                        <th class="text-center text-uppercase  text-xxs " style=" font-weight:bold;  ">
                            <h6>Amount</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                 {{-- @foreach ($item as $product) --}}
                        <tr>
                    <td class="text-center">
                        {{$item->id}}
                    </td>
                    
                    <td >
                        <p class="text-xs font-weight-bold mb-0">{{$item->item}}</p>
                    </td>
                    
                    <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">{{$item->quantity}}</p>
                    </td>
                    
                    <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">${{$item->price}}</p>
                    </td>
                    
                    <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">${{$item->ttotal}}</p>
                    </td>
                    
                </tr>
                    
                    {{-- @endforeach  --}}
                </tbody>
            </table>
        </div>


        <hr style="border: none; height: 1px; background-color: #443f3f; margin: 60px 0;">


        <div class="row mx-0 px-0 mt-4">
            <div class="col-md-5 mx-0 px-0 float-start">
                <div >
                    <div style=" font-size: 22px; font-weight:bold;  ">
                       <p>Notes</p>
                    </div>
                    <div style=" font-size: 19px; margin-bottom:-9px;  ">
                     <p>Albania 26450 </p>
                    </div>
                </div>     
            </div>
            <div class="col text-end mx-0 px-0 float-end">
                <div >
                    <div style="margin-bottom: 9px " >
                      <span style="margin-right: 22px " >Subtotal</span> <span style="margin-right: 11px " >${{$item->ttotal}}.00</span>
                  </div>
                  <div style="margin-bottom: 9px" >
                    <span  style="margin-right: 18px " >Discount</span> <span style="min-width: 300px; margin-right: 15px" >$0.00</span>
                </div>
                  <div >
                      <span style="margin-right: 35px ">Total</span>  <span style="min-width: 300px; margin-right: 13px" > ${{$item->ttotal}}.00</span>
                    </div>       
                  </div>
                  
            </div>
            
          </div>

      </div>

                   
            {{-- <a href="{{route('adminpanel.Invoices.download')}}" type="button">Download</a> --}}
            <a id="downloadButton" href="{{ route('adminpanel.Invoices.download', $item->id) }}"  type="button"></a>


            <script>
              // Wait for the page to load
              window.addEventListener('load', function() {
                // Get the download button element by its id
                var downloadButton = document.getElementById('downloadButton');
            
                // Trigger the click event on the download button to initiate the download
                downloadButton.click();
              });
            </script>

        
@endsection
{{-- </body>
        </html> --}}


 

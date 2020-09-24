@extends('layouts.master')
@section('content')
    <div class="content">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Customer</label>
                            <select name="customer" id="customer" class="form-control" >
                                <option  class="form-control">Select Customer</option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}" id="{{$customer->id}}" class="form-control">{{$customer->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Issue Date</label>
                            <input type="date" name="date" class="form-control" placeholder="Customer Mobile" required >

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Category</label>
                            <select name="category" id="category" class="form-control" >
                                <option  class="form-control">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" id="{{$category->id}}" class="form-control">{{$category->category}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                </div>



            </div>

        </div>
        <div class="row">
            <div class="col-md-2 offset-md-10">
                <div class="form-group">

                    <button type="submit"  class="btn btn-primary" onclick="update()">Add Item</button>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <form action="{{route('store')}}" enctype='multipart/form-data' method="POST" class="className" name="{{$customer->sku}}" id="updateFrom" style="display:none">
                    @csrf
                    <h3>Product & Services</h3>

                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="control-label">Customer ID</label>
                            <input type="text" name="sku" id="sku" class="form-control">

                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Quantity</label>
                            <input type="text" name="product" id="product"  class="form-control">

                        </div>

                        <div class="form-group col-md-2">
                            <label class="control-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control"   >

                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Discount</label>
                            <input type="text" class="form-control"   >

                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Amount</label>
                            <input type="text" class="form-control" name="amount" id="amount"   >

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2 offset-md-10">
                            <div class="form-group">

                                <button type="submit"  class="btn btn-primary" >Create</button>

                            </div>
                        </div>
                    </div>


                </form>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        function update() {
            document.getElementById('updateFrom').style.display = 'block';

            // get data from HTML element to pass to API call
            var customer_id = document.getElementById('customer').value;
            var category_id = document.getElementById('category').value;
            // Call API
            $.ajax({
                url: "{{url('/create/proposal') }}",
                type: 'GET',
                dataType: "JSON",
                data: {
                    customer_id: customer_id,
                    category_id: category_id
                },
                success: function (response) {
                    // 'body' ashtese controller er return theke

                    document.getElementById('sku').value = response.body.sku;
                    document.getElementById('product').value = response.body2.product_qty;
                    document.getElementById('price').value = response.body2.product_price;
                    document.getElementById('amount').value = response.body2.product_price*response.body2.product_qty;

                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

    </script>


@endsection

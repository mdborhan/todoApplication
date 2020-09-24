@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">Add Products</h4>
                    <p class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTitle">Add Products</button>
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_id">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">SKU ID</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Category ID</th>
                                    {{--                                    <th scope="col">Status</th>--}}

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->product_qty }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->category_id }}</td>



                                    </tr>
                                    <!-- Modal for delete course -->
{{--                                    <div id="deleteCategory-{{ $category->id }}" class="modal fade">--}}
{{--                                        <div class="modal-dialog" role="document">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <h5 class="modal-title"><i class="fa fa-trash text-danger" aria-hidden="true"></i></h5>--}}
{{--                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-body">--}}
{{--                                                    <form action="{{ route('delete.category') }}" method="POST">--}}
{{--                                                        @csrf--}}
{{--                                                        <div class="modal-body">--}}
{{--                                                            <p>Are you want to delete this?</p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-footer">--}}
{{--                                                            <input type="hidden" name="id" value="{{ $category->id }}">--}}
{{--                                                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    {{--                                    <div id="editCategory-{{ $category->id }}" class="modal fade">--}}
                                    {{--                                        <div class="modal-dialog" role="document">--}}
                                    {{--                                            <div class="modal-content">--}}
                                    {{--                                                <div class="modal-header">--}}
                                    {{--                                                    <h5 class="modal-title">Edit Category Name</h5>--}}
                                    {{--                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                    {{--                                                        <span aria-hidden="true">&times;</span>--}}
                                    {{--                                                    </button>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="modal-body">--}}
                                    {{--                                                    <form action="{{ route('update.category') }}" method="POST" enctype="multipart/form-data">--}}
                                    {{--                                                        @csrf--}}
                                    {{--                                                        <div class="form-group">--}}
                                    {{--                                                            <label class="control-label">Category Name<span class="text-danger">*</span></label>--}}
                                    {{--                                                            <input type="text" name="category" value="{{ $category->category }}" class="form-control" >--}}
                                    {{--                                                            <input type="hidden" name="id" value="{{ $category->id }}" class="form-control" >--}}
                                    {{--                                                        </div>--}}

                                    {{--                                                        <div class="form-group">--}}
                                    {{--                                                            <label class="control-label">Status</label>--}}
                                    {{--                                                            <select name="status" class="form-control">--}}
                                    {{--                                                                @if($category->status == 1)--}}
                                    {{--                                                                    <option value="1" class="form-control">Active</option>--}}
                                    {{--                                                                    <option value="0" class="form-control">Inactive</option>--}}
                                    {{--                                                                @else--}}
                                    {{--                                                                    <option value="0" class="form-control">Inactive</option>--}}
                                    {{--                                                                    <option value="1" class="form-control">Active</option>--}}
                                    {{--                                                                @endif--}}
                                    {{--                                                            </select>--}}
                                    {{--                                                        </div>--}}
                                    {{--                                                        <div class="form-group">--}}
                                    {{--                                                            <button type="submit" class="btn btn-primary">Update Save</button>--}}
                                    {{--                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                    {{--                                                        </div>--}}
                                    {{--                                                    </form>--}}

                                    {{--                                                </div>--}}

                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="addTitle" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.product') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Product Name<span class="text-danger">*</span></label>
                            <input type="text" name="product_name" class="form-control" placeholder="Product Name" required >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product Quantity<span class="text-danger">*</span></label>
                            <input type="number" name="product_qty" class="form-control" placeholder="Product Quantity" required >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product Price<span class="text-danger">*</span></label>
                            <input type="text" name="product_price" class="form-control" placeholder="Product Price" required >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" class="form-control">{{$category->category}}</option>
                                    @endforeach


                            </select>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

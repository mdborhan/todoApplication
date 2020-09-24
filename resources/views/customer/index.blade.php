@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">Add Customer</h4>
                    <p class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTitle">Add Customer</button>
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
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Unique Id</th>
                                    <th scope="col">Customer Email</th>
                                    <th scope="col">Customer Mobile</th>
                                    <th scope="col">Customer Image</th>


                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($customers as $customer)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->sku }}</td>
                                        <td>{{ $customer->customer_email }}</td>
                                        <td>{{ $customer->customer_mobile }}</td>
                                        <td>
                                            <img src="{{asset($customer->image)}}" width="100" height="100">
                                        </td>



                                    </tr>
                                    <!-- Modal for delete course -->



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
                    <h5 class="modal-title">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.customer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Customer Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Customer Name" required >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Customer Email<span class="text-danger">*</span></label>
                            <input type="email" name="customer_email" class="form-control" placeholder="Customer email" required >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Customer Mobile<span class="text-danger">*</span></label>
                            <input type="text" name="customer_mobile" class="form-control" placeholder="Customer Mobile" required >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Customer Image<span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control"  required >
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Customer</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @if(session('message'))
                        <div class="alert alert-success mb-3">{{ session('message') }}</div>
                    @endif

                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary"><i class="fa fa-shopping-cart text-dark"></i> Order Details
                            <a href="{{ url( 'admin/orders') }}" class="btn btn-danger btn-sm float-end">BACK</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Order Details</h5>
                                <hr>

                                <h6>Order Id: {{ $order->id }}</h6>
                                <h6>Order Created Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6 class="border p-2 text-success">Order Status: <span class="text-uppercase">{{ $order->status }}</span></h6>
                            </div>
                        </div>

                        <br/>
                        <h4 class="mb-4">My Orders</h4>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Item Id</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $totalPrice = 0
                                @endphp
                                @forelse($order->orderItems as $orderItem)
                                     <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="{{$orderItem->product->name}}">
                                            @else
                                                <img src="" style="width: 50px; height: 50px" alt="{{$orderItem->product->name}}">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $orderItem->product->name }}
                                        </td>
                                         <td width="10%">${{ $orderItem->price }}</td>
                                         <td width="10%">{{ $orderItem->quantity }}</td>
                                         <td width="10%" class="fw-bold">${{ $orderItem->quantity * $orderItem->price }}</td>
                                         @php
                                             $totalPrice += $orderItem->quantity * $orderItem->price
                                         @endphp
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Orders Available</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount:</td>
                                    <td colspan="5" class="fw-bold">${{ $totalPrice }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card border mt-3">
                        <div class="card-body">
                            <h4>Order Process (Order Status Updates)</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-5">
                                    <form action="{{ url( 'admin/orders/'.$order->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")

                                        <label>Update Order Status</label>
                                        <div class="input-group">
                                            <select name="order_status" class="form-select" id="">
                                                <option>Select Order Status</option>
                                                <option value="in-progress" {{ Request::get('status') == 'in-progress' ? 'selected' : "" }}>In Progress</option>
                                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : "" }}>Completed</option>
                                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : "" }}>Pending</option>
                                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : "" }}>Cancelled</option>
                                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : "" }}>Out for Delivery</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary text-white">Update</button>
                                        </div>


                                    </form>
                                </div>
                                <div class="col-md-7">
                                    <br/>
                                    <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $order->status }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

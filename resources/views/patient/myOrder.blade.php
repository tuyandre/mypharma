@extends('frontend.master')

@section('content')
    <br>
    <div class="container mt-5 pt-3">
{{--<span>{{$orders}}</span>--}}
        <!--Section: Product detail -->
        <section id="productDetails" class="pb-5">
            <!--News card-->
            <div class="card mt-5 ">
                <table class="table ">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Pharmacy Name</th>
                        <th scope="col">Medecine Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Cost</th>
                        <th scope="col" >Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1 ?>
                    @foreach($orders as $order)
                        @foreach($order->sold as $sold)
                    <tr>
                        <th scope="row">{{$counter}}</th>
                        <?php $counter++ ?>
                        <td>{{$order->date}}</td>
                        @if($order->pharmacy)
                        <td>{{$order->pharmacy->name}}</td>
                        @else
                            <td></td>
                        @endif
                        <td>{{$sold->medecine->name}}</td>
                        <td>{{$sold->medecine_quantity}}</td>
                        <td>{{$sold->price}}</td>
                        <td>{{$sold->cost}}</td>
                        <td class="blue-text">{{$order->status}}</td>
                        @if($order->status=="pending")
                        <td>
                            <a href="{{route('frontend.patient.cancelOrder',['id'=>$order->id])}}" class="btn btn-danger">Cancel</a>
                        </td>
                        @else
                        <td><span class="red-text">No Action</span></td>
                        @endif
                    </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>

            </div>
        </section>
    </div>

@endsection
@section('js')


@endsection

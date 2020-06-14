
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{route('landing.index')}}"><i class="fa fa-home fa-2x"></i></a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->


<div class="container">
    <section class="shopping_cart_area p_100">
        @if (Cart::count())
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_product_list">
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Image</th>
                                            <th scope="col">product</th>
                                            <th scope="col">price</th>
                                            <th scope="col">qunatity</th>
                                            <th scope="col">total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                            <tr>
                                                <th scope="row">
                                                    {{csrf_field()}}
                                           <a href="javascript:;" id="delete" data-id='{{$item->rowId }}' onclick="delete_item(this)"><button class="btn btn-danger btn-xs">
                                               <i class="fa fa-close"></i></button></a>
                                                </th>
                                                    
                                                <td><img src="{{asset('/admin_uploads/product').'/'.$item->model->image}}" style="width: 150px; height: 150px" alt=""></td>
                                                <td><p>{{ $item->name }}</p></td>
                                                <td><p>
                                                    @if ($item->model->price_offer)
                                                        {{$item->model->price_offer}}
                                                    @else
                                                        {{$item->price}}
                                                    @endif    
                                                </p></td>
                                                <td>
                                                    <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity}}" >
                                                        @for ($i = 1; $i < 5 + 1 ; $i++)
                                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td><p>{{ $item->Subtotal() }}</p></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <a href="{{url('cart/empty')}}" class="primary-btn order-submit">Empty Cart</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="total_amount_area">
                            <div class="cart_totals">
                                <div class="cart_total_inner">
                                    <ul>
                                        <li><a href="#"><span>Cart Subtotal</span> {{ Cart::Subtotal() }}</a></li>
                                        <li><a href="#"><span>Shipping</span> Free</a></li>
                                        <li><a href="#"><span>Tax(10%)</span> {{ Cart::tax() }}</a></li>
                                        <li><a href="#"><span>Totals</span> {{ Cart::total() }}</a></li>
                                    </ul>
                                </div>
                                <a href="" class="primary-btn order-submit">proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h4 style="margin-bottom: 35px;">No Item In Shopping Cart</h4>
            <a href="{{ route('landing.index') }}" class="primary-btn order-submit">Continue Shopping</a>
        @endif
    </section>
</div>

@endsection

@include('front-end.layouts.app')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

      var token = $("input[name='csrf-token']").attr("content");
        var token = '{!! csrf_token() !!}';
        var tr = $(this).parent().parent();

       function delete_item(event) {
        var id=$(event).data('id'); 
        var self = $(event);
        swal({
              title: "Are you sure?",
              text: "Do you want this Item",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
               
            $.ajax(
               {
                url: "/cart/destroy/"+id,
                type: 'POST',
                data: {
                    "id": id,
                    "_token": token,
                    "_method":'DELETE'
                },
                 success: function (data){
                         self.parent().parent().hide();
                     swal("Deleted!", "Item Deleted Succsefully.", "success");
                    }
            });
                
          }
      });
    }
    
</script>
<style>
  .load_general_products_table  nav svg {
        width: 20px;
    }
    nav.pagination-n nav .flex.justify-between.flex-1 {
        display:none;
    }
    nav.pagination-n .text-sm.text-gray-700.leading-5{
        display: none;
    }
  .load_general_products_table  nav .flex.justify-between.flex-1.sm\:hidden{
      display: none !important;
  }

  .loader {
      position: absolute;
      transform: translate(50%, 50%);
      top: 40%;
      right: 50%;
      width: 85px;
      height: 50px;
      background-repeat: no-repeat;
      background-image: linear-gradient(black 50px, transparent 0),
      linear-gradient(black 50px, transparent 0),
      linear-gradient(black 50px, transparent 0),
      linear-gradient(black 50px, transparent 0),
      linear-gradient(black 50px, transparent 0),
      linear-gradient(black 50px, transparent 0);
      background-position: 0px center, 15px center, 30px center, 45px center, 60px center, 75px center, 90px center;
      animation: rikSpikeRoll 0.65s linear infinite alternate;
  }
  @keyframes rikSpikeRoll {
      0% { background-size: 10px 3px;}
      16% { background-size: 10px 50px, 10px 3px, 10px 3px, 10px 3px, 10px 3px, 10px 3px}
      33% { background-size: 10px 30px, 10px 50px, 10px 3px, 10px 3px, 10px 3px, 10px 3px}
      50% { background-size: 10px 10px, 10px 30px, 10px 50px, 10px 3px, 10px 3px, 10px 3px}
      66% { background-size: 10px 3px, 10px 10px, 10px 30px, 10px 50px, 10px 3px, 10px 3px}
      83% { background-size: 10px 3px, 10px 3px,  10px 10px, 10px 30px, 10px 50px, 10px 3px}
      100% { background-size: 10px 3px, 10px 3px, 10px 3px,  10px 10px, 10px 30px, 10px 50px}
  }

</style>
<div id="main" style="position: relative">
<span class="loader d-none"></span>
<div id="load">

<table class="table table-striped table-bordered general_product_datatable">
    <thead>
    <tr class="jsgrid-header-row">
        <th>ID</th>
        <th>Image</th>
        <th style="width: 45% !important;">Name</th>
        <th>New Qty</th>
        <th>Ref Qty</th>
        <th width="100px">Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($generalProducts) > 0)
    @foreach($generalProducts as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td><img src="{{ $product['thumbnail_image_url'] }}" height="50" width="50"></td>
            <td>{{ $product['product_name'] }}</td>
            <td>{{ $product['quantity'] }}</td>
            <td>{{ $product['refurbished_quantity'] }}</td>
            <td>
                <a href="/edit-product/{{ $product['id'] }}"><span class="edit-category" product-id="{{ $product['id'] }}" >
                        <i class="icofont-ui-edit text-primary"></i></span></a>
                <span><i class="icofont-ui-delete text-success "></i></span>
            </td>
        </tr>
    @endforeach
    @else
    <tr>
        <td colspan="6" class="text-center">No record found</td>
    </tr>
    @endif
    </tbody>
</table>
    {!! $generalProducts->links() !!}
</div>
</div>

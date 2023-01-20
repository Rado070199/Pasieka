<x-app-layout>
    @include('helpers.flesh-messages')
    <div class="row">
        <div class="col-6">
            <h1><i class="fa-solid fa-list"></i> {{__('pasieka.product.index_title')}}</h1>
        </div>
        <div class="col-6">
            <a href="{{route('products.create')}}" class="btn btn-success">{{__('pasieka.button.add')}} <i class="fa-solid fa-plus"></i> </a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">{{__('pasieka.product.fields.name')}}</th>
                <th scope="col">{{__('pasieka.product.fields.description')}}</th>
                <th scope="col">{{__('pasieka.product.fields.amount')}}</th>
                <th scope="col">{{__('pasieka.product.fields.price')}}</th>
                <th scope="col">{{__('pasieka.product.fields.category')}}</th>
                <th scope="col">{{__('pasieka.columns.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->description }} </td>
                    <td> {{ $product->amount }} </td>
                    <td> {{ $product->price }} </td>
                    <td>@if($product->hasCategory()){{ $product->category->name }}@endif</td>
                    <td>
                        <a href="{{route('products.edit', $product->id)}}">
                            <button class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></button>
                        </a>
                        <a href="{{route('products.show', $product->id)}}">
                            <button class="btn btn-info btn-sm"><i class="fa-regular fa-eye"></i></button>
                        </a>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</x-app-layout>
<script>
    const url = "{{'products'}}/";
    const confirmDalate = {{__('pasieka.messages.delate.confirm')}};
</script>
<script src="{{ asset('js/delete.js') }}"></script>

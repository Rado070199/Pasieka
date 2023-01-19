<x-app-layout>
    @include('helpers.flesh-messages')
    <a href="{{route('products.create')}}" class="btn btn-success">{{__('pasieka.button.add')}}</a>
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
                            <button class="btn btn-warning btn-sm">Edycja</button>
                        </a>
                        <a href="{{route('products.show', $product->id)}}">
                            <button class="btn btn-info btn-sm">Podgląd</button>
                        </a>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">
                            X
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

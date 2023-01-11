<x-app-layout>
    <a href="{{route('products.create')}}" class="btn btn-success">Dodaj produkt</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nazwa </th>
                <th> Opis </th>
                <th> Ilość </th>
                <th> Cena </th>
                <th> Akcja </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->description }} </td>
                    <td> {{ $product->amount }} </td>
                    <td> {{ $product->price }} </td>
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
</x-app-layout>
<script type="text/javascript">
        $(function() {
             $('.delete').click(function() { 
                swal({
                title: "Czy napewno chcesz usunąć?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
               
                $.ajax({
                method: "DELETE",
                url: "http://127.0.0.1:8000/products/" + $(this).data("id")
                })
                    .done(function(response) {
                        window.location.reload();
                    })
                    .fail(function(response) {
                        swal('error')
                    });
                }
                }); 
             });
        });
    </script>

<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('products.update', $product->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nazwa produktu</label>
                        <input type="text" maxlength="500" name="name" id="name" value="{{$product->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Opis produktu</label>
                        <textarea name="description" id="description" maxlength="1500" class="form-control">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="amount">Ilość</label>
                        <input type="number" step="1" min="0" name="amount" id="amount" value="{{$product->amount}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Cena</label>
                        <input type="number" step="0.01" min="0" name="price" id="price" value="{{$product->price}}"  class="form-control">
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="image">Zdjęcie</label>
                        <input type="file" name="image" id="image" value="{{$product->image_path}}" class="form-control">
                    </div>
                    <div class="form-group">
                        @if(!is_null($product->image_path))
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="Zdjęcie produktu">
                            @endif
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                        <a href="{{route('products.index')}}" class="btn btn-secondary">Anuluj</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Nazwa produktu</label>
                    <input type="text" maxlength="500" name="name" id="name" value="{{$product->name}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Opis produktu</label>
                    <textarea name="description" id="description" maxlength="1500" class="form-control" readonly>{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="amount">Ilość</label>
                    <input type="number" step="1" min="0" name="amount" id="amount" value="{{$product->amount}}"  class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="price">Cena</label>
                    <input type="number" step="0.01" min="0" name="price" id="price" value="{{$product->price}}"  class="form-control" readonly>
                </div>
                <div class="form-group">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="Zdjęcie produktu">
                    </div>
                <a href="{{route('products.index')}}" class="btn btn-secondary">Powrót</a>
            </div>
        </div>
    </div>
</x-app-layout>

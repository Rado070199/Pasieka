<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('products.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nazwa produktu</label>
                        <input type="text" maxlength="500" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                        <span class="invalid-fedback" role="aler">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Opis produktu</label>
                        <textarea name="description" id="description" maxlength="1500" class="form-control @error('description') is-invalid @enderror" required></textarea>
                        @error('description')
                        <span class="invalid-fedback" role="aler">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="amount">Ilość</label>
                        <input type="number" step="1" min="0" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" required>
                        @error('amount')
                        <span class="invalid-fedback" role="aler">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Cena</label>
                        <input type="number" step="0.01" min="0" name="price" id="price" class="form-control @error('price') is-invalid @enderror" required>
                        @error('price')
                        <span class="invalid-fedback" role="aler">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Zdjęcie</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" >
                        @error('image')
                        <span class="invalid-fedback" role="aler">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Dodaj produkt</button>
                        <a href="{{route('products.index')}}" class="btn btn-secondary">Anuluj</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
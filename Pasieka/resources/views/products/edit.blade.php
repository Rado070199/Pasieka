<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('pasieka.product.edit_title', ['name' => $product->name])}}</div>
                    <form action="{{route('products.update', $product->id)}}" enctype="multipart/form-data" method="post">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('pasieka.product.fields.name')}}</label>
                            <input type="text" maxlength="500" name="name" id="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{__('pasieka.product.fields.description')}}</label>
                            <textarea name="description" id="description" maxlength="1500" class="form-control @error('description') is-invalid @enderror">{{$product->description}}</textarea>
                            @error('description')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="amount">{{__('pasieka.product.fields.amount')}}</label>
                            <input type="number" step="1" min="0" name="amount" id="amount" value="{{$product->amount}}"  class="form-control @error('amount') is-invalid @enderror">
                            @error('amount')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">{{__('pasieka.product.fields.price')}}</label>
                            <input type="number" step="0.01" min="0" name="price" id="price" value="{{$product->price}}"  class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">{{__('pasieka.product.fields.category')}}</label>
                            <select name="category_id" id="category_id"  class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Brak</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($product->isSelectedCategory($category->id)) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row justify-content-center">
                            <label for="image">{{__('pasieka.product.fields.image')}}</label>
                            <input type="file" name="image" id="image" value="{{$product->image_path}}" class="form-control @error('image') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            @if(!is_null($product->image_path))
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="Zdjęcie produktu">
                            @endif
                            @error('image')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror    
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">{{__('pasieka.button.save')}}</button>
                            <a href="{{route('products.index')}}" class="btn btn-secondary">{{__('pasieka.button.cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
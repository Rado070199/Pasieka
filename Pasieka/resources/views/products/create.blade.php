<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('pasieka.product.add_title')}}</div>
                    <form action="{{route('products.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('pasieka.product.fields.name')}}</label>
                            <input type="text" maxlength="500" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{__('pasieka.product.fields.description')}}</label>
                            <textarea name="description" id="description" maxlength="1500" class="form-control @error('description') is-invalid @enderror" required></textarea>
                            @error('description')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="amount">{{__('pasieka.product.fields.amount')}}</label>
                            <input type="number" step="1" min="0" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" required>
                            @error('amount')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">{{__('pasieka.product.fields.price')}}</label>
                            <input type="number" step="0.01" min="0" name="price" id="price" class="form-control @error('price') is-invalid @enderror" required>
                            @error('price')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">{{__('pasieka.product.fields.image')}}</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" >
                            @error('image')
                            <span class="invalid-fedback" role="aler">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">{{__('pasieka.button.add')}}</button>
                            <a href="{{route('products.index')}}" class="btn btn-secondary">{{__('pasieka.button.cancel')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
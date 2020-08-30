@extends('layouts.main')
@section('contenido')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar de Productos
                    <a href="" class="btn btn-success btn.sn float-right">Nuevos Productos</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update',$product->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <input type="text" value="{{ $product->descripcion }}" class="form-control" name="descripcion">
                        </div>
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="number" value="{{ $product->price }}" class="form-control" name="price">
                        </div>
                        <button type="submit" class="btn btn-primary">guardar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

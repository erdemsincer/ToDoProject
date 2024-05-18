@extends("panel.layout.app")

@section("content")
    <div class="card p-d">
        <div class="card-header">

        <h3>Kategori Güncelle</h3>

        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $errors)
                            <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <form action="{{route('panel.updateCategory')}}"method="POST" >
                @csrf
                <input type="hidden" value="{{$category->id}}" name="categoryId">
                <label for="">Kategori Adı</label>
                <input  class=" form-control" type="text" name="catName" value="{{$category->name}}">
                <label for="">Durumu</label>
            <select  class="form-control" name="catStatus" id="">
                    <option value="1" @if($category->is_active==1) selected @endif>Aktif</option>
                    <option value="0"  @if($category->is_active==0) selected @endif>Pasif</option>
                </select>

                <button type="submit" class="btn btn-success mt-3">Güncelle</button>
            </form></for>


        </div>
    </div>
@endsection

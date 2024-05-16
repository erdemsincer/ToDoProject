@extends("panel.layout.app")

@section("content")
<div class="card p-d">
    <div class="card-header">
        <h3>Kategori Oluştur</h3>


    </div>
    <div class="card-body">
        <form action="{{route('panel.categoryAdd')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kategori Adı</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Lütfen Kategori Adı Giriniz" name="category_name">

                <label for="exampleFormControlInput1" class="form-label mt-3">Kategori Durumu</label>
                <select name="category_status" id="" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
</div>
@endsection

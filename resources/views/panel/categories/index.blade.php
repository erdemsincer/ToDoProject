@extends("panel.layout.app")

@section("content")
    <div class="card p-3">
        <div class="card-header">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h3>Kategoriler</h3>
            <a href="{{route('panel.createPage')}}" class=" btn btn-sm btn-success">Yeni Kategori Oluştur</a>
        </div>
        <h5 class="card-header">Kategori Listesi</h5>
        <p class="ms-5">Kategori Listesi aşağıdaki tabloda bulunmaktadır.</p>
        <div class="table-responsive text-nowrap">
            @if($kategoriler->first())
                <table class="table">
                    <thead>
                    <tr>
                        <th>Kategori Adı</th>
                        <th>Durum</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($kategoriler as $k)

                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$k->name}}</strong></td>
                            <td>
                                @if($k->is_active==1)
                                    Aktif
                                @else
                                    Pasif
                                @endif

                            </td>
                            <td>
                                {{$k->created_at}}
                            </td>
                            <td>
                                <a href="{{route('panel.categoryUpdatePage',$k->id)}}" class="btn btn-info">Güncelle</a>
                                <button>Sil</button>
                            </td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>
            @else
                Henüz Kategori Oluşturmadınız
            @endif

        </div>
    </div>
@endsection

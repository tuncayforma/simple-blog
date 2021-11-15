@extends('back.layout.master')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" class="form" action="{{route('admin.article.update',$article->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Başlık</label>
                                            <input type="text" id="first-name-column" required class="form-control"
                                                   placeholder="Başlık" name="title" value="{{$article->title}}" >
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Kategori</label>
                                            <select class="form-control" name="category_id" id="">
                                                <option value="5">Test</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Fotoğraf</label>
                                            <input type="file" id="last-name-column" class="form-control"
                                                   placeholder="Fotoğraf" name="image">

                                                <img width="30%" height="30%" class="img-thumbnail" src="{{asset($article->image)}}" alt="">

                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">İçerik</label>
                                            <textarea name="description" id="description" cols="30" rows="10">
                                                {{$article->description}}
                                        </textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Ekle</button>
                                        <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Sıfırla</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('back_title')
    Makaleyi Düzenle
@endsection
@section('js')
    <script src="{{asset('back/dist')}}/assets/vendors/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection

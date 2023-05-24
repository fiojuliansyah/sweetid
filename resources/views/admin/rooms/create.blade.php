@extends('admin.layouts.master')

@section('title', 'Add Class Room | SweetTroops Baking Studio')
@section('sub-title', 'Add Class Room')
@section('button-add')
    @can('classtype-create')
    <li>
        <div class="card-body">
            <div class="btn-group">
                <a href="{{ route('rooms.index') }}" type="button" class="btn btn-sm btn-danger"><i class="flaticon-032-ellipsis"></i> Go To List</a>
            </div>
        </div>
    </li>
    @endcan
@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Class Type</label>
                                    <select id="classtype_id" name="classtype_id" class="default-select form-control wide">
                                        <option selected="">Pilih Tipe Kelas</option>
                                        @foreach ($classtype as $class)    
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Class Category</label>
                                    <select id="category_id" name="category_id" class="default-select form-control wide">
                                        <option selected="">Pilih Kategori Kelas</option>
                                        @foreach ($category as $cat)    
                                        <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Cover</label>
                                    <input type="file" id="cover" name="cover" class="form-file-input form-control">
                                    <small style="color: red">Image Require 200px x 200px</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Video Trailer</label>
                                    <input type="file"  id="trailer" name="trailer" class="form-file-input form-control">
                                    <small style="color: red">Only Mp4, Mkv, Webm</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Judul Kelas">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug Kelas">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Short Description</label>
                                    <input type="text" id="short_description" name="short_description" class="form-control" placeholder="Deskripsi Singkat">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Duration</label>
                                    <input type="text" id="duration" name="duration" class="form-control" placeholder="Durasi Video">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Price</label>
                                    <input type="text" id="price" name="price" class="form-control" placeholder="Harga Normal">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Discount Price</label>
                                    <input type="text" id="disc_price" name="disc_price" class="form-control" placeholder="Harga Diskon">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Featured</label>
                                    <select id="is_featured" name="is_featured" class="default-select form-control wide">
                                        <option selected="">Pilih</option>  
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                 </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Recomend</label>
                                    <select id="is_recommended" name="is_recommended" class="default-select form-control wide">
                                        <option selected="">Pilih</option>  
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Active</label>
                                    <select id="is_active" name="is_active" class="default-select form-control wide">
                                        <option value="1">Pilih</option>  
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Started At</label>
                                    <input type="date" id="started_at" name="started_at" class="form-control">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Ended At</label>
                                    <input type="date" id="ended_at" name="ended_at" class="form-control">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Meta Keyword</label>
                                    <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" placeholder="cake, bread, sweettroops, kue, roti">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-secondary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
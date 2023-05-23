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
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form step</h4>
                    </div>
                    <div class="card-body">
                        <div id="smartwizard" class="form-wizard order-create">
                            <ul class="nav nav-wizard">
                                <li><a class="nav-link" href="#wizard_Service"> 
                                    <span>1</span> 
                                </a></li>
                                <li><a class="nav-link" href="#wizard_Time">
                                    <span>2</span>
                                </a></li>
                                <li><a class="nav-link" href="#wizard_Details">
                                    <span>3</span>
                                </a></li>
                                <li><a class="nav-link" href="#wizard_Payment">
                                    <span>4</span>
                                </a></li>
                            </ul>
                            <div class="tab-content">
                                <form action="{{ route('rooms.store') }}"></form>
                                <div id="wizard_Service" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Class Type</label>
                                                <small style="color: red">*</small>
                                                <select class="default-select form-control wide mb-3" name="classtype_id" required>
                                                    <option> Pilih Tipe Kelas </option>
                                                    @foreach ($classtype as $class)
                                                    <option value="{{ $class->id }}"> {{ $class->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Class Category</label>
                                                <small style="color: red">*</small>
                                                <select class="default-select form-control wide mb-3" name="company_id" required>
                                                    <option> Pilih Kategori Kelas </option>
                                                    @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Cover</label>
                                                <small style="color: red">Image Required 200 x 200px</small>
                                                <input type="file" name="cover" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Title</label>
                                                <small style="color: red">*</small>
                                                <input type="text" name="title" class="form-control" placeholder="Judul Kelas" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Slug</label>
                                                <small style="color: red">*</small>
                                                <input type="text" name="slug" class="form-control" placeholder="Slug Kelas" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Short Description</label>
                                                <small style="color: red">*</small>
                                                <input type="text" name="short_description" class="form-control" placeholder="Deskripsi Singkat" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Description</label>
                                                <small style="color: red">*</small>
                                                <textarea name="description" class="form-control" id="" cols="30" rows="5" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Video Trailer</label>
                                                <input type="file" name="trailer" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Duration</label>
                                                <input type="text" name="duration" class="form-control" placeholder="1 Hours" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Price</label>
                                                <input type="text" name="price" class="form-control" placeholder="Rp. 500.000" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Discount Price</label>
                                                <input type="text" name="disc_price" class="form-control" placeholder="Rp. 500.000" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4 col-xxl-6 col-6">
                                                <div class="form-check custom-checkbox mb-3 checkbox-info">
                                                    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured">
                                                    <label class="form-check-label"">Featured</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-xxl-6 col-6">
                                                <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                    <input type="checkbox" class="form-check-input" id="is_recomended" name="is_recomended">
                                                    <label class="form-check-label">Recomended</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-xxl-6 col-6">
                                                <div class="form-check custom-checkbox mb-3 checkbox-warning">
                                                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                                                    <label class="form-check-label">Active</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="wizard_Details" class="tab-pane" role="tabpanel">
                                   <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Started At</label>
                                                <input type="date" name="started_at" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Ended At</label>
                                                <input type="date" name="ended_at" class="form-control">
                                            </div>
                                        </div>
                                   </div>
                                </div>
                                <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                                    <div class="row emial-setup">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Meta Title</label>
                                                <input type="text" name="meta_title" class="form-control" placeholder="meta title">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="mb-3">
                                                <label class="text-label form-label">Meta Keyword</label>
                                                <input type="text" name="meta_keyword" class="form-control" placeholder="meta keyword">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="skip-email text-center">
                                                <button type="submit" class="btn btn-sm btn-success">Submit Class Room</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link href="{{ asset('/') }}admin/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
@endsection

@section('js')
<script src="{{ asset('/') }}admin/vendor/jquery-steps/build/jquery.steps.min.js"></script>
<script src="{{ asset('/') }}admin/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('/') }}admin/js/plugins-init/jquery.validate-init.js"></script>
<script src="{{ asset('/') }}admin/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
<script src="{{ asset('/') }}admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script>
    $(document).ready(function(){
        // SmartWizard initialize
        $('#smartwizard').smartWizard(); 
    });
</script>
@endsection
@section('js')
<script>
    // cari checkbox menggunakan id nya
    const selectElement = document.querySelector('#is_featured');
    
    //tambahkan event listener 'change' pada checkbox
    selectElement.addEventListener('change', (event) => {
      // set value nya berdasarkan atribut 'checked'. 
      // jika checked maka set value = 1
      // jika tidak ada atribut checked maka set value = 0
      selectElement.value = selectElement.checked ? 1 : 0;
      // alert(selectElement.value); unkomen ini untuk melihat value
    });
</script>
<script>
    // cari checkbox menggunakan id nya
    const selectElement = document.querySelector('#is_recomended');
    
    //tambahkan event listener 'change' pada checkbox
    selectElement.addEventListener('change', (event) => {
      // set value nya berdasarkan atribut 'checked'. 
      // jika checked maka set value = 1
      // jika tidak ada atribut checked maka set value = 0
      selectElement.value = selectElement.checked ? 1 : 0;
      // alert(selectElement.value); unkomen ini untuk melihat value
    });
</script>
<script>
    // cari checkbox menggunakan id nya
    const selectElement = document.querySelector('#is_active');
    
    //tambahkan event listener 'change' pada checkbox
    selectElement.addEventListener('change', (event) => {
      // set value nya berdasarkan atribut 'checked'. 
      // jika checked maka set value = 1
      // jika tidak ada atribut checked maka set value = 0
      selectElement.value = selectElement.checked ? 1 : 0;
      // alert(selectElement.value); unkomen ini untuk melihat value
    });
</script>
@endsection
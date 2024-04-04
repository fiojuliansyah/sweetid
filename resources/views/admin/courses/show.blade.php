@extends('admin.layouts.master')

@section('title', 'Courses | SweetTroops Baking Studio')


@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Courses</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $course->title }} Course Detail</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Course Detail</h4>
                            <a href="{{ route('courses.index') }}" type="button" class="btn btn-rounded btn-success"><span class="btn-icon-start text-info"><i class="fa fa-chevron-left color-info"></i>
                            </span>Back</a>
                        </div>

                        <div class="card-body">
                          <table class="table table-borderless">
                            <tr>
                                <th>Room</th>
                                <td>{{ $course->room['title'] }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $course->title }}</td>
                            </tr>
                            <tr>
                                <th>Duration</th>
                                <td>{{ $course->duration }}</td>
                            </tr>
                            <tr>
                                <th>Video</th>
                                <td>
                                    @if($course->video)
                                    <iframe src="{{ $course->video }}" width="640" height="480" allow="autoplay"></iframe>
                                    @else
                                        Video tidak tersedia.
                                    @endif
                                </td>
                            </tr>
                          </table>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

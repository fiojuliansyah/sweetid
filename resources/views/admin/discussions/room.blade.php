@extends('admin.layouts.master')

@section('title', 'Discussions Room | SweetTroops Baking Studio')
@section('sub-title', 'Discussion Room')
   
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="table-wrapper">
                              <div id="table-scroll">
                                <table class="table table-hover mt-2" id="table-chat">
                                  <thead style='display:none;'>
                                    <tr>
                                      <th>Pesan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td style="text-align:{{ $discussion->user->id == Auth::user()->id ? 'right' : 'left' }}">{{ $discussion->body }} 
                                          <br><span class="blockquote-footer">{{ $discussion->user->name .' - '. $discussion->created_at }}</span> 
                                      </td>
                                    </tr>
                                    @foreach($discussion->discussion_details as $chat)
                                      <tr>
                                        <td style="text-align:{{ $chat->user->id == Auth::user()->id ? 'right' : 'left' }};">
                                        {{ $chat->body }} 												
                                        @if ($chat->attachment)
                                          <br>
                                          <small>
                                            <a href="{{ asset('storage/discussion/'.$chat->attachment) }}" target="_blank">
                                              <i class="fa fa-paperclip"></i> Unduh Lampiran
                                          </small>
                                        @endif
                                        <br><span class="blockquote-footer">{{ $chat->user->name .' - '. $chat->created_at }}</span> </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
              <div class="col">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="container-fluid">
                      <form action="{{ route('discussiondetails.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">								
                          <div class="col-3">
                            <div class="form-group">
                              <label>Lampiran</label>
                              <input type="file" name="attachment" class="form-control-file" id="attachment">
                              <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Pesan</label>
                              <textarea name="body" class="form-control" id="body" rows="3" placeholder="Tulis pesan disini" required></textarea>									
                            </div>
                          </div>														
                        </div>				
                        <div style="text-align:right;" class="mt-2">									
                          <a href="{{ route('discussions.index', ['room' => $discussion->room_id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                          <button type="submit" class="btn btn-sm btn-primary float-right">Kirim</button>								
                        </div>
                      </form>
                    </div>									
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
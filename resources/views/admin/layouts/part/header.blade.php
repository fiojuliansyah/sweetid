<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        <h3>
                            @yield('sub-title')
                        </h3>
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    @yield('button-add')
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link" href="{{ url('/home') }}" data-bs-toggle="dropdown">
                            <svg fill="#4f7086" width="28" height="28" viewbox="0 0 28 28" fill="none" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 27.442 27.442" xml:space="preserve">
                                <path d="M19.494,0H7.948C6.843,0,5.951,0.896,5.951,1.999v23.446c0,1.102,0.892,1.997,1.997,1.997h11.546
                                    c1.103,0,1.997-0.895,1.997-1.997V1.999C21.491,0.896,20.597,0,19.494,0z M10.872,1.214h5.7c0.144,0,0.261,0.215,0.261,0.481
                                    s-0.117,0.482-0.261,0.482h-5.7c-0.145,0-0.26-0.216-0.26-0.482C10.612,1.429,10.727,1.214,10.872,1.214z M13.722,25.469
                                    c-0.703,0-1.275-0.572-1.275-1.276s0.572-1.274,1.275-1.274c0.701,0,1.273,0.57,1.273,1.274S14.423,25.469,13.722,25.469z
                                    M19.995,21.1H7.448V3.373h12.547V21.1z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link  ai-icon" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                           <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.638 4.9936V2.3C12.638 1.5824 13.2484 1 14.0006 1C14.7513 1 15.3631 1.5824 15.3631 2.3V4.9936C17.3879 5.2718 19.2805 6.1688 20.7438 7.565C22.5329 9.2719 23.5384 11.5872 23.5384 14V18.8932L24.6408 20.9966C25.1681 22.0041 25.1122 23.2001 24.4909 24.1582C23.8709 25.1163 22.774 25.7 21.5941 25.7H15.3631C15.3631 26.4176 14.7513 27 14.0006 27C13.2484 27 12.638 26.4176 12.638 25.7H6.40705C5.22571 25.7 4.12888 25.1163 3.50892 24.1582C2.88759 23.2001 2.83172 22.0041 3.36039 20.9966L4.46268 18.8932V14C4.46268 11.5872 5.46691 9.2719 7.25594 7.565C8.72068 6.1688 10.6119 5.2718 12.638 4.9936ZM14.0006 7.5C12.1924 7.5 10.4607 8.1851 9.18259 9.4045C7.90452 10.6226 7.18779 12.2762 7.18779 14V19.2C7.18779 19.4015 7.13739 19.6004 7.04337 19.7811C7.04337 19.7811 6.43703 20.9381 5.79662 22.1588C5.69171 22.3603 5.70261 22.6008 5.82661 22.7919C5.9506 22.983 6.16996 23.1 6.40705 23.1H21.5941C21.8298 23.1 22.0492 22.983 22.1732 22.7919C22.2972 22.6008 22.3081 22.3603 22.2031 22.1588C21.5627 20.9381 20.9564 19.7811 20.9564 19.7811C20.8624 19.6004 20.8133 19.4015 20.8133 19.2V14C20.8133 12.2762 20.0953 10.6226 18.8172 9.4045C17.5391 8.1851 15.8073 7.5 14.0006 7.5Z" fill="#4f7086"></path>
                            </svg>
                            <span class="badge light text-white bg-primary rounded-circle">{{ isset($notifications) ? count($notifications) : 0 }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div id="dlab_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
                                <ul class="timeline">
                                  @if(isset($notifications))
                                    @foreach($notifications as $notification)
                                      <li>
                                          <div class="timeline-panel">
                                              <div class="media me-2 media-primary">
                                                  <i class="fa fa-bell"></i>
                                              </div>
                                              <div class="media-body">
                                                  <h6 class="mb-1">{{ $notification->data['data'] }}</h6>
                                                  <small class="d-block">{{ $notification->created_at->diffForHumans() }}</small>
                                              </div>
                                          </div>
                                      </li>          
                                    @endforeach
                                  @else
                                      <li>
                                          <div class="timeline-panel">
                                              <div class="media me-2 media-warning">
                                                  <i class="fa fa-exclamation"></i>
                                              </div>
                                              <div class="media-body">
                                                  <h6 class="mb-1">Belum ada notifikasi</h6>                                                  
                                              </div>
                                          </div>
                                      </li>  
                                  @endif
                                </ul>
                            </div>
                            {{-- <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a> --}}
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block d-none">Generate Report<i class="las la-signal ms-3 scale5"></i></a>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
</div>
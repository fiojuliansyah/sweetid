@extends('admin.layouts.master')

@section('title', 'Meeting Room | SweetTroops Baking Studio')
@section('sub-title', 'Meeting Room')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" id="meeting_number" value="{{ $meeting->meeting_id }}">
                            <input type="hidden" id="password" value="{{ $meeting->password }}">
                            <div id="meetingSDKElement">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsrsasign/8.0.20/jsrsasign-all-min.js"></script>

    <!-- For Component and Client View -->
    <script src="https://source.zoom.us/2.16.0/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/2.16.0/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/2.16.0/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/2.16.0/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/2.16.0/lib/vendor/lodash.min.js"></script>

    <!-- For Client View -->
    <script src="https://source.zoom.us/zoom-meeting-2.16.0.min.js"></script>

    <script>
        ZoomMtg.setZoomJSLib('https://source.zoom.us/2.16.0/lib', '/av')

        ZoomMtg.preLoadWasm()
        ZoomMtg.prepareWebSDK()

        ZoomMtg.i18n.load('en-US')
        ZoomMtg.i18n.reload('en-US')

        window.onload = function() {
            const meetingNumber = document.getElementById('meeting_number').value

            if ({{ $meeting->user_id }} == {{ Auth::user()->id }}) {
                const signature = getSDKToken(meetingNumber, 1)
                startMeeting(signature)
            } else {
                const signature = getSDKToken(meetingNumber, 0)
                startMeeting(signature)
            }
        }

        function getSDKToken(meetingNumber, role = 0) {
            const iat = Math.round(new Date().getTime() / 1000) - 30;
            const exp = iat + 60 * 60 * 2

            const oHeader = {
                alg: 'HS256',
                typ: 'JWT'
            }

            const oPayload = {
                sdkKey: '{{ env('ZOOM_MEETING_SDK_KEY') }}',
                mn: meetingNumber,
                role: role,
                iat: iat,
                exp: exp,
                appKey: '{{ env('ZOOM_MEETING_SDK_KEY') }}',
                tokenExp: iat + 60 * 60 * 2
            }

            const sHeader = JSON.stringify(oHeader)
            const sPayload = JSON.stringify(oPayload)
            const signature = KJUR.jws.JWS.sign('HS256', sHeader, sPayload, '{{ env('ZOOM_MEETING_SDK_SECRET') }}')

            return signature
        }

        function startMeeting(signature) {

            var sdkKey = '{{ env('ZOOM_MEETING_SDK_KEY') }}'
            var meetingNumber = document.getElementById('meeting_number').value
            var passWord = document.getElementById('password').value
            var userName = '{{ Auth::user()->name }}'
            var userEmail = '{{ Auth::user()->email }}'
            var registrantToken = ''
            var zakToken = ''
            var leaveUrl = '{{ route('meetingrooms.index') }}'

            document.getElementById('zmmtg-root').style.display = 'block'

            ZoomMtg.init({
                leaveUrl: leaveUrl,
                success: (success) => {
                    console.log(success)
                    ZoomMtg.join({
                        signature: signature,
                        sdkKey: sdkKey,
                        meetingNumber: meetingNumber,
                        passWord: passWord,
                        userName: userName,
                        userEmail: userEmail,
                        tk: registrantToken,
                        zak: zakToken,
                        success: (success) => {
                            console.log(success)
                        },
                        error: (error) => {
                            console.log(error)
                        },
                    })
                },
                error: (error) => {
                    console.log(error)
                }
            })
        }
    </script>
@endsection

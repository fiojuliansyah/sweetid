<section>
    <h4>Update Detail Profile</h4>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <x-input-label class="form-label" for="avatar" :value="__('Avatar')" />
            <input id="avatar" name="avatar" type="file" class="form-control" value="{{ $user ? $user->profile?->avatar : '' }}" autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>
        <br>
        <div>
            <x-input-label class="form-label" for="thumbnail" :value="__('thumbnail')" />
            <input id="thumbnail" name="thumbnail" type="file" class="form-control" value="{{ $user ? $user->profile?->thumbnail : '' }}" autofocus autocomplete="thumbnail" />
            <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
        </div>
        <br>
        <div>
            <x-input-label class="form-label" for="address" :value="__('address')" />
            <input id="address" name="address" type="text" class="form-control" value="{{ $user ? $user->profile?->address : '' }}" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <br>        
        <br>
        <div class="flex items-center gap-4">
            <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated-successfully')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                    style="color: green"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>    
    <div class="mt-4">       
        <h4>Update Contact Profile</h4>
        <form id="send-otp" method="post" action="{{ route('profile.get-otp') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <x-input-label class="form-label" for="phone" :value="__('phone')" />
                    <input id="phone" name="phone" type="text" class="form-control" value="{{ $user ? $user->profile?->phone : '' }}" required autofocus autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />                   
                </div>
                <div class="col-2">   
                    <x-input-label class="form-label" for="phone" :value="__('')" />             
                    <x-primary-button class="btn btn-primary" form="send-otp" type="submit"
                    >{{ __('Send OTP') }}</x-button>
                </div>
            </div>
            @if (session('status') === 'verification-link-sent')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                    style="color: rgb(5, 66, 12)"
                >{{ __('Verification link sent.') }}</p>
            @endif
        </form>
        </div>
        <form id="verify-otp" action="{{ route('profile.verify-otp') }}" method="POST" class="mt-3">
        @csrf
            <x-input-label class="form-label" for="otp" :value="__('OTP')" />
            <input id="otp" name="otp" type="text" class="form-control" value="{{ $user ? $user->profile?->otp : '' }}" required autofocus autocomplete="otp" />
            <x-input-error class="mt-2" :messages="$errors->get('otp')" />
            <div class="flex items-center gap-4 mt-3">
                <x-primary-button class="btn btn-primary" form="verify-otp">{{ __('Save') }}</x-button>                
            </div>
        </form>
    </div>
</section>

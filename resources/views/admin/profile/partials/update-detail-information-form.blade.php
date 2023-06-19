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
        <div>
            <x-input-label class="form-label" for="phone" :value="__('phone')" />
            <input id="phone" name="phone" type="text" class="form-control" value="{{ $user ? $user->profile?->phone : '' }}" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
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
</section>

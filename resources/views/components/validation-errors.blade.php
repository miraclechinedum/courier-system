@if ($errors->any())
<div {{ $attributes }}>
    <div class="alert alert-danger" id="success-alert">
        <div class="font-medium text-white">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-white">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
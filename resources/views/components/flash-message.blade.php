@if(session()->has('success-message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="success-message">
        {{session('success-message')}}
    </div>
@endif

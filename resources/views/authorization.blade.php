<x-layout :pupil="null" :weekday="null">
    <h3 class="login-entry-message">Вхід в електронний кабінет учня</h3>
    <div class="login-container">
    <p class="login-info">Введіть ваш особистий логін та пароль від локальної мережі навчального закладу</p>
        @error('authenticate')
        <p class="error-message">Неправильний логін або пароль!</p>
        @enderror
    <form method="post" action="server.php/authenticate">
        @csrf
        <div class="input-container">
            <div class="input-text">Логін</div>
            <input name="login" class="login-input" type="text" value="{{old('login')}}">
            @error('login')
            <span class="error-message login-error">Логін є обов'язковим!</span>
            @enderror
        </div>
        <div class="input-container">
            <div class="input-text">Пароль</div>
            <input name="password" class="login-input" type="password">
            @error('password')
            <span class="error-message">Пароль є обов'язковим!</span>
            @enderror
        </div>
        <div class="input-container">
            <input class="login-button form-item" value="Увійти" type="submit">
        </div>

    </form>
    </div>
</x-layout>

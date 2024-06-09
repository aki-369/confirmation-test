@extends('layouts.app')

@section('title','Login')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
@endsection

@section('content')
<div class="login__content">
  <div class="login-form"> 
    <div class="form__heading">
      <h1 class="form__heading-title">Login</h1>
    </div>
    <div class="form__item">
        <form action="/login" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $error)
                                @error('email')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            @endforeach
                        @endif       
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="password" name="password" placeholder="例:coachtech1106"/>
                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror   
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
  </div>  
</div>
@endsection
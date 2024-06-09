@extends('layouts.app')

@section('title','Register')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}" />
@endsection

@section('content')
<div class="register__content">
  <div class="register-form"> 
    <div class="form__heading">
      <h1 class="form__heading-title">Register</h1>
    </div>
    <div class="form__item">
      <form action="/register" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="name" placeholder="例:山田 太郎" value="{{ old('name') }}" />
              @error('name')
                <p class="error-message">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>  
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
          <button class="form__button-submit" type="submit">登録</button>
        </div>
      </form>
    </div>
  </div>  
</div>
@endsection
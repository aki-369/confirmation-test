@extends('layouts.app')

@section('title', 'お問い合わせフォーム入力画面')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}" />
@endsection

@section('content')
<div class="contact">
    <h1 class="contact-title">Contact</h1>
    <form action="/confirm" class="contact-form" method="post" novalidate>
        @csrf
        <table class="contact-table">
            <tr>
                <th class="contact-item">お名前<span class="required">※</span>          
                </th>
                <td class="contact-body-name">
                    <div class="input-group">   
                        <div class="name-input-wrapper">
                            <input class="form-text-name" type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}" />
                            @if ($errors->has('first_name'))
                                @foreach($errors->get('first_name') as $error)
                                <p class="error-message">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="name-input-wrapper">  
                            <input class="form-text-name" type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" />
                            @if ($errors->has('last_name'))
                                @foreach($errors->get('last_name') as $error)
                                <p class="error-message">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>    
                    </div>                    
                </td>             

            </tr>
            <tr>
                <th class="contact-item">性別<span class="required">※</span></th>
                <td class="contact-body-gender">
                    <div class="input-group">
                        <div class="gender-input-wrapper">
                            <div class="gender-radio"> 
                                <label class="contact-gender">
                                    <input class="form-radio" type="radio" name="gender" value="1" @checked(old('gender') == '1') />
                                    <span class="contact-gender-txt">男性</span>
                                </label>
                                <label class="contact-gender">
                                    <input class="form-radio" type="radio" name="gender" value="2"  @checked(old('gender') == '2')/>
                                    <span class="contact-gender-txt">女性</span>
                                </label>
                                <label class="contact-gender">
                                    <input class="form-radio" type="radio" name="gender" value="3"  @checked(old('gender') == '3') />
                                    <span class="contact-gender-txt">その他</span>
                                </label>
                            </div>
                            @if ($errors->has('gender'))
                                @foreach($errors->get('gender') as $error)
                                <p class="error-message">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>                    
                </td>
            </tr>
            <tr>
                <th class="contact-item">メールアドレス<span class="required">※</span></th>
                <td class="contact-body">
                    <input class="form-text" type="email" name="email" placeholder="例:test@example" value="{{ old('email') }}"/>
                    @if ($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                        <p class="error-message">{{ $error }}</p>
                        @endforeach
                    @endif        
                </td>
            </tr>
            <tr>
                <th class="contact-item">電話番号<span class="required">※</span></th>
                <td class="contact-body-tel">
                    <div class="input-group">
                        <div class="tell-input-wrapper"> 
                            <div class="input-with-hyphen">     
                                <input class="form-text-tel" type="tel" name="phone1" placeholder="080" value="{{ old('phone1') }}"/><span>-</span>
                            </div>
                            @if ($errors->has('phone1'))
                                @foreach($errors->get('phone1') as $error)
                                <p class="error-message">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="tell-input-wrapper">
                            <div class="input-with-hyphen">
                                <input class="form-text-tel" type="tel" name="phone2" placeholder="1234" value="{{ old('phone2') }}"/><span>-</span>
                            </div>
                            @if ($errors->has('phone2'))
                                @foreach($errors->get('phone2') as $error)
                                <p class="error-message">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="tell-input-wrapper">
                            <div class="input-with-hyphen">
                                <input class="form-text-tel" type="tel" name="phone3" placeholder="5678" value="{{ old('phone3') }}"/>
                            </div>
                            @if ($errors->has('phone3'))
                                @foreach($errors->get('phone3') as $error)
                                <p class="error-message">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>                     
                </td>
            </tr>
            <tr>
                <th class="contact-item">住所<span class="required">※</span></th>
                <td class="contact-body">
                    <input class="form-text" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
                    @if ($errors->has('address'))
                        @foreach($errors->get('address') as $error)
                        <p class="error-message">{{ $error }}</p>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <th class="contact-item">建物名</th>
                <td class="contact-body">
                    <input class="form-text" type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </td>
            </tr>
            <tr>
                <th class="contact-item">お問い合わせの種類<span class="required">※</span></th>
                <td class="contact-body">
                    <select name="category_id" class="form-select" required>
                        <option value="" selected disabled>選択してください</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if( old('category_id') == $category->id) selected @endif>{{$category->content}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('cayegory_id'))
                        @foreach($errors->get('cayegory_id') as $error)
                        <p class="error-message">{{ $error }}</p>
                        @endforeach
                    @endif                    
                </td>
            </tr>
            <tr>
                <th class="contact-item-textarea">お問い合わせ内容<span class="required">※</span></th>
                <td class="contact-body">
                    <textarea class="form-textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    @if ($errors->has('detail'))
                        @foreach($errors->get('detail') as $error)
                        <p class="error-message">{{ $error }}</p>
                        @endforeach
                    @endif
                </td>
            </tr>
        </table>
        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
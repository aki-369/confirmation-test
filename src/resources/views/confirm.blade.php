@extends('layouts.app')

@section('title', 'お問い合わせフォーム確認画面')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}" />
@endsection

@section('content')
<div class="contact">
    <h1 class="contact-title">Confirm</h1>
    <table class="contact-table">
        <tr>
            <th class="contact-item">お名前</th>
            <td class="contact-body">
                <p>
                    {{ $contact['last_name'] . ' ' . $contact['first_name']}}
                </p>
            </td>
        </tr>
        <tr>
            <th class="contact-item">性別</th>
            <td class="contact-body">
                <p>
                    @if($contact['gender'] == 1)
                        男性
                    @elseif($contact['gender'] == 2)
                        女性
                    @elseif($contact['gender'] == 3)
                        その他
                    @endif  
                </p>
            </td>
        </tr>
        <tr>
            <th class="contact-item">メールアドレス</th>
            <td class="contact-body">
                <p>{{ $contact['email'] }}</p>
            </td>
        </tr>
        <tr>
            <th class="contact-item">電話番号</th>
            <td class="contact-body">
                <p>{{($contact['tell'])}}</p>
            </td>
        </tr>
        <tr>
            <th class="contact-item">住所</th>
            <td class="contact-body">
                <p>{{ $contact['address'] }}</p>
            </td>
        </tr>
        <tr>
            <th class="contact-item">建物名</th>
            <td class="contact-body">
                <p>{{ $contact['building'] }}</p>
            </td>
        </tr>
        <tr>
            <th class="contact-item">お問い合わせの種類</th>
            <td class="contact-body">
                <p>
                    @if($contact['category_id'] == 1)
                        商品のお届けについて
                    @elseif($contact['category_id'] == 2)
                        商品の交換について
                    @elseif($contact['category_id'] == 3)
                        商品トラブル
                    @elseif($contact['category_id'] == 4)
                        ショップへのお問い合わせ
                    @elseif($contact['category_id'] == 4)
                        その他
                    @endif
                </p>
            </td>
        </tr>
        <tr>
            <th class="contact-item-textarea">お問い合わせ内容</th>
            <td class="contact-body">
                <p>{{ $contact['detail'] }}</p>
            </td>
        </tr>
    </table>

    <div class="contact-form__button">
        <form action='/thanks' method='post'>   
            @csrf
            <input type="hidden" name='last_name' value="{{$contact['last_name']}}">
            <input type="hidden" name='first_name'value="{{$contact['first_name']}}">
            <input type="hidden" name='gender' value="{{$contact['gender']}}">
            <input type="hidden" name='email' value="{{$contact['email']}}">
            <input type="hidden" name='tell' value="{{$contact['tell']}}">
            <input type="hidden" name='address' value="{{$contact['address']}}">
            <input type="hidden" name='building' value="{{$contact['building']}}">
            <input type="hidden" name='category_id' value="{{ $contact['category_id'] }}">
            <input type="hidden" name='detail' value="{{$contact['detail']}}">
            <button type="submit" class="contact-form__button-submit">送信</button>
            <button type="submit" class="contact-form__correction" name='correction' value='correction'>修正</button>
        </form>
    </div>
</div>
@endsection
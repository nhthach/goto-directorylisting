@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center bc-login-form-page bc-login-page">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a onclick="event.preventDefault(); document.getElementById('email-form').submit(); " href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                        
                        <form id="email-form" action="{{ route('verification.resend') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

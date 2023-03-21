@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.email_verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.email_verify_link') }}
                        </div>
                    @endif

                    {{ __('auth.check_verify_link') }}
                    {{ __('auth.not_receive_email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth.replay_link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

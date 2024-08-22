<x-front-layout title="login">
    <x-slot name="breadcrumbs">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Home</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" action="{{route('two-factor.enable')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>Two Factor Authentication</h3>
                                <p>You can anable/disable 2FA</p>
                            </div>

                            <div class="button">
                                @if(!$user->two_factor_secret)
                                <button class="btn" type="submit">Enable</button>
                                @else
                                {!!$user->twoFactorQrCodeSvg()!!}
                                <h3>Recovery codes</h3>
                                <ul>
                                    @foreach($user->recoveryCodes() as $code)
                                    <li>{{$code}}</li>
                                    @endforeach
                                </ul>
                                @method('delete')
                                <button class="btn" type="submit">Disable</button>

                                @endif
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
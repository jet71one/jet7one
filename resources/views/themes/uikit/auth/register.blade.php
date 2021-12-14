@extends('theme::layouts.admin-app')
@php //dd($errors); @endphp
@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-center">
            @if(!$errors->any())
            <div id="role-select">
                <h2 class="uk-margin-bottom get-involded__title">Please select your role</h2>
                <div class="uk-child-width-1-2@s" uk-grid>
                    <div style="text-align: center; cursor: pointer" id="traveler_card" class="uk-card uk-card-primary uk-card-default uk-card-hover uk-card-large uk-card-body">
                        <span style="font-size: 53px" class="uk-card-title">TRAVELER</span>
                    </div>
                    <div style="text-align: center; cursor: pointer" id="guide_card" class="uk-card uk-card-default uk-card-hover uk-card-large uk-card-body">
                        <span style="font-size: 53px; " class="uk-card-title">GUIDE</span>
                    </div>
                </div>
            </div>
            @endif

            <div class="uk-width-1-2@m uk-align-center">
                <form style="{{!$errors->any() ? 'display: none;' : ''}}" class="uk-form-stacked" id="@if(setting('billing.card_upfront')){{ 'payment-form'}}@endif" role="form" method="POST" action="@if(setting('billing.card_upfront')){{ route('wave.register-subscribe') }}@else{{ route('register') }}@endif">
                    <div class="uk-padding uk-box-shadow-large">
                @if(setting('billing.card_upfront'))
                        <h2>Select A Plan</h2>

                        @include('theme::partials.plans', ['type' => 'guide'])
                        <hr>
                @endif

                    @if(setting('billing.card_upfront'))
                        <h2>Profile Information</h2>
                    @else
                        <h2>Register</h2>
                    @endif

                        {{ csrf_field() }}

                        <div style="display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;">
                            <div style="margin-right: 26px;-ms-flex: 0 0 75%;flex: 0 0 81%;max-width: 75%;">
                                <label class="uk-form-label">Name</label>
                                <input id="name" type="text" class="uk-input{{ $errors->has('name') ? ' uk-form-danger' : '' }}" name="name" value="{{ old('name') }}" required @if(!setting('billing.card_upfront')){{ 'autofocus' }}@endif>


                            </div>
                            @if(!$errors->has('interested_in'))
                                <div class="belongs-guide" style="-ms-flex: 0 0 75%;flex: 0 0 20%;max-width: 20%;">
                                    <label class="uk-form-label">Gender</label>
                                    <label style="color: black"><input class="uk-radio" type="radio" name="gender" value="M"> M</label>
                                    <label style="color: black"><input class="uk-radio radio-female" type="radio" name="gender" value="F"> F</label>
                                </div>
                            @endif
                            @if(!$errors->has('gender'))
                                <div class="belongs-traveler" style="-ms-flex: 0 0 75%;flex: 0 0 20%;max-width: 20%;">
                                    <label class="uk-form-label">Interested in</label>
                                    <label style="color: black"><input class="uk-checkbox" type="checkbox" name="interested_in[M]"> M</label>
                                    <label style="color: black"><input class="uk-checkbox radio-female" type="checkbox" name="interested_in[F]"> F</label>
                                </div>
                            @endif
                            @if ($errors->has('name'))
                                <div class="uk-alert-danger" uk-alert>
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            @if ($errors->has('interested_in'))
                                <div class="uk-alert-danger" uk-alert>
                                    {{ $errors->first('interested_in') }}
                                </div>
                            @endif
                            @if ($errors->has('gender'))
                                <div class="uk-alert-danger" uk-alert>
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                        </div>

                        @if(setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes')
                            <div class="uk-margin">
                                <label class="uk-form-label">Username</label>
                                <input id="username" type="text" class="uk-input{{ $errors->has('username') ? ' uk-form-danger' : '' }}" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <div class="uk-alert-danger" uk-alert>
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="uk-margin">
                            <label class="uk-form-label">Email Address</label>
                            <input id="email" type="email" class="uk-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <div class="uk-alert-danger" uk-alert>
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">Password</label>
                            <input id="password" type="password" class="uk-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}" name="password" value="{{ old('password') }}" required>

                            @if ($errors->has('password'))
                                <div class="uk-alert-danger" uk-alert>
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="uk-input{{ $errors->has('password_confirmation') ? ' uk-form-danger' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required>

                            @if ($errors->has('password_confirmation'))
                                <div class="uk-alert-danger" uk-alert>
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>



                        @if(!setting('billing.card_upfront'))
                            <div class="uk-margin">
                                <button class="uk-button uk-button-primary" type="submit" name="button">Register</button>
                                <a class="uk-float-right" href="{{ route('login') }}">
                                    Already have an account?
                                </a>
                            </div>
                        @endif

                    @if(setting('billing.card_upfront'))
                        <hr class="uk-margin-medium-top">

                        <h2>Billing Information</h2>

                        @include('theme::partials.payment-form', ['exclude_form_el' => true])
                        <hr class="uk-margin-medium-top">

                        <div class="uk-margin uk-margin-top uk-grid-small uk-child-width-auto uk-grid">
                            <label style="color: black"><input class="uk-checkbox terms_conds_chk" type="checkbox"> I agree to the
                                <a href="/terms-of-use">Terms and Conditions</a></label>
                        </div>
                        <button class="uk-button uk-button-primary uk-margin-medium-top uk-align-right" disabled type="submit" name="button">Register</button>
                        <div class="uk-clearfix"></div>


                    @endif
                   
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
@section('javascript')
<script>
    $('#traveler_card').click(function () {
        $('#role-select').hide()
        $('.belongs-guide').hide();
        $('.belongs-traveler').show();
        $('#payment-form').show()
    })

    $('#guide_card').click(function () {
        $('#role-select').hide();
        $('.belongs-guide').show();
        $('.belongs-traveler').hide();
        $('#payment-form').show()
    });

    $(document).ready(function () {
        $(".terms_conds_chk").change(function() {
            if(this.checked) {
                $('.uk-button-primary').removeAttr('disabled');
            }else {
                $('.uk-button-primary').attr('disabled', true);
            }
        });
    })
</script>
@endsection
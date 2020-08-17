@extends('theme::layouts.app')

@section('content')
<div class="header__text">
    <h1 class="header__title">
        Contact
    </h1>
</div>

<div class="contact">
    <div class="contact__inner">
        <div class="contact__content">
            <h2 class="contact__title">Get in Touch</h2>
            <p class="contact__text">Ukraina | Odessa | Kiev | Lviv</p>
            <p class="contact__text">
                <a href="mailto:jet71one@gmail.com">jet71one@gmail.com</a> | JetSetUa<a href="https://t.me/JetSetUa" target="_blank" class="footer-social-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"/></svg>
                </a>
            </p>
            <div class="contact__form">
                <div class="contact__form-header">
                    <input type="text" class="contact__form-input" placeholder="Name ">
                    <input type="text" class="contact__form-input" placeholder="Email ">
                
                </div>
                <input type="text" class=" contact__form-input contact__form-input-subject" placeholder="Subject">
                <textarea class="contact__form-input contact__form-input-message" cols="46" rows="5" placeholder="Message"></textarea>
            </div>
            <button class=" btn btn-white" type="submit">Send</button>
        </div>
        <img class="contact__img" src="images/contact-bg.jpg" alt="Contact image">
    </div>
</div>



<div class="franchise">
    <div class="container">
        <div class="franchise__text">We Need Your Support Today!</div>
        <a href="/support.html" class="btn btn-white">donate</a>
    </div>
</div>
@endsection
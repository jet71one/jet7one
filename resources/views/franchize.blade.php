@extends('theme::layouts.app')

@section('content')
<div class="header__text">
    <h1 class="header__title">
        Franchise
    </h1>
</div>

<div class="franchize-container">
    <div class="container">
        <div class="franchize__inner">
            <div class="left__col">
                <h3 class="franch__title">  Франшиза</h2>
                <p>
                    Вы можете приобрести франшизу для Вашего регион - выбор региона не связан со страной и городом в котором вы находитесь так как самое главное, это чтоб в выбранном Вами регионе Вы были хорошо ориентированы в данном регионе. 
                    Стоимость франшизы зависит от выбранной страны и региона, и составляет от $1500 до $5000 сроком на 3 месяца. По истечении трех месяцев требуется возобновление франшизы в установленной сумме за следующие три месяца пользования франшизой. 
                    В выбранном регионе Вы можете привлекать рекламные проекты, которые после нашей проверки будут размещены на сайте региона - в данном случае Вы как представитель региона получаете за их привлечение свой процент.
                </p>
            </div>
            <div class="right__col">
                <h3 class="franch__title">  Franchise</h2>
                <p>
                    You can make a region franchise request - the region choice is not related to the country and city where you are located. The most important condition is that you must be well oriented in chosen region.
The franchise cost depends on the selected country and region, and ranges from 1500 EUR to 5000 EUR for a 3 months period. After three months, a franchise renewal is required in the established amount for the next three months of region franchise using.
In the selected region, you can attract advertising projects or partners. After successful verification from our side, their logo will be added on the your region's website page and you will receive your percentage for attracting them in your region as a region representative.
                </p>
            </div>
        
           
        </div>
        <div class="register__form">
            <a href="{{route('contact')}}" class="btn btn-blue hot-tour__btn">Complete a form</a>

        </div>
    </div>
</div>       
       



@endsection
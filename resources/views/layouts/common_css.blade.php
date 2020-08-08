<!-- Styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="{{ asset('assets/css/layouts/master.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/layouts/navbar.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/layouts/footer.css') }}" rel="stylesheet">

@IsFirstVisit
    <link href="{{asset('assets/css/general/first_visit.css')}}" rel="stylesheet">
@endIsFirstVisit

@CookiesConsent
    <link href="{{asset('assets/css/general/cookies_consent.css')}}" rel="stylesheet">
@endCookiesConsent

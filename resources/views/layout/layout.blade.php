<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->

        {{--    Common Styles--}}
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">

        {{--        Page Specific Styles    --}}
    @yield('pagespecificstyles')
    {{--        Page Specific head details    --}}

    @yield('pagespecifichead')


</head>
<body data-spy="scroll" data-target="#main-nav">
@include('layout.header')
@yield('content')

@include('layout.footer')

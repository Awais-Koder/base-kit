<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.scripts.css')

    @stack('third_party_stylesheets')

    @stack('page_css')

    @include('layouts.scripts.additional_header_includes')
    
    @include('layouts.scripts.custom_css')
</head>
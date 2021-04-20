@extends('layouts.error')

@section('title_header', 'Forbidden')
@section('title', 'Forbidden')
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

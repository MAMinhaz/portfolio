@extends('layouts.error')

@section('title_header', __('Too Many Requests'))
@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))

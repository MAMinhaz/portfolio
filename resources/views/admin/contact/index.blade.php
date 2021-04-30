@extends('layouts.admin')

@section('title')
    | Users Contact Messages
@endsection

@section('admin_content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin Dashboard</a></li>
                        <li class="breadcrumb-item active">Portfolio - Get In Touch Block</li>
                    </ol>
                </div>
                <h4 class="page-title">Recived Contacts</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->


    {{-- Contact details block start --}}
    <div class="card m-b-20 card-block mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                {{-- contact details flash message start --}}
                <div>
                    {{-- flash danger -> contact details deleted start --}}
                    @if(session()->has('contact_deleted'))
                        <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('contact_deleted') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- contact details table start --}}
                <table id="contact_messages" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial number</th>
                            <th>Contact Name</th>
                            <th>Contact Email</th>
                            <th>Contact Subject</th>
                            <th>Contact Message</th>
                            <th>Contact Attachment</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $loop->index ++ }}</td>
                                <td>{{ $contact->contact_name }}</td>
                                <td>{{ $contact->contact_email }}</td>
                                <td>{{ $contact->contact_subject }}</td>
                                <td>{{ $contact->contact_message }}</td>
                                <td>{{ $contact->contact_attachment }}</td>
                                <td>
                                    @isset($contact->created_at)
                                        <li>Duration : {{ $contact->created_at->diffForHumans() }}</li>
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('contact_hard_delete', $contact->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Contact Message</a>
                                    <a href="{{ route('contact_download', $contact->id) }}" class="btn btn-info btn-rounded w-md waves-effect waves-light w-sm btn-sm">Download Contact Attachment</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#contact_messages').DataTable();
        });
    </script>
@endsection
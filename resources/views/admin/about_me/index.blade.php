@extends('layouts.admin')

@section('title')
    | About Me Block Content
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
                        <li class="breadcrumb-item active">Portfolio - About Me Block</li>
                    </ol>
                </div>
                <h4 class="page-title">About Me Contents</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->


    {{-- about me description block start --}}
    <div id="about_me_des" class="card m-b-20 card-block mt-4 mb-4">
        <h4 class="card-title">About Me - Description</h4>
        <div class="row">
            <div class="col-md-12">
                {{-- about me description flash message start --}}
                <div>
                    {{-- flash success -> about me description added start --}}
                    @if(session()->has('aboutme_des_added'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('aboutme_des_added') }}</strong>
                        </div>
                    @endif

                    {{-- flash warning -> about me description field is blank start --}}
                    @if(session()->has('aboutme_des_blank'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_des_blank') }}</strong>
                        </div>
                    @endif

                    {{-- flash warning -> about me description duplicate start --}}
                    @if(session()->has('aboutme_des_dup'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_des_dup') }}</strong>
                        </div>
                    @endif

                    {{-- flash success -> about me description edited start --}}
                    @if(session()->has('aboutme_des_edited'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('aboutme_des_edited') }}</strong>
                        </div>
                    @endif

                    {{-- flash danger -> about me description deleted start --}}
                    @if(session()->has('aboutme_des_deleted'))
                        <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_des_deleted') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- about me description table start --}}
                @if($about_me_des_count == 0)
                    <a href="#des" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                    data-overlaySpeed="100" data-overlayColor="#36404a">Add "About Me" Description</a>
                @endif
                <hr>
                <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial number</th>
                            <th>About Me Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($about_me_desc as $about_me_des)
                            <tr>
                                <td>{{ $loop->index ++ }}</td>
                                <td>{{ $about_me_des->about_me_des }}</td>
                                <td>
                                    <a href="{{ route('aboutme_des_edit', $about_me_des->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Description</a>
                                    <a href="{{ route('aboutme_des_hard_delete', $about_me_des->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Desciption</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- about me skill block start --}}
    <div id="about_me_skill" class="card m-b-20 card-block mt-4 mb-4">
        <h4 class="card-title">About Me - Skills</h4>
        <div class="row">
            <div class="col-md-12">
                {{-- about me skill flash message start --}}
                <div>
                    {{-- flash error start --}}
                    @error('skill_name')
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong> 
                        </div>
                    @enderror

                    @error('skill_percent')
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong> 
                        </div>
                    @enderror

                    {{-- flash warning -> about me skill name field is blank start --}}
                    @if(session()->has('aboutme_skill_blank_percent'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_skill_blank_percent') }}</strong>
                        </div>
                    @endif

                    {{-- flash warning -> about me skill field is blank start --}}
                    @if(session()->has('aboutme_skill_blank_name'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_skill_blank_name') }}</strong>
                        </div>
                    @endif

                    {{-- flash success -> about me skill added start --}}
                    @if(session()->has('aboutme_skill_added'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('aboutme_skill_added') }}</strong>
                        </div>
                    @endif

                    {{-- flash success -> about me skill edited start --}}
                    @if(session()->has('aboutme_skill_edited'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('aboutme_skill_edited') }}</strong>
                        </div>
                    @endif

                    {{-- flash danger -> about me skill deleted start --}}
                    @if(session()->has('aboutme_skill_deleted'))
                        <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_skill_deleted') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- about me skills table start --}}
                <a href="#skill" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a">Add "About Me" Skills</a>
                <hr>
                <table id="skills" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial number</th>
                            <th>Skill Name</th>
                            <th>Skill Percent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($about_me_skills as $about_me_skill)
                            <tr>
                                <td>{{ $loop->index ++ }}</td>
                                <td>{{ $about_me_skill->skill_name }}</td>
                                <td>{{ $about_me_skill->skill_percent }}%</td>
                                <td>
                                    <a href="{{ route('aboutme_skill_edit', $about_me_skill->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Skill</a>
                                    <a href="{{ route('aboutme_skill_hard_delete', $about_me_skill->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Skill</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- about me skills table end --}}
            </div>
        </div>
    </div>


    {{-- about me milestone block start --}}
    <div id="about_me_ms" class="card m-b-20 card-block mt-4 mb-4">
        <h4 class="card-title">About Me - Milestone</h4>
        <div class="row">
            <div class="col-md-12">
                {{-- about me skill flash message start --}}
                <div>
                    {{-- flash error start --}}
                    @error('milestone_name')
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong> 
                        </div>
                    @enderror

                    @error('milestone_digit')
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong> 
                        </div>
                    @enderror

                    {{-- flash warning -> about me milestone limit crossed start --}}
                    @if(session()->has('aboutme_ms_limit_4'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_ms_limit_4') }}</strong>
                        </div>
                    @endif

                    {{-- flash warning -> about me milestone name field is blank start --}}
                    @if(session()->has('aboutme_ms_blank_name'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_ms_blank_name') }}</strong>
                        </div>
                    @endif

                    {{-- flash warning -> about me milestone digit field is blank start --}}
                    @if(session()->has('aboutme_ms_blank_digit'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_ms_blank_digit') }}</strong>
                        </div>
                    @endif

                    {{-- flash success -> about me milestone added start --}}
                    @if(session()->has('aboutme_ms_added'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('aboutme_ms_added') }}</strong>
                        </div>
                    @endif

                    {{-- flash success -> about me milestone edited start --}}
                    @if(session()->has('aboutme_milestone_edited'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('aboutme_milestone_edited') }}</strong>
                        </div>
                    @endif

                    {{-- flash danger -> about me milestone deleted start --}}
                    @if(session()->has('aboutme_ms_deleted'))
                        <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('aboutme_ms_deleted') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- about me skills table start --}}
                @if($about_me_ms_count <= 3)
                    <a href="#milestone" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                    data-overlaySpeed="100" data-overlayColor="#36404a">Add "About Me" Milestones</a>
                @endif
                <hr>
                <table id="milestones" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial number</th>
                            <th>Milestone Name</th>
                            <th>Milestone digit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($about_me_mss as $about_me_ms)
                            <tr>
                                <td>{{ $loop->index ++ }}</td>
                                <td>{{ $about_me_ms->milestone_name }}</td>
                                <td>{{ $about_me_ms->milestone_digit }}</td>
                                <td>
                                    <a href="{{ route('aboutme_ms_edit', $about_me_ms->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Milestone</a>
                                    <a href="{{ route('aboutme_ms_hard_delete', $about_me_ms->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Milestone</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- about me description addition modal form start --}}
    <div id="des" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <br>
        <h4 class="custom-modal-title">Add New Description</h4>
        <div class="custom-modal-text">
            <form method="POST" action="{{ route('aboutme_des_create_post') }}">
                @csrf
                <div class="form-group">
                    <label style="font-size: 150%" >Description</label>
                    <input type="text" class="form-control" name="about_me_des" required>
                    <br>
                    <p>
                        <strong>Notes your should follow to add new description</strong>
                        <mark>
                            <ul>
                                <li>You cann add descripton only one time.</li>
                                <li>Your can edit it as you want after adding a new description.</li>
                            </ul>
                        </mark>
                    </p>

                    @error('about_me_des')
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ $message }}</strong> 
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Description</button>
            </form>
        </div>
    </div>


    {{-- about me skills addition modal form start --}}
    <div id="skill" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <br>
        <h4 class="custom-modal-title">Add New Skills</h4>
        <div class="custom-modal-text">
            <form method="POST" action="{{ route('aboutme_skills_create_post') }}">
                @csrf
                <div class="form-group">
                    <label style="font-size: 150%">Skill Name</label>
                    <input type="text" class="form-control" name="skill_name" required>
                    <br>
                    <p>
                        <strong>Notes your should follow to add skill name</strong>
                        <mark>
                            <ul>
                                <li>Your skill name should be unique.</li>
                            </ul>
                        </mark>
                    </p>
                </div>

                <div class="form-group">
                    <label style="font-size: 150%">Skill Percent</label>
                    <input type="text" class="form-control" name="skill_percent" required>
                    <br>
                    <p>
                        <strong>Notes your should follow to add skill percent</strong>
                        <mark>
                            <ul>
                                <li>Your skill percent should be number.</li>
                            </ul>
                        </mark>
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">Add Skill</button>
            </form>
        </div>
    </div>


    {{-- about me milestones addition modal form start --}}
    <div id="milestone" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <br>
        <h4 class="custom-modal-title">Add New Milestone</h4>
        <div class="custom-modal-text">
            <form method="POST" action="{{ route('aboutme_ms_create_post') }}">
                @csrf

                <div class="form-group">
                    <label style="font-size: 150%">Milestone Name</label>
                    <input type="text" class="form-control" name="milestone_name">
                    <br>
                    <p>
                        <strong>Notes your should follow to add milestone name</strong>
                        <mark>
                            <ul>
                                <li>You can add milestone only four times. If you want to add another try to add after deleting previous one or edit it . </li>
                                <li>Your Milestone should be unique.</li>
                                <li>Your can edit it as you want after adding a new milestone.</li>
                            </ul>
                        </mark>
                    </p>
                </div>

                <div class="form-group">
                    <label style="font-size: 150%">Milestone Digit</label>
                    <input type="number" class="form-control" name="milestone_digit">
                    <br>
                    <p>
                        <strong>Notes your should follow to add skill name</strong>
                        <mark>
                            <ul>
                                <li>You can add milestone only four times. If you want to add another try to add after deleting previous one or edit it . </li>
                                <li>Your Milestone should be unique.</li>
                                <li>Your can edit it as you want after adding a new milestone.</li>
                            </ul>
                        </mark>
                    </p>
                </div>

                <button type="submit" class="btn btn-primary">Add Milestone</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#skills').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#milestones').DataTable();
        });
    </script>
@endsection
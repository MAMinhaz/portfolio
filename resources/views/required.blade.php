{{-- web breadcrumb start --}}

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Adminox</a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

{{-- web breadcrumb end --}}

{{-- flash messages start --}}

    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="mdi mdi-check-all"></i>
        <strong>Well done!</strong> You successfully read this important alert
        message.
    </div>
    <div class="alert alert-icon alert-white alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="mdi mdi-information"></i>
        <strong>Heads up!</strong> This alert needs your attention, but it's not
        super important.
    </div>
    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="mdi mdi-alert"></i>
        <strong>Holy guacamole!</strong> You should check in on some of those
        fields below.
    </div>
    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="mdi mdi-block-helper"></i>
        <strong>Oh snap!</strong> Change a few things up and try submitting
        again.
    </div>

{{-- flash messages end --}}


    {{-- single image upload start --}}
    if ($request->hasFile('product_thumbnail_picture')) {
        $uploaded_picture = $request->file('product_thumbnail_picture');
        $picture_name = $cat_id.".".$uploaded_picture->getClientOriginalExtension();
        $picture_location = 'public/uploads/product_thumbnail_picture/'.$picture_name;
        Image::make($uploaded_picture)->save(base_path($picture_location));
        Product::find($cat_id)->update([
            'product_thumbnail_picture' => $picture_name,
            'updated_at' => Carbon::now(),
        ]);
    }
    {{-- single image upload end --}}

    {{-- Multiple image upload start --}}
    if($request->hasFile('product_multiple_picture')){

        $flag = 1;

        foreach ($request->file('product_multiple_picture') as $single_picture) {
            $uploaded_picture = $single_picture;
            $picture_name = $cat_id."-".$flag.".".$uploaded_picture->getClientOriginalExtension();
            $picture_location = 'public/uploads/product_multiple_picture/'.$picture_name;
            Image::make($uploaded_picture)->save(base_path($picture_location));

            $flag++;

            Picture_Multiple::insert([
                'product_id' => $cat_id,
                'product_multiple_picture' => $picture_name,
                'created_at' => Carbon::now(),
            ]);
        }
    }
    {{-- Multiple image upload end --}}

    {{-- file upload post start --}}
    $contact_id = Contact::insertGetId($request->except('_token')+[
        'created_at' => Carbon::now()
    ]);

    // return back();
    if($request->hasFile('contact_attachment')){
        // $file_path = $request->file('contact_attachment')->store('contact_attachment');
        $path = $request->file('contact_attachment')->storeAs(
            'contact_upload', $contact_id . '.' . $request->file('contact_attachment')->getClientOriginalExtension(),
        );
    Contact::find($contact_id)->update([
        'contact_attachment' => $path,
        'updated_at' => Carbon::now(),
        ]);
    }
    return back();
    {{-- file upload post end --}}



    {{-- file download start --}}
    return Storage::download(Contact::findOrFail($contact_id)->contact_attachment);
    return back();
    {{-- file download end --}}


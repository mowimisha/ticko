@extends('layouts.dev')

@section('title')
    Edit Post
@endsection

@section('content')

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <script src="../js/sweetalert2.all.js"></script>

        <!-- Include this after the sweet alert js file -->
        @if (Session::has('sweet_alert.alert'))
            <script>
                swal({!! Session::get('sweet_alert.alert') !!});
            </script>
        @endif



    <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Edit Post
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
        @if(Auth::user()->hasRole('dev'))
            @foreach ($posts as $post)
                <form class="kt-form kt-form--label-right" method="POST" action="/update-post-dev/{{ $post->id }}" role="form" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="kt-portlet__body">

                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <label>Post Title:</label>
                                <small><i>(Name of event/music title)</i></small>
                                <div class="input">
                                    <input type="text" class="form-control" name="title"  required value="{{ $post->title }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <label class="">Category:</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="category" required>
                                        <option value="{{ $post->category }}" selected>{{ $post->category }}</option>
                                        <option value="" class="hidden">Select Post Category</option>
                                        <option value="music-concert">Music Concert</option>
                                        <option value="movie">Movie</option>
                                        <option value="breakfast-meeting">Breakfast Meeting</option>
                                        <option value="gala">Gala</option>
                                        <option value="music-album">Music Album</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-lg-6">
                                <label>Description:</label>
                                <small><i>(Brief description about your event i.e what its about, venue and charges)</i></small>
                                <div class="input">
                                    <textarea value="{{ $post->description }}" class="form-control" name="description" id="" rows="4"
                                    placeholder="This is the 2nd Edition of the Toa Kutu Edition to be Held on 12th Dec at Uhuru Gardens ground from 1PM till late. Guest performance include Ethic, Kansoul and Khaligraph Jones.">{{ $post->description }}</textarea>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-3">
                                <label class="">Charges:</label>
                                <input type="text" class="form-control" value="{{ $post->charges }}" name="charges" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="">Location:</label>
                                <input type="text" class="form-control" value="{{ $post->location }}" name="location" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <label class="">Date & Time:</label>
                                <div class='input-group pull-right' id='kt_daterangepicker_4'>
                                    <input type='text' class="form-control" readonly placeholder="Select date & time range" name="dates"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <label class="">Featured Status:</label>
                                <small><i>(have post appear among featured posts for more visibility at an additional fee)</i></small>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="feature_status" required>
                                        <option value="{{ $post->feature_status }}" selected>{{ $post->feature_status }}</option>
                                        <option value="" class="hidden">Select Feature Status</option>
                                        <option value="normal">Normal</option>
                                        <option value="featured">Featured</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <label class="">Status:</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="status" required>
                                        <option value="{{ $post->status }}" selected>{{ $post->status }}</option>
                                        <option value="" class="hidden">Select Post Status</option>
                                        <option value="active">Active</option>
                                        <option value="in-active">In-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        @endif
        </div>

</div>
<!-- end:: Content -->

@endsection

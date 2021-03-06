@extends('layouts.dev')

@section('title')
    New User
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
                        Add User
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            @if(Auth::user()->hasRole('dev'))
                <form class="kt-form kt-form--label-right" method="POST" action="{{ url('new-payment-dev') }}" role="form" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Firstname:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                    <input type="text" class="form-control" name="name"  required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Lastname:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                    <input type="text" class="form-control" name="lastname" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="">Email:</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label class="">Company:</label>
                                <input type="text" class="form-control" name="company" required>
                            </div>
                            <div class="col-lg-4">
                                <label class="">Phone:</label>
                                <input type="text" class="form-control" name="phone" required>
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
            @endif
            <!--end::Form-->
        </div>

</div>
<!-- end:: Content -->

@endsection

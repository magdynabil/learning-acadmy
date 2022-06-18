@extends('Front.layout')
<!-- Header part end-->
@section('content')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Course Details</h2>
                            <p>Homepage<span>/</span>Courses<span>/</span>{{$Courses->cat->name}}<span>/</span>{{$Courses->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{asset('Uploads/Cources/'.$Courses->img)}}" alt="">
                    </div>
                    <div class="content_wrapper">
                        <div class="content my-5" >
                           {!! $Courses->desc !!}
                        </div>

                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Trainer’s Name</p>
                                    <span class="color">{{$Courses->Trainer->name}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee </p>
                                    <span>${{$Courses->price}}</span>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="btn_1 d-block">Enroll the course</a>
                    </div>
                    <div class="my-5">
                        @include('Front.inc.errors')
                        <form class="form-contact contact_form" action="{{route('front.message.enroll')}}" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="course_id" value="{{$Courses->id}}">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" id="phone" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone number'" placeholder = 'Enter phone number'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="specialty" id="specialty" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your specialty'" placeholder = 'Enter your specialty'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm btn_1">Enroll</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection

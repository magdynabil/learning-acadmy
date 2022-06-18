@extends('Front.layout')
<!-- Header part end-->
@section('content')
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>{{json_decode($banner->content)->title}}</h5>
                        <h1>{{json_decode($banner->content)->sub_title}}</h1>
                        <p>{{json_decode($banner->content)->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xl-3 align-self-center">
                <div class="single_feature_text ">
                    <h2>{!! json_decode($feature->content)->main_title!!}</h2>
                    <p>{!! json_decode($feature->content)->main_description!!} </p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-layers"></i></span>
                        <h4>{!! json_decode($feature->content)->section_1_title!!}</h4>
                        <p>{!! json_decode($feature->content)->section_1_description!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                        <h4>{!! json_decode($feature->content)->section_2_title!!}</h4>
                        <p>{!! json_decode($feature->content)->section_2_description!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part single_feature_part_2">
                        <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                        <h4>{!! json_decode($feature->content)->section_3_title!!}</h4>
                        <p>{!! json_decode($feature->content)->section_3_description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->
<!-- member_counter counter start -->
<section class="member_counter">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$Courses_count}}</span>
                    <h4>Courses</h4>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$Trainers_count}}</span>
                    <h4> Trainers</h4>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter">{{$Students_count}}</span>
                    <h4>Students</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- member_counter counter end -->
<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>popular courses</p>
                    <h2>Special Courses</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($Courses as $Course)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{asset('Uploads/Cources/'.$Course->img)}}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="{{route('front.cat',$Course->Cat->id)}}" class="btn_4">{{$Course->Cat->name}}</a>
                            <h4>${{$Course->price}}</h4>
                            <a href="{{route('front.show',[$Course->Cat->id,$Course->id])}}"><h3>{{$Course->name}}</h3></a>
                            <p>{{$Course->small_desc}}</p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img src="{{asset('Uploads/Trainers/'.$Course->Trainer->img)}}" alt="">
                                    <div class="author_info_text">
                                        <p>Conduct by:</p>
                                        <h5><a href="#">{{$Course->Trainer->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!--::blog_part end::-->
<!--::review_part start::-->
<section class="testimonial_part padding_top pb-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>tesimonials</p>
                    <h2>Happy Students</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="textimonial_iner owl-carousel">
                    @foreach($Tesimonials as $Tesimonial)
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>{{$Tesimonial->desc}}</p>
                                        <h4>{{$Tesimonial->name}}</h4>
                                        <h5> {{$Tesimonial->specialty}}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="{{asset('Uploads/Tesimonials/'.$Tesimonial->img)}}" alt="#">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p>{{$Tesimonial->desc}}</p>
                                        <h4>{{$Tesimonial->name}}</h4>
                                        <h5> {{$Tesimonial->specialty}}</h5>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="{{asset('Uploads/Tesimonials/'.$Tesimonial->img)}}" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>
</section>
<!--::blog_part end::-->
<!-- footer part start-->
@endsection

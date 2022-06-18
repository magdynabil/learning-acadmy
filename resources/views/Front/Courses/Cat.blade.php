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
                            <h2>Our Courses</h2>
                            <p>Homepage<span>/</span>Courses<span>/</span>{{$Cat->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top ">
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
                    <div class="col-sm-6 col-lg-4 mb-5">
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
            <div class="d-flex justify-content-center"> {!! $Courses->render() !!}</div>

        </div>

    </section>

    <!--::blog_part end::-->



    <!-- footer part start-->

@endsection

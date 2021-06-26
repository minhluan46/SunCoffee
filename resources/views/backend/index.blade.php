@extends('layouts.backend_layout')
@section('active_thong_ke')class="active"@endsection
@section('content')
<div class="main_content_iner overly_inner ">
  <div class="container-fluid p-0 ">
    <!-- page title  -->
    <div class="row ">
      <div class="col-xl-8 ">
        <div class="white_card mb_30 card_height_100">
          <div class="white_card_header">
            <div class="row align-items-center justify-content-between flex-wrap">
              <div class="col-lg-4">
                <div class="main-title">
                  <h3 class="m-0">Stoke Details</h3>
                </div>
              </div>
              <div class="col-lg-4 text-right d-flex justify-content-end">
                <select class="nice_Select2 max-width-220" >
                  <option value="1">Show by month</option>
                  <option value="1">Show by year</option>
                  <option value="1">Show by day</option>
                </select>
              </div>
            </div>
          </div>
          <div class="white_card_body">
            <div id="management_bar"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 ">
        <div class="white_card card_height_100 mb_30 user_crm_wrapper">
          <div class="row">
            <div class="col-lg-6">
              <div class="single_crm">
                <div class="crm_head d-flex align-items-center justify-content-between" >
                  <div class="thumb">
                    <img src="img/crm/businessman.svg" alt="">
                  </div>
                  <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                </div>
                <div class="crm_body">
                  <h4>2455</h4>
                  <p>User Registrations</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="single_crm ">
                <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between" >
                  <div class="thumb">
                    <img src="img/crm/customer.svg" alt="">
                  </div>
                  <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                </div>
                <div class="crm_body">
                  <h4>2455</h4>
                  <p>User Registrations</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="single_crm">
                <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between" >
                  <div class="thumb">
                    <img src="img/crm/infographic.svg" alt="">
                  </div>
                  <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                </div>
                <div class="crm_body">
                  <h4>2455</h4>
                  <p>User Registrations</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="single_crm">
                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between" >
                  <div class="thumb">
                    <img src="img/crm/sqr.svg" alt="">
                  </div>
                  <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                </div>
                <div class="crm_body">
                  <h4>2455</h4>
                  <p>User Registrations</p>
                </div>
              </div>
            </div>
          </div>
          <div class="crm_reports_bnner">
            <div class="row justify-content-end ">
              <div class="col-lg-6">
                <h4>Create CRM Reports</h4>
                <p>Outlines keep you and honest
                indulging honest.</p>
                <a href="#">Read More <i class="fas fa-arrow-right"></i> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_header">
            <div class="row align-items-center">
              <div class="col-lg-4">
                <div class="main-title">
                  <h3 class="m-0">New Users</h3>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="row justify-content-end">
                  <div class="col-lg-8 d-flex justify-content-end">
                    <div class="serach_field-area theme_bg d-flex align-items-center">
                      <div class="search_inner">
                        <form action="#">
                          <div class="search_field">
                            <input type="text" placeholder="Search">
                          </div>
                          <button type="submit"> <img src="img/icon/icon_search.svg" alt=""> </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-lg-4 mt_20">
                <select class="nice_Select2 wide" >
                  <option value="1">Show by All</option>
                  <option value="1">Show by A</option>
                  <option value="1">Show by B</option>
                </select>
              </div>
            </div>
          </div>
          <div class="white_card_body ">
            <div class="single_user_pil d-flex align-items-center justify-content-between">
              <div class="user_pils_thumb d-flex align-items-center">
                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
              </div>
              <div class="user_info">
                Customer
              </div>
              <div class="action_btns d-flex">
                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
              </div>
            </div>
            <div class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
              <div class="user_pils_thumb d-flex align-items-center">
                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
              </div>
              <div class="user_info">
                Admin
              </div>
              <div class="action_btns d-flex">
                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
              </div>
            </div>
            <div class="single_user_pil d-flex align-items-center justify-content-between">
              <div class="user_pils_thumb d-flex align-items-center">
                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
              </div>
              <div class="user_info">
                Customer
              </div>
              <div class="action_btns d-flex">
                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
              </div>
            </div>
            <div class="single_user_pil d-flex align-items-center justify-content-between">
              <div class="user_pils_thumb d-flex align-items-center">
                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
              </div>
              <div class="user_info">
                Customer
              </div>
              <div class="action_btns d-flex">
                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
              </div>
            </div>
            <div class="single_user_pil d-flex align-items-center justify-content-between mb-0">
              <div class="user_pils_thumb d-flex align-items-center">
                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
              </div>
              <div class="user_info">
                Customer
              </div>
              <div class="action_btns d-flex">
                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_header">
            <div class="box_header m-0">
              <div class="main-title">
                <h3 class="m-0">Sales of the last week</h3>
              </div>
              <div class="header_more_tool">
                <div class="dropdown">
                  <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="ti-more-alt"></i>
                  </span>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                    <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                    <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                    <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                    <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="white_card_body">
            <div id="chart-currently"></div>
            <div class="monthly_plan_wraper">
              <div class="single_plan d-flex align-items-center justify-content-between">
                <div class="plan_left d-flex align-items-center">
                  <div class="thumb">
                    <img src="img/icon2/7.svg" alt="">
                  </div>
                  <div>
                    <h5>Most Sales</h5>
                    <span>Authors with the best sales</span>
                  </div>
                </div>
              </div>
              <div class="single_plan d-flex align-items-center justify-content-between">
                <div class="plan_left d-flex align-items-center">
                  <div class="thumb">
                    <img src="img/icon2/6.svg" alt="">
                  </div>
                  <div>
                    <h5>Total sales lead</h5>
                    <span>40% increased on week-to-week reports</span>
                  </div>
                </div>
              </div>
              <div class="single_plan d-flex align-items-center justify-content-between">
                <div class="plan_left d-flex align-items-center">
                  <div class="thumb">
                    <img src="img/icon2/5.svg" alt="">
                  </div>
                  <div>
                    <h5>Average Bestseller</h5>
                    <span>Pitstop Email Marketing</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="white_card card_height_100 mb_30 overflow_hidden">
          <div class="white_card_header">
            <div class="box_header m-0">
              <div class="main-title">
                <h3 class="m-0">Sales Details</h3>
              </div>
              <div class="header_more_tool">
                <div class="dropdown">
                  <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="ti-more-alt"></i>
                  </span>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                    <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                    <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                    <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                    <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="white_card_body pb-0">
            <div class="Sales_Details_plan">
              <div class="row">
                <div class="col-lg-6">
                  <div class="single_plan d-flex align-items-center justify-content-between">
                    <div class="plan_left d-flex align-items-center">
                      <div class="thumb">
                        <img src="img/icon2/3.svg" alt="">
                      </div>
                      <div>
                        <h5>$2,034</h5>
                        <span>Author Sales</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single_plan d-flex align-items-center justify-content-between">
                    <div class="plan_left d-flex align-items-center">
                      <div class="thumb">
                        <img src="img/icon2/1.svg" alt="">
                      </div>
                      <div>
                        <h5>$706</h5>
                        <span>Commision</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single_plan d-flex align-items-center justify-content-between">
                    <div class="plan_left d-flex align-items-center">
                      <div class="thumb">
                        <img src="img/icon2/4.svg" alt="">
                      </div>
                      <div>
                        <h5>$49</h5>
                        <span>Average Bid</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single_plan d-flex align-items-center justify-content-between">
                    <div class="plan_left d-flex align-items-center">
                      <div class="thumb">
                        <img src="img/icon2/2.svg" alt="">
                      </div>
                      <div>
                        <h5>$5.8M</h5>
                        <span>All Time Sales</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="chart_wrap overflow_hidden">
            <div id="chart4"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
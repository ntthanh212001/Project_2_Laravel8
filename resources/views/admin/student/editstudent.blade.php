@extends('admin.layouts.master')
@section('title', 'Sửa Sinh viên')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <div>
        <form action="{{'/admin/student/update/'}}" method="post" id="myForm" name="myForm" >
            @csrf
            <input type="hidden" name="id" value="{{$data['id']}}">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Mã Sinh viên <span
                                style="color: red;font-size: 10px;font-style: italic;" id="error_masv"></span> </label>
                        <input type="text" name="masv" class="form-control" value="{{$data['masv']}}" >
                        <span style="color: red;">
                            @error('masv')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Họ tên <span style="color: red;font-size: 10px;font-style: italic;"
                                                               id="error_hoten"></span> </label>
                        <input type="text" name="hoten" class="form-control" value="{{$data['hoten']}}">
                        <span style="color: red;">
                            @error('hoten')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Giới tính :</label>

                    <label class="radio-inline col-lg-4"><input type="radio" name="gioitinh" value="1" {{ $data->gioitinh == 1 ? 'checked' : ''}}> Nam </label>
                    <label class="radio-inline col-lg-4"><input type="radio" name="gioitinh" value="0" {{ $data->gioitinh == 0 ? 'checked' : ''}}> Nữ</label>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Ngày sinh <span style="color: red;font-size: 10px;font-style: italic;"
                                                                  id="error_ngaysinh"></span> </label>
                        <input type="date" name="ngaysinh" value="{{$data['ngaysinh']}}" max="2050-01-01" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Số điện thoại <span
                                style="color: red;font-size: 10px;font-style: italic;" id="error_phone"></span> </label>
                        <input type="tel" name="phone" class="form-control" value="{{$data['phone']}}">
                        <span style="color: red;">
                            @error('phone')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Địa chỉ <span style="color: red;font-size: 10px;font-style: italic;"
                                                                id="error_address"></span> </label>
                        <input type="tel" name="address" class="form-control" value="{{$data['address']}}">
                        <span style="color: red;">
                            @error('address')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="form-label">Gender</label>
                    <div class="dropdown bootstrap-select form-control"><select class="form-control" tabindex="-98">
                        <option value="Gender">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Gender"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Gender</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                </div>
            </div> --}}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Email<span style="color: red;font-size: 10px;font-style: italic;"
                                                             id="error_email"></span> </label>
                        <input type="email" name="email" class="form-control" value="{{$data['email']}}">
                        <span style="color: red;">
                            @error('email')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control"  name="password"
                               value="{{$data['password']}}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label class="form-label">Ngành</label>
                    <select class="form-control form-control-lg" name="nganh_id" >
                        {{-- <option value="">{{$nganhs}}</option> --}}
                        @foreach ($data2 as $item)
                            <option id="nganh_id"  value="{{ $item->id }}" >{{ $item->tennganh }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label class="form-label">Lớp</label>
                    <select class="form-control form-control-lg" name="lop_id">
                        @foreach ($data3 as $item)
                            <option id="lop_id"  value="{{ $item->id }}" >{{ $item->tenlop }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="form-label">Date of Birth</label>
                    <input name="datepicker" class="datepicker-default form-control picker__input" id="datepicker1" readonly="" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="datepicker1_root"><div class="picker" id="datepicker1_root" aria-hidden="true"><div class="picker__holder" tabindex="-1"><div class="picker__frame"><div class="picker__wrap"><div class="picker__box"><div class="picker__header"><div class="picker__month">September</div><div class="picker__year">2021</div><div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="datepicker1_table" title="Previous month"> </div><div class="picker__nav--next" data-nav="1" role="button" aria-controls="datepicker1_table" title="Next month"> </div></div><table class="picker__table" id="datepicker1_table" role="grid" aria-controls="datepicker1" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="Sunday">Sun</th><th class="picker__weekday" scope="col" title="Monday">Mon</th><th class="picker__weekday" scope="col" title="Tuesday">Tue</th><th class="picker__weekday" scope="col" title="Wednesday">Wed</th><th class="picker__weekday" scope="col" title="Thursday">Thu</th><th class="picker__weekday" scope="col" title="Friday">Fri</th><th class="picker__weekday" scope="col" title="Saturday">Sat</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1630170000000" role="gridcell" aria-label="29 August, 2021">29</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1630256400000" role="gridcell" aria-label="30 August, 2021">30</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1630342800000" role="gridcell" aria-label="31 August, 2021">31</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1630429200000" role="gridcell" aria-label="1 September, 2021">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1630515600000" role="gridcell" aria-label="2 September, 2021">2</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1630602000000" role="gridcell" aria-label="3 September, 2021">3</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1630688400000" role="gridcell" aria-label="4 September, 2021">4</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1630774800000" role="gridcell" aria-label="5 September, 2021">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1630861200000" role="gridcell" aria-label="6 September, 2021">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1630947600000" role="gridcell" aria-label="7 September, 2021">7</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631034000000" role="gridcell" aria-label="8 September, 2021">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631120400000" role="gridcell" aria-label="9 September, 2021">9</div></td><td role="presentation"><div class="picker__day picker__day--infocus picker__day--today picker__day--highlighted" data-pick="1631206800000" role="gridcell" aria-label="10 September, 2021" aria-activedescendant="true">10</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631293200000" role="gridcell" aria-label="11 September, 2021">11</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631379600000" role="gridcell" aria-label="12 September, 2021">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631466000000" role="gridcell" aria-label="13 September, 2021">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631552400000" role="gridcell" aria-label="14 September, 2021">14</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631638800000" role="gridcell" aria-label="15 September, 2021">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631725200000" role="gridcell" aria-label="16 September, 2021">16</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631811600000" role="gridcell" aria-label="17 September, 2021">17</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631898000000" role="gridcell" aria-label="18 September, 2021">18</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1631984400000" role="gridcell" aria-label="19 September, 2021">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632070800000" role="gridcell" aria-label="20 September, 2021">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632157200000" role="gridcell" aria-label="21 September, 2021">21</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632243600000" role="gridcell" aria-label="22 September, 2021">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632330000000" role="gridcell" aria-label="23 September, 2021">23</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632416400000" role="gridcell" aria-label="24 September, 2021">24</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632502800000" role="gridcell" aria-label="25 September, 2021">25</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632589200000" role="gridcell" aria-label="26 September, 2021">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632675600000" role="gridcell" aria-label="27 September, 2021">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632762000000" role="gridcell" aria-label="28 September, 2021">28</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632848400000" role="gridcell" aria-label="29 September, 2021">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1632934800000" role="gridcell" aria-label="30 September, 2021">30</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633021200000" role="gridcell" aria-label="1 October, 2021">1</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633107600000" role="gridcell" aria-label="2 October, 2021">2</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633194000000" role="gridcell" aria-label="3 October, 2021">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633280400000" role="gridcell" aria-label="4 October, 2021">4</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633366800000" role="gridcell" aria-label="5 October, 2021">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633453200000" role="gridcell" aria-label="6 October, 2021">6</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633539600000" role="gridcell" aria-label="7 October, 2021">7</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633626000000" role="gridcell" aria-label="8 October, 2021">8</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1633712400000" role="gridcell" aria-label="9 October, 2021">9</div></td></tr></tbody></table><div class="picker__footer"><button class="picker__button--today" type="button" data-pick="1631206800000" disabled="" aria-controls="datepicker1">Today</button><button class="picker__button--clear" type="button" data-clear="1" disabled="" aria-controls="datepicker1">Clear</button><button class="picker__button--close" type="button" data-close="true" disabled="" aria-controls="datepicker1">Close</button></div></div></div></div></div></div>
                </div>
            </div> --}}
                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-left: 650px;padding: 20px 20px 20px 20px;">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </div>
        </form>

    </div>
    <script>
        // function validateForm() {
        //     if (document.myForm.masv.value === "") {
        //         const element = document.getElementById("error_masv");
        //         element.innerHTML = "(Mã sinh viên không để trống)";
        //         document.myForm.masv.focus();
        //         return false;
        //     }
        //     if (document.myForm.hoten.value === "") {
        //         const element = document.getElementById("error_hoten");
        //         element.innerHTML = "(Họ tên không để trống)";
        //         document.myForm.hoten.focus();
        //         return false;
        //     }
        //
        //     if (document.myForm.phone.value === "") {
        //         const element = document.getElementById("error_phone");
        //         element.innerHTML = "(Số điện thoại không để trống)";
        //         document.myForm.phone.focus();
        //         return false;
        //     }
        //     if (document.myForm.address.value === "") {
        //         const element = document.getElementById("error_address");
        //         element.innerHTML = "(Địa chỉ không để trống)";
        //         document.myForm.address.focus();
        //         return false;
        //     }
        //     if (document.myForm.email.value === "") {
        //         const element = document.getElementById("error_email");
        //         element.innerHTML = "(Email không để trống)";
        //         document.myForm.email.focus();
        //         return false;
        //     }
        //
        //     return true;
        // }


    </script>
@endsection

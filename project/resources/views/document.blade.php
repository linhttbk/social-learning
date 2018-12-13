@extends('default')
@section('title','Document')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('css/contact_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/document.css')}}">
@endsection
@section('js')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/header_search.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
@endsection
@section('content')

    <!-- Home -->
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Tài liệu tham khảo</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="courses">
        <div class="container">
            <div class="row">
                <!-- Courses Main Content -->
                <div class="col-lg-8">
                    <div class="td-pb-span8 td-main-content" role="main">
                        <div class="td-ss-main-content">
                            <div class="clearfix"></div>
                            <div class="td-page-header">
                                <h1 class="entry-title td-page-title">
                                    <span>Upload Tài Liệu</span>
                                </h1>
                            </div>
                            <div class="td-page-content">
                                <style>
                                </style>
                                <p>Khu vực dành cho tác giả và thành viên upload tài liệu<br>
                                </p>
                                <form class="wpuf-form-add wpuf-form-layout1" action="" method="post">
                                    <ul class="wpuf-form form-label-left">
                                        <li class="el-name">
                                            <div class="wpuf-label">
                                                <label>Tên tài khoản <span class="required">*</span></label>
                                            </div>

                                            <div class="wpuf-fields">
                                                <input type="text" required="required" data-required="yes" data-type="text" name="guest_name" value="{{\Illuminate\Support\Facades\Auth::user()->uid}}" size="40" disabled>
                                            </div>
                                        </li>
                                        <script type="text/javascript">
                                        if ( typeof wpuf_conditional_items === 'undefined' ) {
                                        wpuf_conditional_items = [];
                                        }

                                        if ( typeof wpuf_plupload_items === 'undefined' ) {
                                        wpuf_plupload_items = [];
                                        }

                                        if ( typeof wpuf_map_items === 'undefined' ) {
                                        wpuf_map_items = [];
                                        }
                                        </script>
                                        <li class="wpuf-el post_title" data-label="Tên tài liệu">
                                            <div class="wpuf-label">
                                                <label for="post_title">Mô tả <span class="required">*</span></label>
                                            </div>
                                            <div class="wpuf-fields">
                                                <input class="textfield wpuf_post_title_1412" id="post_title_1412" type="text" data-required="yes" data-type="text" name="post_title" placeholder="Vui lòng nhập tên tài liệu của bạn" value="" size="40">
                                                <span class="wpuf-wordlimit-message wpuf-help"></span>
                                            </div>
                                            <script type="text/javascript">
                                            wpuf_conditional_items.push();
                                            </script>
                                        </li>
                                        <li class="wpuf-el category" data-label="Danh mục">
                                            <div class="wpuf-label">
                                                <label for="category">Danh mục <span class="required">*</span></label>
                                            </div>
                                            <div class="wpuf-fields wpuf_category_select_1414_1412">
                                                <select data-required="yes" data-type="select" name="category[]" id="category[]" class="category wpuf_category_1412">
                                                    <option value="-1">Chọn danh mục</option>
                                                    <option value=""></option>
                                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                                    <?php foreach ($catalogs as $row):?>
                                                    <?php if(($row->id) < 6):?>
                                                    <optgroup label="<?php echo $row->title?>">
                                                        <?php foreach ($catalogs as $sub):?>
                                                        <?php if($sub->id_parent == $row->id):?>
                                                        <option value="<?php echo $sub->id?>">
                                                            <?php echo $sub->title?>
                                                        </option>
                                                        <?php endif;?>
                                                        <?php endforeach;?>
                                                    </optgroup>
                                                    <?php endif;?>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <script type="text/javascript">
                                            wpuf_conditional_items.push({"condition_status":"no","cond_field":[""],"cond_operator":["="],"cond_option":[""],"cond_logic":"all","name":"category_select_1414"});
                                            </script>
                                        </li>
                                        <li class="wpuf-el tap_tin_tai_len" data-label="Tập tin tải lên">
                                            <div class="wpuf-label">
                                                <label for="tap_tin_tai_len">Tập tin tải lên <span class="required">*</span></label>
                                            </div>
                                            <div class="wpuf-fields">
                                                <div id="wpuf-tap_tin_tai_len-1412-upload-container" style="position: relative;">
                                                    <div class="wpuf-file-warning"></div>
                                                    <div class="wpuf-attachment-upload-filelist" data-type="file" data-required="yes">
                                                        <a id="wpuf-tap_tin_tai_len-1412-pickfiles" data-form_id="1412" class="button file-selector  wpuf_tap_tin_tai_len_1412" href="#" style="position: relative; z-index: 1; display: inline;">Chọn tập tin</a>
                                                    </div>
                                                    <div id="html5_1cujrcuk3t4gaa185q1fr86gd3_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: -1px; left: 0px; width: 119px; height: 30px; overflow: hidden; z-index: 0;">
                                                        <input id="html5_1cujrcuk3t4gaa185q1fr86gd3" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" multiple="" accept="">
                                                    </div>
                                                </div><!-- .container -->
                                                <span class="wpuf-help"></span>
                                            </div> <!-- .wpuf-fields -->
                                            <script type="text/javascript">
                                                jQuery(function($) {
                                                    var uploader = new WPUF_Uploader('wpuf-tap_tin_tai_len-1412-pickfiles', 'wpuf-tap_tin_tai_len-1412-upload-container', 1, 'tap_tin_tai_len', 'pdf,doc,ppt,pps,xls,mdb,docx,xlsx,pptx,odt,odp,ods,odg,odc,odb,odf,rtf,txt,zip,gz,gzip,rar,7z,', 10000);
                                                    wpuf_plupload_items.push(uploader);
                                                });
                                            </script>
                                            <script type="text/javascript">
                                                wpuf_conditional_items.push({"condition_status":"yes","cond_field":["category"],"cond_operator":["="],"cond_option":[""],"cond_logic":"all","type":"file_upload","name":"tap_tin_tai_len","form_id":"1412"});
                                            </script>
                                        </li>
                                        <li class="wpuf-submit">
                                            <div class="wpuf-label">
                                                &nbsp;
                                            </div>

                                            <input type="hidden" id="_wpnonce" name="_wpnonce" value="59874fd74c"><input type="hidden" name="_wp_http_referer" value="/upload-tai-lieu/">            <input type="hidden" name="form_id" value="1412">
                                            <input type="hidden" name="page_id" value="1443">
                                            <input type="hidden" id="del_attach" name="delete_attachments[]" value="2410">
                                            <input type="hidden" name="action" value="wpuf_submit_post">

                                            <input type="submit" class="wpuf-submit-button" name="submit" value="Đăng tài liệu">
                                            <input type="hidden" name="wpuf_form_status" value="new">

                                        </li>

                                    </ul>

                                </form>

                                <p></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- Courses Sidebar -->
                <div class="col-lg-4" id="listdocumen">
                    <div class="td_block_wrap td_block_7 td_block_widget td_uid_79_5c125b96e98f4_rand td_with_ajax_pagination td-pb-border-top td_block_template_1 td-column-1 td_block_padding" data-td-block-uid="td_uid_79_5c125b96e98f4">
                        <div class="td-block-title-wrap">
                            <h4 class="block-title td-block-title">
                                <span class="td-pulldown-size">XEM NHIỀU</span>
                            </h4>
                        </div>
                        <div id="td_uid_79_5c125b96e98f4" class="td_block_inner">

                            <div class="td-block-span12">

                                <div class="td_module_6 td_module_wrap td-animation-stack">

                                    <div class="td-module-thumb">
                                        <a href="https://thuvienhoclieu.com/25-de-kiem-tra-1-tiet-chuong-nguyen-ham-tich-phan-ung-dung-co-dap/" rel="bookmark" class="td-image-wrap" title="25 đề kiểm tra 1 tiết chương nguyên hàm, tích phân, ứng dụng có đáp án">
                                            <img width="100" height="70" class="entry-thumb td-animation-stack-type0-2" src="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png" srcset="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png 100w, https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png 218w" sizes="(max-width: 100px) 100vw, 100px" alt="" title="25 đề kiểm tra 1 tiết chương nguyên hàm, tích phân, ứng dụng có đáp án"></a>
                                    </div>
                                    <div class="item-details">
                                        <h3 class="entry-title td-module-title"><a href="https://thuvienhoclieu.com/25-de-kiem-tra-1-tiet-chuong-nguyen-ham-tich-phan-ung-dung-co-dap/" rel="bookmark" title="25 đề kiểm tra 1 tiết chương nguyên hàm, tích phân, ứng dụng có đáp án">25 đề kiểm tra 1 tiết chương nguyên hàm, tích phân,...</a></h3>            <div class="td-module-meta-info">
                                            <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2018-03-15T14:15:05+00:00">15-03-2018</time></span>                            </div>
                                    </div>

                                </div>


                            </div> <!-- ./td-block-span12 -->

                            <div class="td-block-span12">

                                <div class="td_module_6 td_module_wrap td-animation-stack">

                                    <div class="td-module-thumb"><a href="https://thuvienhoclieu.com/bai-tap-trac-nghiem-chuong-2-mat-non-mat-tru-mat-cau-hinh-hoc-lop-12-co-dap/" rel="bookmark" class="td-image-wrap" title="Bài tập trắc nghiệm chương 2: mặt nón, mặt trụ, mặt cầu-hình học lớp 12 có đáp án"><img width="100" height="70" class="entry-thumb td-animation-stack-type0-2" src="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png" srcset="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png 100w, https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png 218w" sizes="(max-width: 100px) 100vw, 100px" alt="" title="Bài tập trắc nghiệm chương 2: mặt nón, mặt trụ, mặt cầu-hình học lớp 12 có đáp án"></a></div>
                                    <div class="item-details">
                                        <h3 class="entry-title td-module-title"><a href="https://thuvienhoclieu.com/bai-tap-trac-nghiem-chuong-2-mat-non-mat-tru-mat-cau-hinh-hoc-lop-12-co-dap/" rel="bookmark" title="Bài tập trắc nghiệm chương 2: mặt nón, mặt trụ, mặt cầu-hình học lớp 12 có đáp án">Bài tập trắc nghiệm chương 2: mặt nón, mặt trụ, mặt...</a></h3>            <div class="td-module-meta-info">
                                            <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2017-12-02T21:33:19+00:00">02-12-2017</time></span>                            </div>
                                    </div>

                                </div>


                            </div> <!-- ./td-block-span12 -->

                            <div class="td-block-span12">

                                <div class="td_module_6 td_module_wrap td-animation-stack">

                                    <div class="td-module-thumb"><a href="https://thuvienhoclieu.com/bai-tap-trac-nghiem-tich-khoi-chop-co-dap/" rel="bookmark" class="td-image-wrap" title="Bài tập trắc nghiệm thể tích khối chóp có đáp án"><img width="100" height="70" class="entry-thumb td-animation-stack-type0-2" src="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png" srcset="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png 100w, https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png 218w" sizes="(max-width: 100px) 100vw, 100px" alt="" title="Bài tập trắc nghiệm thể tích khối chóp có đáp án"></a></div>
                                    <div class="item-details">
                                        <h3 class="entry-title td-module-title"><a href="https://thuvienhoclieu.com/bai-tap-trac-nghiem-tich-khoi-chop-co-dap/" rel="bookmark" title="Bài tập trắc nghiệm thể tích khối chóp có đáp án">Bài tập trắc nghiệm thể tích khối chóp có đáp án</a></h3>            <div class="td-module-meta-info">
                                            <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2017-11-07T13:59:22+00:00">07-11-2017</time></span>                            </div>
                                    </div>

                                </div>


                            </div> <!-- ./td-block-span12 -->

                            <div class="td-block-span12">

                                <div class="td_module_6 td_module_wrap td-animation-stack">

                                    <div class="td-module-thumb"><a href="https://thuvienhoclieu.com/de-thi-thu-thpt-quoc-gia-mon-hoa-hoc-truong-thpt-chuyen-su-pham-ha-noi-nam-2018/" rel="bookmark" class="td-image-wrap" title="Đề thi thử thpt quốc gia môn Hóa học trường thpt Chuyên sư phạm Hà Nội năm 2018"><img width="100" height="70" class="entry-thumb td-animation-stack-type0-2" src="https://thuvienhoclieu.com/wp-content/uploads/2018/01/tvhltracnghiemonline-100x70.jpg" srcset="https://thuvienhoclieu.com/wp-content/uploads/2018/01/tvhltracnghiemonline-100x70.jpg 100w, https://thuvienhoclieu.com/wp-content/uploads/2018/01/tvhltracnghiemonline-218x150.jpg 218w" sizes="(max-width: 100px) 100vw, 100px" alt="" title="Đề thi thử thpt quốc gia môn Hóa học trường thpt Chuyên sư phạm Hà Nội năm 2018"></a></div>
                                    <div class="item-details">
                                        <h3 class="entry-title td-module-title"><a href="https://thuvienhoclieu.com/de-thi-thu-thpt-quoc-gia-mon-hoa-hoc-truong-thpt-chuyen-su-pham-ha-noi-nam-2018/" rel="bookmark" title="Đề thi thử thpt quốc gia môn Hóa học trường thpt Chuyên sư phạm Hà Nội năm 2018">Đề thi thử thpt quốc gia môn Hóa học trường thpt...</a></h3>            <div class="td-module-meta-info">
                                            <span class="td-post-date"><time class="entry-date updated td-module-date" datetime="2018-05-19T09:03:04+00:00">19-05-2018</time></span>                            </div>
                                    </div>

                                </div>


                            </div> <!-- ./td-block-span12 -->
                        </div>
                    </div>
                    <div class="td_block_wrap td_block_15 td_block_widget td_uid_80_5c125b96f1f37_rand td_with_ajax_pagination td-pb-border-top td_block_template_1 td-column-1 td_block_padding" data-td-block-uid="td_uid_80_5c125b96f1f37">
                        <div class="td-block-title-wrap">
                            <h4 class="block-title td-block-title">
                                <span class="td-pulldown-size">TÀI LIỆU HOT</span>
                            </h4>
                        </div>
                        <div id="td_uid_80_5c125b96f1f37" class="td_block_inner td-column-1 td_animated_xlong td_fadeInLeft" style="height: auto;"><div class="td-cust-row">

                                <div class="td-block-span12">

                                    <div class="td_module_mx4 td_module_wrap td-animation-stack">
                                        <div class="td-module-image">
                                            <div class="td-module-thumb">
                                                <a href="https://thuvienhoclieu.com/chuyen-de-nhom-halogen-co-tom-tat-cac-kien-thuc-co-ban-va-bai-tap/" rel="bookmark" class="td-image-wrap" title="Chuyên đề nhóm halogen có tóm tắt các kiến thức cơ bản và bài tập">
                                                    <img width="218" height="150" class="entry-thumb td-animation-stack-type0-2" src="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png" srcset="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png 218w, https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png 100w" sizes="(max-width: 218px) 100vw, 218px" alt="" title="Chuyên đề nhóm halogen có tóm tắt các kiến thức cơ bản và bài tập">
                                                </a>
                                            </div>
                                            <a href="https://thuvienhoclieu.com/tai-lieu-hoa-hoc/tai-lieu-hoa-hoc-lop-10/" class="td-post-category">Hóa Học Lớp 10</a>
                                        </div>
                                        <h3 class="entry-title td-module-title"><a href="https://thuvienhoclieu.com/chuyen-de-nhom-halogen-co-tom-tat-cac-kien-thuc-co-ban-va-bai-tap/" rel="bookmark" title="Chuyên đề nhóm halogen có tóm tắt các kiến thức cơ bản và bài tập">Chuyên đề nhóm halogen có tóm tắt các kiến thức cơ...</a></h3>
                                    </div>


                                </div> <!-- ./td-block-span12 -->

                                <div class="td-block-span12">

                                    <div class="td_module_mx4 td_module_wrap td-animation-stack">
                                        <div class="td-module-image">
                                            <div class="td-module-thumb"><a href="https://thuvienhoclieu.com/bai-tap-trac-nghiem-amin-amino-axit-protein/" rel="bookmark" class="td-image-wrap" title="Bài tập trắc nghiệm amin – amino axit – protein"><img width="218" height="150" class="entry-thumb td-animation-stack-type0-2" src="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png" srcset="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png 218w, https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png 100w" sizes="(max-width: 218px) 100vw, 218px" alt="" title="Bài tập trắc nghiệm amin – amino axit – protein"></a></div>                <a href="https://thuvienhoclieu.com/tai-lieu-hoa-hoc/tai-lieu-hoa-hoc-lop-12/" class="td-post-category">Hóa Học Lớp 12</a>            </div>

                                        <h3 class="entry-title td-module-title"><a href="https://thuvienhoclieu.com/bai-tap-trac-nghiem-amin-amino-axit-protein/" rel="bookmark" title="Bài tập trắc nghiệm amin – amino axit – protein">Bài tập trắc nghiệm amin – amino axit – protein</a></h3>
                                    </div>


                                </div> <!-- ./td-block-span12 --></div>
                            <div class="td-cust-row">

                                <div class="td-block-span12">

                                    <div class="td_module_mx4 td_module_wrap td-animation-stack">
                                        <div class="td-module-image">
                                            <div class="td-module-thumb"><a href="https://thuvienhoclieu.com/de-cuong-tap-vat-li-lop-6-hoc-ky-2-co-dap-an/" rel="bookmark" class="td-image-wrap" title="Đề Cương Ôn Tập Vật Lí Lớp 6 Học Kỳ 2 Có Đáp Án"><img width="218" height="150" class="entry-thumb td-animation-stack-type0-2" src="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png" srcset="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png 218w, https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png 100w" sizes="(max-width: 218px) 100vw, 218px" alt="" title="Đề Cương Ôn Tập Vật Lí Lớp 6 Học Kỳ 2 Có Đáp Án"></a></div>                <a href="https://thuvienhoclieu.com/tai-lieu-vat-li/" class="td-post-category">Tài Liệu Vật lí</a>            </div>

                                        <h3 class="entry-title td-module-title"><a href="https://thuvienhoclieu.com/de-cuong-tap-vat-li-lop-6-hoc-ky-2-co-dap-an/" rel="bookmark" title="Đề Cương Ôn Tập Vật Lí Lớp 6 Học Kỳ 2 Có Đáp Án">Đề Cương Ôn Tập Vật Lí Lớp 6 Học Kỳ 2...</a></h3>
                                    </div>


                                </div> <!-- ./td-block-span12 -->

                                <div class="td-block-span12">

                                    <div class="td_module_mx4 td_module_wrap td-animation-stack">
                                        <div class="td-module-image">
                                            <div class="td-module-thumb"><a href="https://thuvienhoclieu.com/bai-tap-trac-nghiem-dao-ham-cua-ham-co-dap/" rel="bookmark" class="td-image-wrap" title="Bài Tập Trắc Nghiệm Đạo Hàm Của Hàm Số Có Đáp Án"><img width="218" height="150" class="entry-thumb td-animation-stack-type0-2" src="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png" srcset="https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-218x150.png 218w, https://thuvienhoclieu.com/wp-content/uploads/2017/10/word-100x70.png 100w" sizes="(max-width: 218px) 100vw, 218px" alt="" title="Bài Tập Trắc Nghiệm Đạo Hàm Của Hàm Số Có Đáp Án"></a></div>                <a href="https://thuvienhoclieu.com/tai-lieu-toan/" class="td-post-category">Tài Liệu Toán</a>            </div>

                                        <h3 class="entry-title td-module-title"><a href="https://thuvienhoclieu.com/bai-tap-trac-nghiem-dao-ham-cua-ham-co-dap/" rel="bookmark" title="Bài Tập Trắc Nghiệm Đạo Hàm Của Hàm Số Có Đáp Án">Bài Tập Trắc Nghiệm Đạo Hàm Của Hàm Số Có Đáp...</a></h3>
                                    </div>
                                </div> <!-- ./td-block-span12 -->
                            </div>
                        </div>
                </div>
                </div>
        </div>
    </div>
@endsection
<?php
include("connection_database.php");

function getDepartments($conn)
{
    $sql = "select * from departments ";
    $result_query = mysqli_query($conn, $sql);
    $all_departments_name = array();
    while($departments = mysqli_fetch_array($result_query,MYSQLI_ASSOC)){
        $all_departments_name [$departments['department_id']] = $departments['department_name'];
    }

    return $all_departments_name;
}

function getAddresses($conn){

    $sql = "select * from addresses";
    $result_query = mysqli_query($conn,$sql);

    while($addresses = mysqli_fetch_array($result_query,MYSQLI_ASSOC)){
        $all_addresses_name [] = $addresses['address_name'];
    }

    return $all_addresses_name;
}

function getCategories($conn){

    $sql = "select * from categories";
    $result_query = mysqli_query($conn,$sql);

    while($categories = mysqli_fetch_array($result_query,MYSQLI_ASSOC)){
        $all_categories_name [] = $categories['category_name'];
    }

    return $all_categories_name;
}

function getItems($conn,$category_id){

    $sql = "select * from items WHERE category_id=$category_id";
    $result_query = mysqli_query($conn,$sql);

    while($items = mysqli_fetch_array($result_query,MYSQLI_ASSOC)){
        $all_items_name [] = $items['item_name'];
    }

    return $all_items_name;
}

function getRequesterUsers($conn){

    $sql = "select * from requester_users";
    $result_query = mysqli_query($conn,$sql);

    while($requesters = mysqli_fetch_array($result_query,MYSQLI_ASSOC)){
        $all_requesters [] = $requesters['requester_email'];
    }

    return $all_requesters;
}


?>
<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Form repeater examples">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="../assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="../assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="../assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="../assets/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="../assets/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="../assets/demo/default/skins/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="../assets/demo/default/skins/aside/dark.css" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="../assets/media/logos/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" src="../assets/media/logos/logo-light.png" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="index.html">
								<img alt="Logo" src="../assets/media/logos/logo-light.png" />
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
										</g>
									</svg></span>
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
										</g>
									</svg></span>
							</button>
						</div>
					</div>

					<!-- end:: Aside -->
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
						</div>
						<!-- end:: Header Menu -->
						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">
							<!--begin: User Bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg" />
										<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">M</span>
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(../assets/media/misc/bg-1.jpg)">
										<div class="kt-user-card__avatar">
											<img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg" />
											<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">M</span>
										</div>
										<div class="kt-user-card__name">
											Merve ER
										</div>
									</div>

									<!--end: Head -->
								</div>
							</div>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

							<!--begin::Portlet-->
							<div class="kt-portlet">
								<div class="kt-portlet__head">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon kt-hidden">
											<i class="la la-gear"></i>
										</span>
										<h3 class="kt-portlet__head-title">Yeni Satınalma Talebi Oluştur</h3>
									</div>
								</div>

								<!--begin::Form-->
								<form class="kt-form" method="POST" action="request_save.php">
									<div class="kt-portlet__body">
										<div class="kt-form__section kt-form__section--first">
											<div class="form-group row">
												<label class="col-lg-2 col-form-label" >Satınalma Talep Adı:</label>
												<div class="col-lg-4">
													<input type="text" class="form-control" name="requestname" placeholder="Satınalma talep adını yazınız.">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-2 col-form-label">Departman/Proje:</label>
												<div class="col-lg-4">
													<select name="departmentname" type="text" class="form-control" placeholder="Listeden seçiniz.">
                                                        <option value="" disabled selected>Listeden seçiniz.</option>
                                                        <?php
                                                                foreach(getDepartments($conn) as $depart) {
                                                                    echo '<option>' . $depart . '</option>';
                                                                }
                                                        ?>
                                                    </select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-2 col-form-label">Planlanan Teslim Tarihi:</label>
												<div class="col-lg-4">
                                                    <div class="class="kt-input-icon">
                                                    <!--<div class="input-group date">
                                                        <input type="date" id="datetimepicker" class="form-control kt-input kt_date_picker request_date"  placeholder="Tarih seçiniz." required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                            <i class="la la-calendar-check-o"></i>
                                                            </span>
                                                        </div>
                                                    </div>-->
                                                    <div class="input-append date" id="datetimepicker" data-date-format="dd-mm-yyyy hh:ii">
                                                        <input class="span2" size="16" type="text" name="date">
                                                        <span class="add-on"><i class="icon-remove"></i></span>
                                                        <span class="add-on"><i class="icon-th"></i></span>
                                                    </div>
                                                    </div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-2 col-form-label">Teslimat Yeri:</label>
												<div class="col-lg-4">
													<select name="addressname" type="text" class="form-control" placeholder="Listeden seçiniz.">
                                                        <option value="" disabled selected>Listeden seçiniz.</option>
                                                        <?php foreach(getAddresses($conn) as $addr) {
                                                            echo '<option>' . $addr . '</option>';
                                                        }?>
                                                    </select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-2 col-form-label">Satınalmacı:</label>
												<div class="col-lg-4">
                                                    <select name="requesteremail" type="email" class="form-control" placeholder="Listeden seçiniz.">
                                                        <option value="" disabled selected>Listeden seçiniz.</option>
                                                        <?php foreach(getRequesterUsers($conn) as $req) {
                                                            echo '<option>' . $req . '</option>';
                                                        }?>
                                                    </select>
												</div>
											</div>
											<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
											<div id="kt_repeater_1">
												<div class="form-group  row" id="kt_repeater">
													<label class="col-lg-2 col-form-label">Ürün Bilgileri:</label>
													<div data-repeater-list="" class="col-lg-10">
														<div data-repeater-item class="form-group row align-items-center">
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__label">
																		<label>Ürün Grubu:</label>
																	</div>
																	<div class="kt-form__control">
																		<select id="categoryid" type="text" class="form-control" placeholder="Listeden seçiniz.">
                                                                            <option value="" disabled selected>Listeden seçiniz.</option>
                                                                            <?php foreach(getCategories($conn) as $cat) {
                                                                                echo '<option>' . $cat . '</option>';
                                                                            }?>
                                                                        </select>
                                                                    </div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__label">
																		<label class="kt-label m-label--single">Ürün/Hizmet Adı:</label>
																	</div>
																	<div class="kt-form__control">
                                                                        <select id="itemid" type="text" class="form-control" placeholder="Listeden seçiniz.">
                                                                            <option value="" disabled selected>Listeden seçiniz.</option>
                                                                            <?php foreach(getItems($conn,1) as $it) {
                                                                                echo '<option>' . $it . '</option>';
                                                                            }?>
                                                                        </select>
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__label">
																		<label class="kt-label m-label--single">Adet:</label>
																	</div>
																	<div class="kt-form__control">
																		<input type="email" class="form-control" name="amount" placeholder="Adet yazınız.">
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__label">
																		<label class="kt-label m-label--single">Birim:</label>
																	</div>
																	<div class="kt-form__control">
																		<select type="text" class="form-control">
                                                                            <option value="" disabled selected>Listeden seçiniz.</option>
																			<option value="1">Adet</option>
																			<option value="2">Kg</option>
																			<option value="3">m</option>
																			<option value="4"><p>m<sup>2</sup></p></option>
																			<option value="5">m3</option>
																			<option value="6">Ton</option>
																			<option value="7">Litre</option>
																		</select>
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
															<div class="col-md-4">
																<div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill">
																	<span>
																		<i class="la la-trash-o"></i>
																		<span>Sil</span>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label"></label>
													<div class="col-lg-4">
														<div data-repeater-create="" class="btn btn btn-sm btn-brand btn-pill">
															<span>
																<i class="la la-plus"></i>
																<span>Yeni Ürün Ekle</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="kt-portlet__foot">
										<div class="kt-form__actions">
											<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-2">
													<button type="submit" name="submit"  class="btn btn-success">Kaydet</button>
													<button onclick="window.location.href='/index.html'" class="btn btn-secondary">Vazgeç</button>
												</div>
											</div>
										</div>
									</div>
								</form>

								<!--end::Form-->
							</div>

							<!--end::Portlet-->

						<!-- end:: Content -->
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->
		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->


		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin:: Global Mandatory Vendors -->
		<script src="../assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<script src="../assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/components/vendors/bootstrap-switch/init.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/components/vendors/bootstrap-markdown/init.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/components/vendors/bootstrap-notify/init.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
		<script src="../assets/vendors/custom/components/vendors/sweetalert2/init.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="../assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="../assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="../assets/app/custom/general/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>

		<!--end::Page Scripts -->

		<!--begin::Global App Bundle(used by all pages) -->
		<script src="../assets/app/bundle/app.bundle.js" type="text/javascript"></script>

		<!--end::Global App Bundle -->
		</div>
	</body>
	<!-- end::Body -->
</html>

<script>
    $('#datetimepicker').datetimepicker('getInitialDate');
    $('#datetimepicker').datetimepicker({
        format: 'yyyy-mm-dd hh:ii'
    });

        $('#datetimepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 2019,
            maxYear: parseInt(moment().format('YYYY'),10)
        });

</script>

@extends('Template/maestraAdmin')
@section('contenido')
<main class="main-content">
        <div class="position-relative">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="../../dashboard/index.html" class="navbar-brand">
                        <h4 class="logo-title">TecDig</h4>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" height="20px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>
                    <h4 class="title text-primary">Dashboard</h4>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1 mt-2"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto  navbar-list mb-2 mb-lg-0 align-items-center">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" id="mail-drop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M22 15.94C22 18.73 19.76 20.99 16.97 21H16.96H7.05C4.27 21 2 18.75 2 15.96V15.95C2 15.95 2.006 11.524 2.014 9.298C2.015 8.88 2.495 8.646 2.822 8.906C5.198 10.791 9.447 14.228 9.5 14.273C10.21 14.842 11.11 15.163 12.03 15.163C12.95 15.163 13.85 14.842 14.56 14.262C14.613 14.227 18.767 10.893 21.179 8.977C21.507 8.716 21.989 8.95 21.99 9.367C22 11.576 22 15.94 22 15.94Z" fill="currentColor"></path>
                                        <path d="M21.4759 5.67351C20.6099 4.04151 18.9059 2.99951 17.0299 2.99951H7.04988C5.17388 2.99951 3.46988 4.04151 2.60388 5.67351C2.40988 6.03851 2.50188 6.49351 2.82488 6.75151L10.2499 12.6905C10.7699 13.1105 11.3999 13.3195 12.0299 13.3195C12.0339 13.3195 12.0369 13.3195 12.0399 13.3195C12.0429 13.3195 12.0469 13.3195 12.0499 13.3195C12.6799 13.3195 13.3099 13.1105 13.8299 12.6905L21.2549 6.75151C21.5779 6.49351 21.6699 6.03851 21.4759 5.67351Z" fill="currentColor"></path>
                                    </svg>
                                    <span class="bg-primary count-mail"></span>
                                </a>
                                <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="mail-drop">
                                    <div class="card shadow-none m-0">
                                        <div class="card-header d-flex justify-content-between bg-primary py-3">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">All Message</h5>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 ">
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex  align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/01.png" alt="">
                                                    </div>
                                                    <div class=" w-100 ms-3">
                                                        <h6 class="mb-0 ">Bni Emma Watson</h6>
                                                        <small class="float-left font-size-12">13 Jun</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/02.png" alt="">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                                        <small class="float-left font-size-12">20 Apr</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/03.png" alt="">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 ">Why do we use it?</h6>
                                                        <small class="float-left font-size-12">30 Jun</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/04.png" alt="">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 ">Variations Passages</h6>
                                                        <small class="float-left font-size-12">12 Sep</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/05.png" alt="">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                                        <small class="float-left font-size-12">5 Dec</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" id="notification-drop" data-bs-toggle="dropdown">
                                    <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z" fill="currentColor"></path>
                                    </svg>
                                    <span class="bg-danger dots"></span>
                                </a>
                                <div class="sub-drop dropdown-menu dropdown-menu-end p-0" aria-labelledby="notification-drop">
                                    <div class="card shadow-none m-0">
                                        <div class="card-header d-flex justify-content-between bg-primary py-3">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">All Notifications</h5>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/01.png" alt="">
                                                    <div class="ms-3 w-100">
                                                        <h6 class="mb-0 ">Emma Watson Bni</h6>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-0">95 MB</p>
                                                            <small class="float-right font-size-12">Just Now</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/02.png" alt="">
                                                    </div>
                                                    <div class="ms-3 w-100">
                                                        <h6 class="mb-0 ">New customer is join</h6>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-0">Cyst Bni</p>
                                                            <small class="float-right font-size-12">5 days ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/03.png" alt="">
                                                    <div class="ms-3 w-100">
                                                        <h6 class="mb-0 ">Two customer is left</h6>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-0">Cyst Bni</p>
                                                            <small class="float-right font-size-12">2 days ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="d-flex align-items-center">
                                                    <img class="avatar-40 rounded-pill bg-soft-primary p-1" src="../../assets/images/pages/04.png" alt="">
                                                    <div class="w-100 ms-3">
                                                        <h6 class="mb-0 ">New Mail from Fenny</h6>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-0">Cyst Bni</p>
                                                            <small class="float-right font-size-12">3 days ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../../assets/images/avatars/01.png" alt="User-Profile" class="img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">Austin Robertson</h6>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../../dashboard/app/user-profile.html">Profile</a></li>
                                    <li><a class="dropdown-item" href="../../dashboard/app/user-privacy-setting.html">Privacy Setting</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="../../dashboard/auth/sign-in.html">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-5 py-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="iq-header-img">
                            <img src="../../assets/images/icons/15.png" alt="header" class="img-fluid w-100 h-100" style="object-fit: contain;">
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                                        <img src="../../assets/images/avatars/01.png" class="img-fluid rounded-pill bg-white avatar-100" alt="profile-image">
                                    </div>
                                    <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                        <h4 class="me-2 h4">Austin Robertson</h4>
                                        <span> - Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">News</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline m-0 p-0">
                                <li class="d-flex mb-2">
                                    <div class="news-icon me-3">
                                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 2C1 1.44772 1.44772 1 2 1H19C19.5523 1 20 1.44772 20 2V15C20 15.5523 19.5523 16 19 16H12L7 20V16H2C1.44772 16 1 15.5523 1 15V2Z" stroke="#AAA1AA" />
                                        </svg>

                                    </div>
                                    <p class="news-detail mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </li>
                                <li class="d-flex">
                                    <div class="news-icon me-3">
                                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 2C1 1.44772 1.44772 1 2 1H19C19.5523 1 20 1.44772 20 2V15C20 15.5523 19.5523 16 19 16H12L7 20V16H2C1.44772 16 1 15.5523 1 15V2Z" stroke="#AAA1AA" />
                                        </svg>

                                    </div>
                                    <p class="news-detail mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Twitter Feeds</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="twit-feed">
                                <div class="d-flex align-items-center mb-2">
                                    <img class="rounded-pill img-fluid avatar-40 me-3 p-1 bg-soft-danger" src="../../assets/images/icons/01.png" alt="">
                                    <div class="media-support-info">
                                        <h6 class="mb-0">Youtube</h6>
                                        <p class="mb-0">@youtube20
                                            <span class="text-primary">
                                                <svg width="15" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                                </svg>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="media-support-body ">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    <div class="twit-date mt-2">07 Jan 2021</div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="twit-feed">
                                <div class="d-flex align-items-center mb-2">
                                    <img class="rounded-pill img-fluid avatar-40 me-3 p-1 bg-soft-info" src="../../assets/images/icons/04.png" alt="">
                                    <div class="media-support-info">
                                        <h6 class="mb-0">Linkedin</h6>
                                        <p class="mb-0">@jane59
                                            <span class="text-primary">
                                                <svg width="15" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                                </svg>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="media-support-body">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    <div class="twit-date mt-2">18 Feb 2021</div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="twit-feed">
                                <div class="d-flex align-items-center mb-2">
                                    <img class="rounded-pill img-fluid avatar-40 me-3 p-1 bg-soft-primary" src="../../assets/images/icons/02.png" alt="">
                                    <div class="mt-2">
                                        <h6 class="mb-0">Facebook</h6>
                                        <p class="mb-0">@facebook59
                                            <span class="text-primary">
                                                <svg width="15" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                                </svg>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="media-support-body">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    <div class="twit-date mt-2">15 Mar 2021</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="profile-content tab-content">
                        <div id="profile-feed" class="tab-pane fade active show">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between pb-4">
                                    <div class="header-title">
                                        <div class="d-flex flex-wrap">
                                            <div class="media-support-user-img me-3">
                                                <img class="rounded-pill img-fluid avatar-60" src="../../assets/images/avatars/02.png" alt="img1">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h5 class="mb-0">Wade Warren</h5>
                                                <p class="mb-0 text-primary">colleages</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                            29 mins
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton7">
                                            <a class="dropdown-item " href="javascript:void(0);">Action</a>
                                            <a class="dropdown-item " href="javascript:void(0);">Another action</a>
                                            <a class="dropdown-item " href="javascript:void(0);">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="user-post">
                                        <a href="javascript:void(0);"><img src="../../assets/images/pages/12.png" alt="post-image" class="img-fluid w-100"></a>
                                    </div>
                                    <div class="comment-area p-3">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center message-icon me-3">
                                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                                                    </svg>
                                                    <span class="ms-1">Like</span>
                                                </div>
                                                <div class="d-flex align-items-center feather-icon">
                                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M10,16V19.08L13.08,16H20V4H4V16H10Z" />
                                                    </svg>
                                                    <span class="ms-1">140</span>
                                                </div>
                                            </div>
                                            <div class="share-block d-flex align-items-center feather-icon">
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#share-btn" aria-controls="share-btn">
                                                    <span class="ms-1">
                                                        <svg width="18" class="me-1" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                                                        </svg>
                                                        99 Share</span></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        <hr>
                                        <ul class="list-inline p-0 m-0">
                                            <li class="mb-4">
                                                <div class="d-flex">
                                                    <img src="../../assets/images/avatars/03.png" alt="userimg" class="avatar-50  rounded-pill img-fluid">
                                                    <div class="ms-3">
                                                        <h6 class="mb-1">Paul Molive</h6>
                                                        <p class="mb-1">Lorem ipsum dolor sit amet</p>
                                                        <div class="d-flex flex-wrap align-items-center mb-1">
                                                            <a href="javascript:void(0);" class="me-3">
                                                                <svg width="20" height="20" class="text-body me-1" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                                                                </svg>
                                                                like
                                                            </a>
                                                            <a href="javascript:void(0);" class="me-3">
                                                                <svg width="20" height="20" class="me-1" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M8,9.8V10.7L9.7,11C12.3,11.4 14.2,12.4 15.6,13.7C13.9,13.2 12.1,12.9 10,12.9H8V14.2L5.8,12L8,9.8M10,5L3,12L10,19V14.9C15,14.9 18.5,16.5 21,20C20,15 17,10 10,9" />
                                                                </svg>
                                                                reply
                                                            </a>
                                                            <a href="javascript:void(0);" class="me-3">translate</a>
                                                            <span> 5 min </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <img src="../../assets/images/avatars/04.png" alt="userimg" class="avatar-50  rounded-pill img-fluid">
                                                    <div class="ms-3">
                                                        <h6 class="mb-1">Robert Fox</h6>
                                                        <p class="mb-1">Lorem ipsum dolor sit amet</p>
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <a href="javascript:void(0);" class="me-3">
                                                                <svg width="20" height="20" class="text-body me-1" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                                                                </svg>
                                                                like
                                                            </a>
                                                            <a href="javascript:void(0);" class="me-3">
                                                                <svg width="20" height="20" class="me-1" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M8,9.8V10.7L9.7,11C12.3,11.4 14.2,12.4 15.6,13.7C13.9,13.2 12.1,12.9 10,12.9H8V14.2L5.8,12L8,9.8M10,5L3,12L10,19V14.9C15,14.9 18.5,16.5 21,20C20,15 17,10 10,9" />
                                                                </svg>
                                                                reply
                                                            </a>
                                                            <a href="javascript:void(0);" class="me-3">translate</a>
                                                            <span> 5 min </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                            <input type="text" class="form-control rounded" placeholder="Lovely!">
                                            <div class="comment-attagement d-flex">
                                                <a href="javascript:void(0);" class="me-2 text-body">
                                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" />
                                                    </svg>
                                                </a>
                                                <a href="javascript:void(0);" class="text-body">
                                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M20,4H16.83L15,2H9L7.17,4H4A2,2 0 0,0 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6A2,2 0 0,0 20,4M20,18H4V6H8.05L9.88,4H14.12L15.95,6H20V18M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between pb-4">
                                    <div class="header-title">
                                        <div class="d-flex flex-wrap">
                                            <div class="media-support-user-img me-3">
                                                <img class="rounded-pill img-fluid avatar-60" src="../../assets/images/avatars/05.png" alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h5 class="mb-0">Wade Warren</h5>
                                                <p class="mb-0 text-primary">colleages</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" id="dropdownMenuButton07" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                            1 Hr
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton07">
                                            <a class="dropdown-item " href="javascript:void(0);">Action</a>
                                            <a class="dropdown-item " href="javascript:void(0);">Another action</a>
                                            <a class="dropdown-item " href="javascript:void(0);">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <p class="p-3 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                    <div class="comment-area p-3">
                                        <hr class="mt-0">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center message-icon me-3">
                                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                                                    </svg>
                                                    <span class="ms-1">140</span>
                                                </div>
                                                <div class="d-flex align-items-center feather-icon">
                                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M10,16V19.08L13.08,16H20V4H4V16H10Z" />
                                                    </svg>
                                                    <span class="ms-1">140</span>
                                                </div>
                                            </div>
                                            <div class="share-block d-flex align-items-center feather-icon">
                                                <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#share-btn" aria-controls="share-btn">
                                                    <span class="ms-1">
                                                        <svg width="18" class="me-1" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M18 16.08C17.24 16.08 16.56 16.38 16.04 16.85L8.91 12.7C8.96 12.47 9 12.24 9 12S8.96 11.53 8.91 11.3L15.96 7.19C16.5 7.69 17.21 8 18 8C19.66 8 21 6.66 21 5S19.66 2 18 2 15 3.34 15 5C15 5.24 15.04 5.47 15.09 5.7L8.04 9.81C7.5 9.31 6.79 9 6 9C4.34 9 3 10.34 3 12S4.34 15 6 15C6.79 15 7.5 14.69 8.04 14.19L15.16 18.34C15.11 18.55 15.08 18.77 15.08 19C15.08 20.61 16.39 21.91 18 21.91S20.92 20.61 20.92 19C20.92 17.39 19.61 16.08 18 16.08M18 4C18.55 4 19 4.45 19 5S18.55 6 18 6 17 5.55 17 5 17.45 4 18 4M6 13C5.45 13 5 12.55 5 12S5.45 11 6 11 7 11.45 7 12 6.55 13 6 13M18 20C17.45 20 17 19.55 17 19S17.45 18 18 18 19 18.45 19 19 18.55 20 18 20Z"></path>
                                                        </svg>
                                                        99 Share
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                            <input type="text" class="form-control rounded" placeholder="Lovely!">
                                            <div class="comment-attagement d-flex">
                                                <a href="javascript:void(0);" class="me-2 text-body">
                                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" />
                                                    </svg>
                                                </a>
                                                <a href="javascript:void(0);" class="text-body">
                                                    <svg width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M20,4H16.83L15,2H9L7.17,4H4A2,2 0 0,0 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6A2,2 0 0,0 20,4M20,18H4V6H8.05L9.88,4H14.12L15.95,6H20V18M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="profile-activity" class="tab-pane fade">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Activity</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                                        <ul class="list-inline p-0 m-0">
                                            <li>
                                                <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                                                <h6 class="float-left mb-1">Client Login</h6>
                                                <small class="float-right mt-1">24 November 2019</small>
                                                <div class="d-inline-block w-100">
                                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-dots timeline-dot1 border-success text-success"></div>
                                                <h6 class="float-left mb-1">Scheduled Maintenance</h6>
                                                <small class="float-right mt-1">23 November 2019</small>
                                                <div class="d-inline-block w-100">
                                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-dots timeline-dot1 border-danger text-danger"></div>
                                                <h6 class="float-left mb-1">Dev Meetup</h6>
                                                <small class="float-right mt-1">20 November 2019</small>
                                                <div class="d-inline-block w-100">
                                                    <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                                                    <div class="iq-media-group iq-media-group-1">
                                                        <a href="#" class="iq-media-1">
                                                            <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                                        </a>
                                                        <a href="#" class="iq-media-1">
                                                            <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                                        </a>
                                                        <a href="#" class="iq-media-1">
                                                            <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                                                <h6 class="float-left mb-1">Client Call</h6>
                                                <small class="float-right mt-1">19 November 2019</small>
                                                <div class="d-inline-block w-100">
                                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-dots timeline-dot1 border-warning text-warning"></div>
                                                <h6 class="float-left mb-1">Mega event</h6>
                                                <small class="float-right mt-1">15 November 2019</small>
                                                <div class="d-inline-block w-100">
                                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="profile-friends" class="tab-pane fade">
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Friends</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-inline m-0 p-0">
                                        <li class="d-flex mb-4 align-items-center">
                                            <img src="../../assets/images/avatars/01.png" alt="story-img" class="rounded-pill avatar-40">
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Paul Molive</h6>
                                                <p class="mb-0">Web Designer</p>
                                            </div>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton9">
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">block</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <img src="../../assets/images/avatars/05.png" alt="story-img" class="rounded-pill avatar-40">
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Paul Molive</h6>
                                                <p class="mb-0">trainee</p>
                                            </div>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton10" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton10">
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">block</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <img src="../../assets/images/avatars/02.png" alt="story-img" class="rounded-pill avatar-40">
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Anna Mull</h6>
                                                <p class="mb-0">Web Developer</p>
                                            </div>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton11" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton11">
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">block</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <img src="../../assets/images/avatars/03.png" alt="story-img" class="rounded-pill avatar-40">
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Paige Turner</h6>
                                                <p class="mb-0">trainee</p>
                                            </div>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton12">
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">block</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <img src="../../assets/images/avatars/04.png" alt="story-img" class="rounded-pill avatar-40">
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Barb Ackue</h6>
                                                <p class="mb-0">Web Designer</p>
                                            </div>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton13" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton13">
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">block</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <img src="../../assets/images/avatars/05.png" alt="story-img" class="rounded-pill avatar-40">
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Greta Life</h6>
                                                <p class="mb-0">Tester</p>
                                            </div>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton14" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton14">
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">block</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <img src="../../assets/images/avatars/03.png" alt="story-img" class="rounded-pill avatar-40">
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Ira Membrit</h6>
                                                <p class="mb-0">Android Developer</p>
                                            </div>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton15" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton15">
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">block</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <img src="../../assets/images/avatars/02.png" alt="story-img" class="rounded-pill avatar-40">
                                            <div class="ms-3 flex-grow-1">
                                                <h6>Pete Sariya</h6>
                                                <p class="mb-0">Web Designer</p>
                                            </div>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" id="dropdownMenuButton16" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton16">
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                                    <a class="dropdown-item " href="javascript:void(0);">block</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="profile-profile" class="tab-pane fade">
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">Profile</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="user-profile">
                                            <img src="../../assets/images/avatars/01.png" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                                        </div>
                                        <div class="mt-3">
                                            <h3 class="d-inline-block">Austin Robertson</h3>
                                            <p class="d-inline-block pl-3"> - Web developer</p>
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4 class="card-title">About User</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="user-bio">
                                        <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Joined:</h6>
                                        <p>Feb 15, 2021</p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Lives:</h6>
                                        <p>United States of America</p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Email:</h6>
                                        <p><a href="#" class="text-body"> austin@gmail.com</a></p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Url:</h6>
                                        <p><a href="#" class="text-body" target="_blank"> www.bootstrap.com </a></p>
                                    </div>
                                    <div class="mt-2">
                                        <h6 class="mb-1">Contact:</h6>
                                        <p><a href="#" class="text-body">(001) 4544 565 456</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">About</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, contur adipiscing elit.</p>
                            <div class="mb-1">Email: <a href="#" class="ms-3">nikjone@demoo.com</a></div>
                            <div class="mb-1">Phone: <a href="#" class="ms-3">001 2351 256 12</a></div>
                            <div>Location: <span class="ms-3">USA</span></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h4 class="card-title">Download</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline m-0 p-0">
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="img-fluid bg-soft-warning rounded-pill"><img src="../../assets/images/icons/01.png" alt="story-img" class="rounded-pill  p-1 avatar-40"></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Youtube</h6>
                                        <small>4000K</small>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="img-fluid bg-soft-info rounded-pill"><img src="../../assets/images/icons/02.png" alt="story-img" class="rounded-pill p-1 avatar-40"></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Facebook</h6>
                                        <p class="mb-0">3000K</p>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="img-fluid bg-soft-dark rounded-pill"><img src="../../assets/images/icons/03.png" alt="story-img" class="rounded-pill p-1 avatar-40"></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Instagram</h6>
                                        <p class="mb-0">5000K</p>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="img-fluid bg-soft-primary rounded-pill"><img src="../../assets/images/icons/04.png" alt="story-img" class="rounded-pill p-1 avatar-40"></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Linkedin</h6>
                                        <p class="mb-0">2000K</p>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="img-fluid bg-soft-info rounded-pill"><img src="../../assets/images/icons/05.png" alt="story-img" class="rounded-pill p-1 avatar-40"></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Messenger</h6>
                                        <p class="mb-0">1000K</p>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="img-fluid bg-soft-success rounded-pill"><img src="../../assets/images/icons/06.png" alt="story-img" class="rounded-pill p-1 avatar-40"></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Whatsapp</h6>
                                        <p class="mb-0">3000K</p>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="img-fluid bg-soft-primary rounded-pill"><img src="../../assets/images/icons/07.png" alt="story-img" class="rounded-pill p-1 avatar-40"></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Telegram</h6>
                                        <p class="mb-0">2000K</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="img-fluid bg-soft-info rounded-pill"><img src="../../assets/images/icons/08.png" alt="story-img" class="rounded-pill p-1 avatar-40"></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6>Paypal</h6>
                                        <p class="mb-0">3000K</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn" aria-labelledby="shareBottomLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body small">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="text-center me-3 mb-3">
                            <img src="../../assets/images/brands/08.png" class="img-fluid rounded mb-2" alt="">
                            <h6>Facebook</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="../../assets/images/brands/09.png" class="img-fluid rounded mb-2" alt="">
                            <h6>Twitter</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="../../assets/images/brands/10.png" class="img-fluid rounded mb-2" alt="">
                            <h6>Instagram</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="../../assets/images/brands/11.png" class="img-fluid rounded mb-2" alt="">
                            <h6>Google Plus</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="../../assets/images/brands/13.png" class="img-fluid rounded mb-2" alt="">
                            <h6>In</h6>
                        </div>
                        <div class="text-center me-3 mb-3">
                            <img src="../../assets/images/brands/12.png" class="img-fluid rounded mb-2" alt="">
                            <h6>YouTube</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <footer class="footer">
        <div class="footer-body">
            <ul class="left-panel list-inline mb-0 p-0">
                <li class="list-inline-item"><a href="https://results-in-performance.com/images/2024/Aviso_privacidad.pdf">Politica de privacidad</a></li>
            </ul>
            <div class="right-panel">
                ©<script>
                    document.write(new Date().getFullYear())
                </script>
                <span class="text-gray">
                </span><a href="https://results-in-performance.com/">Results In Performance</a>.
            </div>
        </div>
    </footer>
</main>
    @endsection
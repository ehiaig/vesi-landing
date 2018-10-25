<div class="menu-w color-scheme-dark color-style-bright menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
            <div class="logo-w ">
                <a class="logo" href="{{ url('/dashboard') }}">
                     <!-- <img src="{{asset('frontend/images/white-logo.png')}}" alt="" > -->
                     <div class="logo-label">Vesicash</div>
                </a>
            </div>
            <div class="logged-user-w avatar-inline">
                <div class="logged-user-i">
                    <!-- <div class="avatar-w">
                        <img alt="" src="{{ asset('backend/img/avatar1.jpg')}}">
                    </div> -->
                    <div class="logged-user-info-w">

                        @if (Auth::user()->user_type == 'business')
                            <div class="logged-user-name">{{ Auth::user()->firstname }}</div>
                            <div class="logged-user-role"> {{ Auth::user()->business->business_name }}</div>
                        @else
                            <div class="logged-user-name">{{ Auth::user()->firstname }}</div>
                            <div class="logged-user-role">Administrator</div>
                        @endif

                    </div>
                    <div class="logged-user-toggler-arrow">
                        <div class="os-icon os-icon-chevron-down"></div>
                    </div>
                    <div class="logged-user-menu color-style-bright">
                        <div class="logged-user-avatar-info">
                            <div class="logged-user-info-w">
                                <div class="logged-user-name">{{ Auth::user()->firstname }}</div>
                                <div class="logged-user-role">Administrator</div>
                            </div>
                        </div>
                        <div class="bg-icon">
                            <i class="os-icon os-icon-wallet-loaded"></i>
                        </div>
                        <ul>
                            <!-- <li>
                                <a href="">
                                    <i class="os-icon os-icon-mail-01"></i>
                                    <span>Incoming Mail</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="os-icon os-icon-user-male-circle2"></i>
                                    <span>Profile Details</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="os-icon os-icon-coins-4"></i>
                                    <span>Billing Details</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="os-icon os-icon-others-43"></i>
                                    <span>Notifications</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="os-icon os-icon-signs-11"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--             <div class="element-search autosuggest-search-activator">
                <input placeholder="Start typing to search..." type="text">
            </div> -->
            <!-- <h1 class="menu-page-header">Page Header</h1> -->
            <ul class="main-menu">
                
                <li class="sub-header">
                    <span>Dashboard</span>
                </li> 
                <li class="sub-menu">
                    <a href="{{route('dashboard.show.index')}}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-credit-card"></div>
                        </div>
                        <span>Overview</span>
                    </a>
                </li>   
                           
                <li class=" has-sub-menu">
                    <a data-placement="top" data-toggle="tooltip" data-original-title="Transactions are invoices that has been paid for.">
                        <div class="icon-w">
                            <div class="os-icon os-icon-documents-03"></div>
                        </div>
                        <span>Transactions</span>
                    </a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-mail"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li><a href="{{route('transactions.show.index')}}">Track Invoices</a></li>
                                <li><a href="{{route('transactions.show.milestones')}}">Track Milestones</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" has-sub-menu">
                    <a href="#">
                        <div class="icon-w">
                            <div class="os-icon os-icon-documents-03"></div>
                        </div>
                        <span>Invoice</span>
                    </a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-mail"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a  class="btn btn-primary" data-target="#onboardingFormModal" data-toggle="modal">
                                        <i class="os-icon os-icon-ui-22"></i>&nbsp; Create New Invoice
                                    </a>
                                </li>
                                <li><a href="{{route('invoice.show.index')}}">All Invoices</a></li>
                                <li><a href="{{route('invoice.show.all-ms')}}">All Milestones</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- <li class=" has-sub-menu">
                    <a href="">
                        <div class="icon-w">
                            <div class="os-icon os-icon-wallet-loaded"></div>
                        </div>
                        <span>Wallet</span>
                    </a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-layout"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li><a href="">Check Balance</a></li>
                                <li>
                                    <a href="">Fund Wallet</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </li>
-->             <li class="sub-menu">
                    <a href="{{route('disputes.show.index')}}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-mail-14"></div>
                        </div>
                        <span>Disputes</span>
                    </a>
                </li>    
                <!--<li class="sub-header">
                    <span>Settings</span>
                </li>
                 <li class="sub-menu">
                    <a href="">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layers"></div>
                        </div>
                        <span>Getting started</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layers"></div>
                        </div>
                        <span>Account</span>
                    </a>
                </li> -->
            </ul>
        </div>
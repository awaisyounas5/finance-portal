   <!-- Page Sidebar Start-->
   <div class="sidebar-wrapper" data-layout="stroke-svg">
       <div>
           <div class="logo-wrapper"><a href="home"><img class="img-fluid" src="{{ asset('assets/images/logo/logo_light.png') }}" alt=""></a>
               <div class="back-btn"><i class="fa fa-angle-left"></i></div>
               <div class="toggle-sidebar">
                   <svg class="stroke-icon sidebar-toggle status_toggle middle">
                       <use href="{{ asset('assets/svg/icon-sprite.svg#toggle-icon') }}"></use>
                   </svg>
                   <svg class="fill-icon sidebar-toggle status_toggle middle">
                       <use href="{{ asset('assets/svg/icon-sprite.svg#fill-toggle-icon') }}"></use>
                   </svg>
               </div>
           </div>
           <div class="logo-icon-wrapper"><a href="home"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="" style="width:30px;"></a></div>
           <nav class="sidebar-main">
               <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
               <div id="sidebar-menu">
                   <ul class="sidebar-links" id="simple-bar">
                       <li class="sidebar-main-title">
                           <div>
                               <h6 class="lan-1">General</h6>
                           </div>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link" href="{{ route('home') }}">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                               </svg><span class="lan-3">Dashboard</span></a>
                       </li>
                       <li class="sidebar-main-title">
                           <div>
                               <h6 class="lan-8">Applications</h6>
                           </div>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-project') }}"></use>
                               </svg><span>Notifications </span></a>
                           <ul class="sidebar-submenu">
                               <li><a href="{{ route('notifications.view-notifications') }}">View Notifications</a></li>
                               @if(auth()->check() && auth()->user()->role == 0)
                               <li><a href="{{ route('create_notification') }}">Create New</a></li>
                               @endif
                           </ul>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link" href="{{ route('inbox') }}">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-chat') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-chat') }}"></use>
                               </svg><span>Inbox</span></a>
                       </li>
                       @if(auth()->check() && auth()->user()->role == 0)
                       <li class="sidebar-list">
                           <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                               </svg><span>Financial Advisors</span>
                           </a>
                           <ul class="sidebar-submenu">
                               <li><a href="{{ route('financial_advisors.index') }}">View All</a></li>
                               <li><a href="{{ route('create_financial_advisor') }}">Create New</a></li>
                           </ul>
                       </li>
                       @endif
                       <li class="sidebar-main-title">
                           <div>
                               <h6>Funds Recommendation</h6>
                           </div>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link" href="{{ route('upload_fund_recommendation_pdf') }}">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form')}}"> </use>
                               </svg><span>Upload PDF</span></a>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form')}}"> </use>
                               </svg><span>General</span></a>
                           <ul class="sidebar-submenu">
                               <li><a href="{{ route('general_fund_holdings') }}">Fund Holdings</a></li>
                               <li><a href="{{ route('general_large_cap_growth') }}">Large Cap Growth</a></li>
                               <li><a href="{{ route('general_large_cap_value') }}">Large Cap Value</a></li>
                               <li><a href="{{ route('general_large_cap_blend') }}">Large Cap Blend</a></li>
                               <li><a href="{{ route('general_mid_cap_growth') }}">Mid-Cap Growth</a></li>
                               <li><a href="{{ route('general_small_cap') }}">Small-Cap</a></li>
                               <li><a href="{{ route('general_foriegn_large_cap_blend') }}">Foreign Large Cap Blend</a></li>
                               <li><a href="{{ route('general_emerging_markets') }}">Emerging Markets</a></li>
                           </ul>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form')}}"> </use>
                               </svg><span>Fixed Income - Taxable</span></a>
                           <ul class="sidebar-submenu">
                               <li><a href="{{ route('fixed_income_taxable_core') }}">Core</a></li>
                               <li><a href="{{ route('fixed_income_taxable_high_yield') }}">High Yield</a></li>
                               <li><a href="{{ route('fixed_income_taxable_multi_sector') }}">Multi-Sector</a></li>
                           </ul>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form')}}"> </use>
                               </svg><span>Fixed Income - Munis</span></a>
                           <ul class="sidebar-submenu">
                               <li><a href="{{ route('fixed_income_munis_core') }}">Core</a></li>
                               <li><a href="{{ route('fixed_income_munis_high_yield') }}">High Yield</a></li>
                           </ul>
                       </li>
                       <li class="sidebar-main-title">
                           <div>
                               <h6>Portfolio</h6>
                           </div>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link" href="{{ route('upload_portfolio') }}">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form')}}"> </use>
                               </svg><span>Upload Excel</span></a>
                       </li>
                       <li class="sidebar-main-title">
                           <div>
                               <h6>Outlook</h6>
                           </div>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form')}}"> </use>
                               </svg><span>Macroeconomic Outlook</span></a>
                           <ul class="sidebar-submenu">
                               <li><a href="{{ route('macroeconomic-outlook.view-documents') }}">View Documents</a></li>
                               @if(auth()->check() && auth()->user()->role == 0)
                               <li><a href="{{ route('macroeconomic-outlook.upload-document') }}">Upload New</a></li>
                               @endif
                           </ul>
                       </li>
                       <li class="sidebar-main-title">
                           <div>
                               <h6>Documents</h6>
                           </div>
                       </li>
                       <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form')}}"> </use>
                               </svg><span>Documents</span></a>
                           <ul class="sidebar-submenu">
                               @if(auth()->check() && auth()->user()->role == 0)
                               <li><a href="{{ route('documents.indexAll') }}">View All</a></li>
                               @endif
                               <li><a href="{{ route('documents.view') }}">Your Documents</a></li>
                               <li><a href="{{ route('documents.create') }}">Upload New</a></li>
                           </ul>
                       </li>
                       <li class="sidebar-main-title">
                           <div>
                               <h6>Q&A's</h6>
                           </div>
                       </li>
                       <li class="sidebar-list mb-4"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                               <svg class="stroke-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                               </svg>
                               <svg class="fill-icon">
                                   <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form')}}"> </use>
                               </svg><span>Questions</span></a>
                           <ul class="sidebar-submenu">
                               @if(auth()->check() && auth()->user()->role == 0)
                               <li><a href="{{ route('view_all_questionnaires.index') }}">View All</a></li>
                               @endif
                               
                               <li><a href="{{ route('sent_questionnaires.index') }}">View Sent Questions</a></li>
                               <li><a href="{{ route('send_questionnaire.create') }}">Send Question</a></li>
                           </ul>
                       </li>
                   </ul>
               </div>
               <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
           </nav>
       </div>
   </div>
   <!-- Page Sidebar Ends-->
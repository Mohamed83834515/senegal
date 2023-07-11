@extends('dashboard.layouts.dashboard', ['title' => 'Détails du projet'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Projets</a>
                <a href="#" class="breadcrumb-item">Détails du projets</a>
                <span class="breadcrumb-item active">Lorem ipsum dolor sit amet</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    <a href="{{ route('projet.index') }}"><i class="icon-arrow-left52 mr-2"></i></a>
                    Data Governance projet
                </h5>

                <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        <li class="list-inline-item">
                            <i class="icon-target2 mr-2"></i> 
                            <span class="text-success ml-auto">30 000 000 F CFA</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                    <li class="nav-item"><a href="#projet-overview" class="nav-link active" data-toggle="tab"><i class="icon-menu7 mr-2"></i> Explication</a></li>
                    <li class="nav-item"><a href="#projet-attendees" class="nav-link" data-toggle="tab"><i class="icon-people mr-2"></i> Investisseurs</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="projet-overview">
                    <div class="card-body">
                        <div class="mt-1 mb-4">
                            <h6 class="font-weight-semibold">projet overview</h6>
                            <p>Then sluggishly this camel learned woodchuck far stretched unspeakable notwithstanding the walked owing stung mellifluously glumly rooster more examined one that combed until a less less witless pouted up voluble timorously glared elaborate giraffe steady while grinned and got one beaver to walked. Connected picked rashly ocelot flirted while wherever unwound much more one inside emotionally well much woolly amidst upon far burned ouch sadistically became.</p>
                            <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.</p>
                        </div>

                        <h6 class="font-weight-semibold">What you will learn</h6>
                        <p class="mb-3">Some cow goose out and sweeping wow the skillfully goodness one crazily far some jeez darn well so peevish pending nudged categorically in between about much alas handsome intolerable devotedly helpfully smiled momentously next much this this next sweepingly far. Together prim and limpet much extravagantly quail longing a ouch that walking a jeepers flamingo more.</p>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <dl>
                                        <dt class="font-size-sm font-weight-bold text-uppercase">
                                            <i class="icon-checkmark3 text-blue mr-2"></i>
                                            Salamander much that on much
                                        </dt>
                                        <dd>Like partook magic this enthusiastic tasteful far crud otter this the ferret honey iguana. Together prim and limpet much extravagantly quail longing.</dd>

                                        <dt class="font-size-sm font-weight-bold text-uppercase">
                                            <i class="icon-checkmark3 text-blue mr-2"></i>
                                            Well far some raccoon
                                        </dt>
                                        <dd>Python laudably euphemistically since this copious much human this briefly hello ouch less one diligent however impotently made gave a slick up much.</dd>

                                        <dt class="font-size-sm font-weight-bold text-uppercase">
                                            <i class="icon-checkmark3 text-blue mr-2"></i>
                                            Goldfish rapidly that far
                                        </dt>
                                        <dd>Well far some raccoon knew goose and crud behind salmon amenable oh the poignant sufficiently yikes a naked showed far reindeer imminently.</dd>

                                        <dt class="font-size-sm font-weight-bold text-uppercase">
                                            <i class="icon-checkmark3 text-blue mr-2"></i>
                                            Gregor then turned to look out
                                        </dt>
                                        <dd>Then sluggishly this camel learned woodchuck far stretched unspeakable notwithstanding the walked owing stung mellifluously glumly rooster.</dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <dl>
                                        <dt class="font-size-sm font-weight-bold text-uppercase">
                                            <i class="icon-checkmark3 text-blue mr-2"></i>
                                            Misunderstood cuffed more depending
                                        </dt>
                                        <dd>And earthworm dear arose bald agilely sad so below cowered within ceremonially therefore via much this symbolically and newt capably.</dd>

                                        <dt class="font-size-sm font-weight-bold text-uppercase">
                                            <i class="icon-checkmark3 text-blue mr-2"></i>
                                            Voluble much saddled mechanic
                                        </dt>
                                        <dd>Much took between less goodness jay mallard kneeled gnashed this up strong cooperative. A collection of textile samples lay spread.</dd>

                                        <dt class="font-size-sm font-weight-bold text-uppercase">
                                            <i class="icon-checkmark3 text-blue mr-2"></i>
                                            Before some one more
                                        </dt>
                                        <dd>Pending some contrary rabbit up that the more conditionally ouch confidently far so was darn logic thus dove the juicily because that placed otter.</dd>

                                        <dt class="font-size-sm font-weight-bold text-uppercase">
                                            <i class="icon-checkmark3 text-blue mr-2"></i>
                                            So slit more darn hey well wore
                                        </dt>
                                        <dd>Well far some raccoon knew goose and crud behind salmon amenable oh the poignant sufficiently yikes a naked showed far reindeer imminently.</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <h6 class="font-weight-semibold">projet program</h6>
                        So slit more darn hey well wore submissive savage this shark aardvark fumed thoughtfully much drank when angelfish so outgrew some alas vigorously therefore warthog superb less oh groundhog less alas gibbered barked some hey despicably with aesthetic hamster jay by luckily. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame
                    </div>

                    {{-- <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Lessons</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">Introduction</a></td>
                                    <td>One morning, when Gregor Samsa woke from troubled dreams, he found himself</td>
                                    <td>10 hours</td>
                                    <td><span class="badge bg-secondary">Closed</span></td>
                                    <td>Oct 21st, 2016</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#">Design tools</a></td>
                                    <td>He lay on his armour-like back, and if he lifted his head a little he could</td>
                                    <td>20 hours</td>
                                    <td><span class="badge bg-primary">Registration</span></td>
                                    <td>Oct 22nd, 2016</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">Workspace</a></td>
                                    <td>The bedding was hardly able to cover it and seemed ready to slide off moment</td>
                                    <td>35 hours</td>
                                    <td><span class="badge bg-danger">On time</span></td>
                                    <td>Oct 23rd, 2016</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="#">Creating effects</a></td>
                                    <td>A collection of textile samples lay spread out on the table - Samsa salesman</td>
                                    <td>25 hours</td>
                                    <td><span class="badge bg-danger">On time</span></td>
                                    <td>Oct 24th, 2016</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="#">Digital design</a></td>
                                    <td>Drops of rain could be heard hitting the pane, which made him feel quite sad</td>
                                    <td>50 hours</td>
                                    <td><span class="badge bg-danger">On time</span></td>
                                    <td>Oct 25th, 2016</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>

                <div class="tab-pane fade" id="projet-attendees">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-body">
                                    <div class="media">
                                        <div class="mr-3">
                                            <a href="#">
                                                <img src="{{asset('dashboard/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <h6 class="mb-0">Benjamin Loretti</h6>
                                            <span class="text-muted">Network engineer</span>
                                        </div>

                                        <div class="ml-3 align-self-center">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        {{-- <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a> --}}
                                                        <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                                        {{-- <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-body">
                                    <div class="media">
                                        <div class="mr-3">
                                            <a href="#">
                                                <img src="{{asset('dashboard/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <h6 class="mb-0">Vanessa Aurelius</h6>
                                            <span class="text-muted">Front end guru</span>
                                        </div>

                                        <div class="ml-3 align-self-center">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        {{-- <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a> --}}
                                                        <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                                        {{-- <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-body">
                                    <div class="media">
                                        <div class="mr-3">
                                            <a href="#">
                                                <img src="{{asset('dashboard/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <h6 class="mb-0">Hanna Dorman</h6>
                                            <span class="text-muted">UX/UI designer</span>
                                        </div>

                                        <div class="ml-3 align-self-center">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        {{-- <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a> --}}
                                                        <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                                        {{-- <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-3 mb-3">
                            <ul class="pagination">
                                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-right"></i></a></li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-left"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /projet overview -->

    </div>
    <!-- /left content -->


    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- projet details -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">projet details</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
                    <a href="#" class="btn bg-teal-400 btn-block mb-2">Investir</a>
                </div>

                <table class="table table-borderless table-xs border-top-0 my-2">
                    <tbody>
                        <tr>
                            <td class="font-weight-semibold">Durée:</td>
                            <td class="text-right">36 Mois</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Status:</td>
                            <td class="text-right">
                                <span class="badge bg-primary">En cours</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Date début:</td>
                            <td class="text-right">01/12/2022</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Date fin:</td>
                            <td class="text-right">02/12/225</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Taux intérêt:</td>
                            <td class="text-right"><a href="#">25%</a></td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Limite participant:</td>
                            <td class="text-right">100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /projet details -->


            <!-- Our trainers -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Attachments</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item w-100">
                            <div class="card bg-light py-2 px-3 mt-3 mb-0">
                                <div class="media my-1">
                                    <div class="mr-3 align-self-center"><i class="icon-file-pdf icon-2x text-danger-400 top-0"></i></div>
                                    <div class="media-body">
                                        <div class="font-weight-semibold text-break">new_december_offers.pdf</div>

                                        <ul class="list-inline list-inline-condensed mb-0">
                                            <li class="list-inline-item text-muted">174 KB</li>
                                            <li class="list-inline-item"><a href="#">View</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="card bg-light py-2 px-3 mt-3 mb-0">
                                <div class="media my-1">
                                    <div class="mr-3 align-self-center"><i class="icon-file-pdf icon-2x text-danger-400 top-0"></i></div>
                                    <div class="media-body">
                                        <div class="font-weight-semibold text-break">assignme_letter.pdf</div>

                                        <ul class="list-inline list-inline-condensed mb-0">
                                            <li class="list-inline-item text-muted">736 KB</li>
                                            <li class="list-inline-item"><a href="#">View</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /our trainers -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>
<!-- /inner container -->  

@endsection
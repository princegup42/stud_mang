@extends('layouts.professional')
@section('content')

<!-- Page Heading -->
<div class="col col-md-12 py-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Post Jobs</a>
    </div>
</div>

<!-- Content Row -->
<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between card-primary card-outline">
            <h6 class="m-0 font-weight-bold text-primary">Jobs List</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            {{-- <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div> --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Company</th>
                        <th>Company</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                        <td scope="row">{{ $job->id}}</td>
                        <td>{{ $job->job_title}}</td>
                        <td>giit</td>
                        <td>giit</td>
                        <td>giit</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td scope="row">2</td>
                        <td>job 2</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>job 2</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>job 2</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>job 2</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>job 2</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                        <td>phpstrom</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card card-primary card-outline direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title">Recent Chat</h3>

            <div class="card-tools">
                <span title="3 New Messages" class="badge bg-primary">3</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
            </div>
            <!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
                <ul class="contacts-list">
                    <li>
                        <a href="#">
                            <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Avatar">

                            <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    Count Dracula
                                    <small class="contacts-list-date float-right">2/28/2015</small>
                                </span>
                                <span class="contacts-list-msg">How have you been? I was...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                        </a>
                    </li>
                    <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
            </div>
            <!-- /.direct-chat-pane -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <form action="#" method="post">
                <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.card-footer-->
    </div>
</div>
@endsection

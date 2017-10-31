 <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <!-- Advanced Specific Theme Color Widget -->
                            <div class="widget">
                                <div class="widget-advanced">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background-dark-spring">
                                        <h3 class="widget-content-light">
                                            <a href="javascript:void(0)" class="themed-color-spring">Open Projects</a><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <small>Company Clients</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <small>Individual Clients</small>
                                                </div>
                                            </div>
                                        </h3>

                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main">
                                        <a href="javascript:void(0)" class="widget-image-container animation-bigEntrance">
                                            <span class="widget-icon themed-background-spring"><i class="gi gi-notes"></i></span>
                                        </a>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-borderless table-striped table-condensed table-vcenter">
                                                   <tbody>
                                                       @foreach($compproj as $compproj)
                                                       <tr>
                                                           <td>{{$compproj->strContractID}}</td>
                                                           <td><a href="/progressmonitoring/{{$compproj->strContractID}}"><h5><b>{{$compproj->strQuoteName}}</b></h5></a></td>
                                                       </tr>
                                                       @endforeach
                                                   </tbody>
                                                </table>
                                            </div>
                                       <div class="col-md-6">
                                                <table class="table table-borderless table-striped table-condensed table-vcenter">
                                                   <tbody>
                                                     
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Widget Main -->
                                </div>
                            </div>
                            <!-- END Advanced Specific Theme Color Widget -->
                        </div>
                        </div>
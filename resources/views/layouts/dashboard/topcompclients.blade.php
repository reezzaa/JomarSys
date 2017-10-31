 <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <!-- Advanced Specific Theme Color Widget -->
                            <div class="widget">
                                <div class="widget-advanced">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background-dark-flatie">
                                        <h3 class="widget-content-light">
                                            <a href="javascript:void(0)" class="themed-color-flatie">Top Company Clients</a><br>
                                            <small>Total: {{$compclients}}</small>
                                        </h3>
                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main">
                                        <a href="javascript:void(0)" class="widget-image-container animation-bigEntrance">
                                            <span class="widget-icon themed-background-flatie"><i class="fa fa-building"></i></span>
                                        </a>
                                        <table class="table table-borderless table-striped table-condensed table-vcenter">
                                            <tbody>
                                            @foreach($compctr as $compctr)
                                            <tr>
                                                    <td  class="text-center" style="width: 30px;"><h5>{{$compctr->strCompClientID}}</h5></td>
                                                   <td class="text-center"><a href="/newcompclient/{{$compctr->strCompClientID}}"><h5><b>{{$compctr->strCompClientName}}</b></h5></a></td>
                                                   <td class="pull-right" style="width: 100px"> {{$compctr->ctr}} Project/s</td>
                                                </tr>
                                            @endforeach
                                                
                                            </tbody>
                                        </table>
                                        <div class="text-center"><a href="/newcompclient">Show all..</a></div>
                                    </div>
                                    <!-- END Widget Main -->
                                </div>
                            </div>
                            <!-- END Advanced Specific Theme Color Widget -->
                        </div>
                        <div class="col-md-5">
                            <!-- Advanced Specific Theme Color Widget -->
                            <div class="widget">
                                <div class="widget-advanced">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background-dark-flatie">
                                        <h3 class="widget-content-light">
                                            <a href="javascript:void(0)" class="themed-color-flatie">Top Individual Clients</a><br>
                                            <small>Total: {{$indclients}} </small>
                                        </h3>
                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main">
                                        <a href="javascript:void(0)" class="widget-image-container animation-bigEntrance">
                                            <span class="widget-icon themed-background-night"><i class="gi gi-old_man"></i></span>
                                        </a>
                                        <table class="table table-borderless table-striped table-condensed table-vcenter">
                                            <tbody>
                                            @foreach($indctr as $indctr)
                                            <tr>
                                                    <td  class="text-center" style="width: 30px;"><h5>{{$indctr->strIndClientID}}</h5></td>
                                                   <td class="text-center"><h5><b>{{$indctr->strIndClientFName}} {{$indctr->strIndClientLName}}</b></h5></td>
                                                   <td class="pull-right" style="width: 100px"> {{$indctr->ctr}} Project/s</td>
                                                </tr>
                                            @endforeach
                                                
                                            </tbody>
                                        </table>
                                        <div class="text-center"><a href="/newindclient">Show all..</a></div>
                                    </div>
                                    <!-- END Widget Main -->
                                </div>
                            </div>
                            <!-- END Advanced Specific Theme Color Widget -->
                        </div>
                       </div>
 <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <!-- Advanced Specific Theme Color Widget -->
                            <div class="widget">
                                <div class="widget-advanced">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background-dark-default">
                                        <h3 class="widget-content-light">
                                            <a href="javascript:void(0)" class="themed-color-default">Open Invoices</a><br>
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
                                            <span class="widget-icon themed-background-default"><i class="hi hi-list-alt"></i></span>
                                        </a>
                                       <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-borderless table-striped table-condensed table-vcenter">
                                                   <tbody>
                                                       <?php $__currentLoopData = $compbill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compbill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <tr>
                                                           <td  style="width: 100px;"><a href="/pdf/<?php echo e($compbill->strServInvHID); ?>"><h5><b><?php echo e($compbill->strServInvHID); ?></b></h5></a></td>
                                                           <td><h5><a href="/billing/<?php echo e($compbill->strContractID); ?>"><h5><b><?php echo e($compbill->strQuoteName); ?></b></h5></a></h5></td>
                                                            <td class="pull-right"><h5> <b>Due:</b> <?php echo e(\Carbon\Carbon::parse($compbill->datServInvHDate)->toFormattedDateString()); ?>, <i><?php echo e(\Carbon\Carbon::parse($compbill->datServInvHDate)->addDay()->diffForHumans()); ?></i></h5></td>


                                                       </tr>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
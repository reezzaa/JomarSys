 <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <!-- Advanced Specific Theme Color Widget -->
                            <div class="widget">
                                <div class="widget-advanced">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background-dark-flatie">
                                        <h3 class="widget-content-light">
                                            <a href="javascript:void(0)" class="themed-color-flatie">Top Company Clients</a><br>
                                            <small>Total: <?php echo e($compclients); ?></small>
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
                                            <?php $__currentLoopData = $compctr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compctr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                    <td  class="text-center" style="width: 30px;"><h5><?php echo e($compctr->strCompClientID); ?></h5></td>
                                                   <td class="text-center"><a href="/newcompclient/<?php echo e($compctr->strCompClientID); ?>"><h5><b><?php echo e($compctr->strCompClientName); ?></b></h5></a></td>
                                                   <td class="pull-right" style="width: 100px"> <?php echo e($compctr->ctr); ?> Project/s</td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
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
                                            <small>Total: <?php echo e($indclients); ?> </small>
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
                                            <?php $__currentLoopData = $indctr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indctr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                    <td  class="text-center" style="width: 30px;"><h5><?php echo e($indctr->strIndClientID); ?></h5></td>
                                                   <td class="text-center"><h5><b><?php echo e($indctr->strIndClientFName); ?> <?php echo e($indctr->strIndClientLName); ?></b></h5></td>
                                                   <td class="pull-right" style="width: 100px"> <?php echo e($indctr->ctr); ?> Project/s</td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
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
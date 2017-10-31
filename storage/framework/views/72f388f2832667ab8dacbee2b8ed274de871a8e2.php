<!DOCTYPE html>
<html>
    <head>
    <?php echo $__env->make('layouts.headers.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
    <body>
        <div id="error-container">
            <div class="error-options">
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 class="animation-hatch"><i class="fa fa-times text-danger"></i> 403</h1>
                    <h2 class="h3">Oops, we are sorry but you do not have permission to access this page..</h2>
                </div>
            </div>
        </div>
    </body>
</html>
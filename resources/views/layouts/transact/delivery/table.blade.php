<table id="5cols-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
     <tr>
     <th></th>
      <th class="text-center">Project Name</th>
      <th class="text-center"> Person-in-charge</th>
      <th class="text-center">Delivery Date</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="project-list">
       

    @foreach($delitable as $dt)
        <tr>
         <td class="text-center"><button class=" btn btn-alt " id="upddel" value="{{$dt->strDeliveryHID}}" data-toggle="tooltip" data-placement="top" data-original-title="Update Delivery Status"><span class="fa fa-spinner fa-2x fa-spin "></span> </button>
         </td>
        <td class="text-center">{{$dt->strQuoteName}}</td>
        <td class="text-center"> {{ $dt->strEmpFirstName }} {{ $dt->strEmpMiddleName }} {{ $dt->strEmpLastName }}</td>
        <td class="text-center"> {{\Carbon\Carbon::parse($dt->datDeliveryHDate)->toFormattedDateString()}}</td>
        <td class="text-center">
            <button class="btn btn-alt btn-info" id="viewdel" value="{{$dt->strDeliveryHID}}" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span> View</button>
            <button class="btn btn-alt btn-danger" id="deldel" value="{{$dt->strDeliveryHID}}" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-bin"></span> Delete</button>
        </td>


      </tr>
    @endforeach
</tbody>

</table>

            <script>$(function(){ TablesDatatables.init(); });</script>
<div id="view_modal" class="modal fade view_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="block">
        <div class="block-title themed-background">
          <div class="block-options pull-right">
              <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="themed-background" style="color:white;"><strong id="nameheader">View Delivery</strong></h3>
        </div>

        <div class="row">
          <div class="col-md-offset-1">
                <h4><i class="gi gi-cargo"></i> Materials:</h4> 
              <div class="col-md-5 col-md-offset-1" id="special">
             
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-1">
            <h4><i class="fa fa-truck"></i> Delivery Trucks: </h4>
            <div class="col-md-5 col-md-offset-1" id="special1">
             
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-1">
            <h4><i class="gi gi-google_maps"></i> Delivery Location: </h4>
            <div class="col-md-5 col-md-offset-1" id="special2">
             
            </div>
          </div>
        </div>
        
        <div id="clearfix"></div>
      </div>
    </div>
  </div>
</div> 

  <div class="text-center">
   <div id="del_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong>Delete Delivery</strong></h3>
          </div>
             {!!Form::open(['url'=>'delivery','method'=>'PUT','id'=>'frm-del'])!!}
                <p><h4>Are you sure you want to delete??</h4>
                </p>
                <p ><b id="deleteID"></b></p>
                <input type="hidden" id="delID" >
                <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                  <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span>Delete</button>
              </div>
              <div class="clearfix"></div>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div> 
</div>
   <div class="text-center">
     <div id="upd_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong>Update Delivery</strong></h3>
          </div>
             {!!Form::open(['url'=>'delivery','method'=>'PUT','id'=>'frm-upd'])!!}
                <p><h4 class="text-center">Delivery Completed? </h4>
                </p>
                <p ><h5><b id="delupd"></b></h5></p>
                <input type="hidden" id="delupdID" name="delupdID" >
                <div class="pull-right">
                  <button type="submit" class="btn btn-primary" >Yes</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal"> No </button>
              </div>
              <div class="clearfix"></div>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div> 
   </div>

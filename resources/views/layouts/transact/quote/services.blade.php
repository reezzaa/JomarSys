<table id="services-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Services</th>
      <th class="text-center">Service Cost</th>
      <th class="text-center">Status</th>
      <th style="width: 115px;" class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="service-list">
    @foreach($qdserve as $services)
    <tr id="{{ $services->intQHID }}">
        <td class="text-center">
          {{ $services->strServiceOffName }}
        </td>
        <td class="text-center">
          P 0
        </td>
        <td class="text-center">
            <label class="label label-warning">Draft</label>
        </td>
        <td class="text-center">
          <a href="/addmaterial/{{$services->intQDID}}"><button class="btn btn-alt btn-info" data-toggle="tooltip" data-original-title="Add Material" value = "{{$services->intQHID}}"><span class="gi gi-nails"></span>
          </button>
          <a href="/addequipment/{{$services->intQDID}}"><button class="btn btn-alt btn-info" data-toggle="tooltip" data-original-title="Add Equipment"> <span class="fa fa-anchor"></span></button></a>
          <a href="/addworker/{{$services->intQDID}}"><button class="btn btn-alt btn-info" data-toggle="tooltip" data-original-title="Add Workers"><span class="fa fa-users"></span>
          </button></a>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
<div id="addMat_modal" class="modal fade addMat_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="block">
        <div class="block-title themed-background">
          <div class="block-options pull-right">
              <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="themed-background" style="color:white;"><strong id="nameheader"></strong></h3>
        </div>

        <div id="clearfix"></div>
      </div>
    </div>
  </div>
</div> 
<script>$(function(){ TablesDatatables.init(); });</script>
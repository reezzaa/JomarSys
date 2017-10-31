<table id="qclient-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Delivery No</th>
      <th class="text-center">Project Name</th>
      <th class="text-center">Person-in-charge</th>
      <th class="text-center">Delivery Date</th> 
      <th class="text-center">Location</th> 
      <th class="text-center">Remarks</th>
      <th class="text-center">Status</th> 

    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($read as $read)
    <tr>
    <td class="text-center">
        {{$read->strDeliveryHID}}
      </td>
      <td class="text-center">
         {{$read->strQuoteName}}
      </td>
      <td class="text-center">
         {{$read->strEmpFirstName}} {{$read->strEmpMiddleName}} {{$read->strEmpLastName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($read->datDeliveryHDate)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{$read->strDelAddress}} {{$read->strDelCity}}, {{$read->strDelProvince}}
      </td>
      <td class="text-center">
        {{$read->strDeliveryHRemarks}}
      </td>
      <td class="text-center">
         @if($read->status==1)
         <label class="label label-success"> Finished</label>
         @elseif($read->status==2)
         <label class="label label-warning"> Pending</label>
         @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
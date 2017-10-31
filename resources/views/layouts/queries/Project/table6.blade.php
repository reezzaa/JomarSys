<table id="qclient-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center"></th>
      <th class="text-center">Name</th>
      <th class="text-center">Client Name</th> 
      <th class="text-center">Start Date</th>
      <th class="text-center">End Date</th> 
      <th class="text-center">Status</th> 
    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($sdate as $sdate)
    <tr>
    <td class="text-center">
        {{$sdate->strContractID}}
      </td>
      <td class="text-center">
        {{$sdate->strQuoteName}}
      </td>
      <td class="text-center">
        {{$sdate->strClientName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($sdate->datProjStart)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($sdate->datProjEnd)->toFormattedDateString()}}
      </td>
      <td class="text-center">
       @if($sdate->status==2)
      <span class="label label-warning ">Pending</span>
       @elseif($sdate->status==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($sdate->status==3)
      <span class="label label-primary ">Terminated</span>
       @endif
      </td>
    </tr>
    @endforeach
    @foreach($isdate as $isdate)
    <tr>
    <td class="text-center">
        {{$isdate->strQuoteID}}
      </td>
      <td class="text-center">
        {{$isdate->strQuoteName}}
      </td>
      <td class="text-center">
        {{$isdate->strIndClientFName}} {{$isdate->strIndClientLName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($isdate->datProjStart)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($isdate->datProjEnd)->toFormattedDateString()}}
      </td>
      <td class="text-center">
       @if($isdate->status==2)
      <span class="label label-warning ">Pending</span>
       @elseif($isdate->status==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($isdate->status==3)
      <span class="label label-primary ">Terminated</span>
       @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
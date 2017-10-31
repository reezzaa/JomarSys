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
     @foreach($clit as $clit)
    <tr>
    <td class="text-center">
        {{$clit->strContractID}}
      </td>
      <td class="text-center">
        {{$clit->strQuoteName}}
      </td>
      <td class="text-center">
        {{$clit->strClientName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($clit->datProjStart)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($clit->datProjEnd)->toFormattedDateString()}}
      </td>
      <td class="text-center">
       @if($clit->status==2)
      <span class="label label-warning ">Pending</span>
       @elseif($clit->status==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($clit->status==3)
      <span class="label label-primary ">Terminated</span>
       @endif
      </td>
    </tr>
    @endforeach
    @foreach($cliet as $cliet)
    <tr>
    <td class="text-center">
        {{$cliet->strQuoteID}}
      </td>
      <td class="text-center">
        {{$cliet->strQuoteName}}
      </td>
      <td class="text-center">
        {{$cliet->strIndClientFName}} {{$cliet->strIndClientLName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($cliet->datProjStart)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($cliet->datProjEnd)->toFormattedDateString()}}
      </td>
      <td class="text-center">
       @if($cliet->status==2)
      <span class="label label-warning ">Pending</span>
       @elseif($cliet->status==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($cliet->status==3)
      <span class="label label-primary ">Terminated</span>
       @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
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
     @foreach($clie as $cli)
    <tr>
    <td class="text-center">
        {{$cli->strQuoteID}}
      </td>
      <td class="text-center">
        {{$cli->strQuoteName}}
      </td>
      <td class="text-center">
        {{$cli->strIndClientFName}} {{$cli->strIndClientLName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($cli->datProjStart)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($cli->datProjEnd)->toFormattedDateString()}}
      </td>
      <td class="text-center">
       @if($cli->statu==2)
      <span class="label label-warning ">Pending</span>
       @elseif($cli->statu==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($cli->statu==3)
      <span class="label label-primary ">Terminated</span>
       @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
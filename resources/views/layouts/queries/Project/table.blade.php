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
     @foreach($cli as $cli)
    <tr>
    <td class="text-center">
        {{$cli->strContractID}}
      </td>
      <td class="text-center">
        {{$cli->strQuoteName}}
      </td>
      <td class="text-center">
        {{$cli->strClientName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($cli->datProjStart)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($cli->datProjEnd)->toFormattedDateString()}}
      </td>
      <td class="text-center">
       @if($cli->status==2)
      <span class="label label-warning ">Pending</span>
       @elseif($cli->status==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($cli->status==3)
      <span class="label label-primary ">Terminated</span>
       @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
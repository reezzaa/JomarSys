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
     @foreach($clio as $clio)
    <tr>
    <td class="text-center">
        {{$clio->strContractID}}
      </td>
      <td class="text-center">
        {{$clio->strQuoteName}}
      </td>
      <td class="text-center">
        {{$clio->strClientName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($clio->datProjStart)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($clio->datProjEnd)->toFormattedDateString()}}
      </td>
      <td class="text-center">
       @if($clio->status==2)
      <span class="label label-warning ">Pending</span>
       @elseif($clio->status==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($clio->status==3)
      <span class="label label-primary ">Terminated</span>
       @endif
      </td>
    </tr>
    @endforeach
    @foreach($clieo as $clieo)
    <tr>
    <td class="text-center">
        {{$clieo->strQuoteID}}
      </td>
      <td class="text-center">
        {{$clieo->strQuoteName}}
      </td>
      <td class="text-center">
        {{$clieo->strIndClientFName}} {{$clieo->strIndClientLName}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($clieo->datProjStart)->toFormattedDateString()}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($clieo->datProjEnd)->toFormattedDateString()}}
      </td>
      <td class="text-center">
       @if($clieo->status==2)
      <span class="label label-warning ">Pending</span>
       @elseif($clieo->status==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($clieo->status==3)
      <span class="label label-primary ">Terminated</span>
       @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
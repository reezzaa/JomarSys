<table id="contracthistory-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Status</th>
      <th class="text-center">Contract No</th>
      <th class="text-center">Name</th>
      <th class="text-center">Date Started</th>
      <th class="text-center">Date Through</th>
      <th class="text-center">CO#</th>
      <th class="text-center">Contract Amount</th>
      <th class="text-center" style="width: 50px"></th>
    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($contract as $c)

    <tr>
     <td class="text-center">
       @if($c->cstat==2)
      <span class="label label-warning ">Pending</span>
       @elseif($c->cstat==1)
      <span class="label label-info ">Ongoing</span>
       @elseif($c->cstat==3)
      <span class="label label-primary ">Terminated</span>
       @endif
     </td>
     <td class="text-center">
       {{$c->strContractID}}
     </td>
     <td class="text-center">
       {{$c->strQuoteName}}
     </td>
     <td class="text-center">
       {{\Carbon\Carbon::parse($c->datProjStart)->toFormattedDateString()}}
     </td>
     <td class="text-center">
       {{\Carbon\Carbon::parse($c->datProjEnd)->toFormattedDateString()}}
     </td>
     <td class="text-center">
       {{$c->strCONumber}}
     </td>
     <td class="text-center">
       ₱ {{$c->dblProjCost}}
     </td>
     <td class="text-center">
                   <a href="/contractlist/{{$c->strContractID}}"><button type="button" id="view_this"  class="btn btn-alt btn-info butun" data-toggle="tooltip" data-placement="top" title="View"><i class="gi gi-eye_open"></i></button> </a> 
      </td>
    </tr>
     @endforeach

  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
<table id="5col-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
     <tr>
      <th class="text-center">Project Name</th>
      <th class="text-center">Client Name</th>
      <th class="text-center">CO Number</th>
      <th class="text-center">Status</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="project-list">
    @foreach($prog as $p)
    <tr >

      <td class="text-center">
        {{ $p->strQuoteName }}
      </td>
      <td class="text-center">
        {{ $p->strCompClientName }}
      </td>
      <td class="text-center">
       {{$p->strCONumber}} 
      </td>
       <td class="text-center">
         @if($p->status==1)
         <label class="label label-info"> Ongoing</label>
         @else
         <label class="label label-warning"> For Billing</label>
         @endif
      </td>
      <td class="text-center">
         <a href="{{route('progressmonitoring.show',$p->strContractID)}}"><button id="edit_supp" class="btn btn-info btn-alt edit_supp" value="{{$p->strContractID}}"> <span class="gi gi-eye_open"></span>  View</button></a>
         <!-- <input type="hidden" id="phId" value="{{$p->strContractID}]"> -->
    </td>
    
  </tr>
  @endforeach
</tbody>

</table>


        
            <script>$(function(){ TablesDatatables.init(); });</script>
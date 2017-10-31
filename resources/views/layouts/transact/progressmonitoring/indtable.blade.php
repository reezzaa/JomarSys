<table id="5col-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
     <tr>
      <th class="text-center">Project Name</th>
      <th class="text-center">Client Name</th>
      <th class="text-center">PO Number</th>
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
        {{ $p->strIndClientFName }} {{ $p->strIndClientLName }}
      </td>
      <td class="text-center">
       {{$p->strPONumber}} 
      </td>
       <td class="text-center">
         @if($p->status==2)
         <label class="label label-info"> Ongoing</label>
         @endif
      </td>
      <td class="text-center">
         <a href="{{route('indprogressmonitoring.show',$p->strQuoteID)}}"><button id="edit_supp" class="btn btn-info btn-alt edit_supp" value="{{$p->strQuoteID}}"> <span class="gi gi-eye_open"></span>  View</button></a>
         <input type="hidden" id="phId" value="{{$p->strQuoteID}]">
    </td>
    
  </tr>
  @endforeach
</tbody>

</table>


        
            <script>$(function(){ TablesDatatables.init(); });</script>
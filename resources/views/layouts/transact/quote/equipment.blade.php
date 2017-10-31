<table id="addmaterial-datatable" class="table table-vcenter table-condensed table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Equipment Name</th>
      <th class="text-center">Unit Price</th>
      <th class="text-center">Qty</th>
      <th class="text-center">Amount</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="client-list">
    @foreach($qdserve as $key => $u)
    <tr {{$u->intMatNeedID}}>
        <td class="text-center">
          {{$u->strEquipName}}
        </td>
        <td class="text-center">
          P {{$u->dblEquipPrice}}
        </td>
        <td class="text-center">
          <strong>x <span class="badge">{{$u->intQty}}</span></strong>
        </td>
        <td class="text-center">
          <span class="label label-primary">P {{ ($u->intQty)*($u->dblEquipPrice) }}</span>
        </td>
        <td>
          <div class="text-center">
            <button class="btn btn-alt btn-warning"> <span class="gi gi-pencil"></span></button>
            <button class="btn btn-alt btn-danger"><span class="gi gi-bin"></span>
            </button>
          </div>
      </td>
      </tr>
    @endforeach
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>
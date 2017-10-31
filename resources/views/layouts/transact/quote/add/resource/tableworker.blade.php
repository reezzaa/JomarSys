<table id="" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Specialization Name</th>
      <th class="text-center">Labor Cost</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Total Labor Cost</th>
    </tr>
  </thead>
  <tbody id="client-list">
     @foreach($workspec as $workerspec)
    <tr>
        <td class="text-center">
            {{ $workerspec->strSpecDesc }}
        </td>
        <td class="text-center">
            {{ $workerspec->dcmLaborCost }}
        </td>
        <td class="text-center">
            {{ $workerspec->intQty }}
        </td>
        <td class="text-center">
            {{ $workerspec->dcmTotLaborCost }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>